<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{

    use HasFactory, UsesUuid;

    protected $guarded = [];

    protected $casts = [
        'product_id' => 'string',
        'amount_paid' => 'integer',
        'download_token_used_at' => 'datetime',
        'qris_expires_at' => 'datetime',
        'manual_unique_code' => 'integer',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public static function generateUniqueCode(int $length = 6): string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $maxIndex = strlen($chars) - 1;

        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $chars[random_int(0, $maxIndex)];
        }

        return $code;
    }

    public function setNewOneTimeDownloadToken(): string
    {
        // Token should be unguessable; store only hash
        $token = bin2hex(random_bytes(12)); // 24 chars
        $this->download_token_hash = hash('sha256', $token);
        $this->download_token_used_at = null;
        $this->save();

        return $token;
    }
}


