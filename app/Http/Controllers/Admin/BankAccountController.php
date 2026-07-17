<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankAccount;
use App\Http\Requests\BankAccountRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the bank accounts.
     */
    public function index(): View
    {
        $bankAccounts = BankAccount::all();
        return view('admin.bank-accounts.index', compact('bankAccounts'));
    }

    /**
     * Show the form for creating a new bank account.
     */
    public function create(): View
    {
        return view('admin.bank-accounts.create');
    }

    /**
     * Store a newly created bank account.
     */
    public function store(BankAccountRequest $request): RedirectResponse
    {
        BankAccount::create($request->validated());
        return redirect()->route('admin.bank-accounts.index')
                         ->with('success', 'Bank account created successfully.');
    }

    /**
     * Show the form for editing the specified bank account.
     */
    public function edit(BankAccount $bankAccount): View
    {
        return view('admin.bank-accounts.edit', compact('bankAccount'));
    }

    /**
     * Update the specified bank account.
     */
    public function update(BankAccountRequest $request, BankAccount $bankAccount): RedirectResponse
    {
        $bankAccount->update($request->validated());
        return redirect()->route('admin.bank-accounts.index')
                         ->with('success', 'Bank account updated successfully.');
    }

    /**
     * Remove the specified bank account.
     */
    public function destroy(BankAccount $bankAccount): RedirectResponse
    {
        $bankAccount->delete();
        return redirect()->route('admin.bank-accounts.index')
                         ->with('success', 'Bank account deleted successfully.');
    }
}
