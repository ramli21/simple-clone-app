<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Client;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContractController extends Controller
{
    public function index(Request $request)
    {
        $query = Contract::with('client');

        if ($search = $request->query('q')) {
            $query->where('contract_number', 'like', "%{$search}%")
                ->orWhereHas('client', function ($q) use ($search) {
                    $q->where('company_name', 'like', "%{$search}%");
                });
        }

        $contracts = $query->latest()->paginate(15)->withQueryString();

        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        return view('contracts.create');
    }

    public function store(StoreContractRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            if (!empty($data['client_id'])) {
                $client = Client::find($data['client_id']);
            } else {
                $client = Client::create([
                    'company_name' => $data['company_name'],
                    'owner_name' => $data['owner_name'] ?? null,
                    'email' => $data['email'] ?? null,
                    'phone_number' => $data['phone_number'] ?? null,
                ]);
            }

            $file = $request->file('file');
            $filename = Str::slug($data['contract_number']) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('private/contracts', $filename, 'local');

            $contract = Contract::create([
                'client_id' => $client->id,
                'contract_number' => $data['contract_number'],
                'document_type' => $data['document_type'],
                'contract_value' => $data['contract_value'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'status' => $data['status'],
                'is_signed' => $data['is_signed'] ?? false,
                'signed_at' => $data['signed_at'] ?? null,
                'signed_by' => $data['signed_by'] ?? null,
                'file_path' => $path,
            ]);

            DB::commit();

            return redirect()->route('admin.contracts.show', $contract)->with('success', 'Contract created.');
        } catch (\Throwable $e) {
            DB::rollBack();
            if (!empty($path) && Storage::disk('local')->exists($path)) {
                Storage::disk('local')->delete($path);
            }
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Contract $contract)
    {
        $contract->load('client');
        return view('contracts.show', compact('contract'));
    }

    public function edit(Contract $contract)
    {
        $contract->load('client');
        return view('contracts.edit', compact('contract'));
    }

    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            if (!empty($data['client_id'])) {
                $client = Client::find($data['client_id']);
            } else {
                $client = Client::create([
                    'company_name' => $data['company_name'],
                    'owner_name' => $data['owner_name'] ?? null,
                    'email' => $data['email'] ?? null,
                    'phone_number' => $data['phone_number'] ?? null,
                ]);
            }

            if ($request->hasFile('file')) {
                // delete old
                if ($contract->file_path && Storage::disk('local')->exists($contract->file_path)) {
                    Storage::disk('local')->delete($contract->file_path);
                }
                $file = $request->file('file');
                $filename = Str::slug($data['contract_number']) . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('private/contracts', $filename, 'local');
                $data['file_path'] = $path;
            }

            $contract->update(array_merge([
                'client_id' => $client->id,
            ], $data));

            DB::commit();

            return redirect()->route('admin.contracts.show', $contract)->with('success', 'Contract updated.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Contract $contract)
    {
        DB::beginTransaction();
        try {
            if ($contract->file_path && Storage::disk('local')->exists($contract->file_path)) {
                Storage::disk('local')->delete($contract->file_path);
            }

            $contract->delete();
            DB::commit();
            return redirect()->route('admin.contracts.index')->with('success', 'Contract deleted.');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function download(Contract $contract)
    {
        if (!$contract->file_path || !Storage::disk('local')->exists($contract->file_path)) {
            abort(404);
        }

        return Storage::disk('local')->download($contract->file_path, $contract->contract_number . '.pdf');
    }

    // Stream PDF inline for preview (used by PDF.js)
    public function preview(Contract $contract)
    {
        if (!$contract->file_path || !Storage::disk('local')->exists($contract->file_path)) {
            abort(404);
        }

        $path = Storage::disk('local')->path($contract->file_path);
        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $contract->contract_number . '.pdf"',
        ]);
    }

    // Show signature positions editor
    public function signatures(Contract $contract)
    {
        $contract->load('client');
        $signatures = $contract->signatures ?? [];
        return view('contracts.signatures', compact('contract', 'signatures'));
    }

    // Update signature positions
    public function signaturesUpdate(Request $request, Contract $contract)
    {
        $data = $request->validate([
            'signatures' => ['required', 'array', 'min:1'],
            'signatures.*.name' => ['required', 'string', 'max:255'],
            'signatures.*.x' => ['required', 'numeric'],
            'signatures.*.y' => ['required', 'numeric'],
            'signatures.*.width' => ['required', 'numeric', 'min:1'],
            'signatures.*.height' => ['required', 'numeric', 'min:1'],
        ]);

        $contract->update([
            'signatures' => $data['signatures'],
        ]);

        return redirect()->route('admin.contracts.show', $contract)->with('success', 'Signature positions updated.');
    }
}
