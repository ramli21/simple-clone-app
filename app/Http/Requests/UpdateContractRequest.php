<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContractRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $contractId = $this->route('contract')?->id ?? null;

        return [
            'client_id' => ['nullable', 'exists:clients,id'],
            'company_name' => ['required_without:client_id', 'string', 'max:255'],
            'owner_name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:50'],

            'contract_number' => ['required', 'string', 'max:191', Rule::unique('contracts','contract_number')->ignore($contractId)],
            'document_type' => ['required', Rule::in(['Custom Website','Landing Page','SabilSys','Lainnya'])],
            'contract_value' => ['required', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'status' => ['required', Rule::in(['Draft','Active','Expired','Terminated'])],
            'is_signed' => ['sometimes', 'boolean'],
            'signed_at' => ['nullable', 'date'],
            'signed_by' => ['nullable', 'string', 'max:255'],

            'file' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ];
    }
}
