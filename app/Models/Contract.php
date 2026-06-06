<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'contract_number',
        'document_type',
        'contract_value',
        'start_date',
        'end_date',
        'status',
        'is_signed',
        'signed_at',
        'signed_by',
        'file_path',
        'signatures',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'signed_at' => 'datetime',
        'is_signed' => 'boolean',
        'contract_value' => 'integer',
        'signatures' => 'array',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
