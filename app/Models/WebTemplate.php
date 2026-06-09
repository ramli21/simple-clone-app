<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class WebTemplate extends Model
{
    use HasFactory, UsesUuid;

    protected $guarded = [];

    protected $casts = [

        'images' => 'array',
        'is_active' => 'boolean',
        'discount_percentage' => 'integer',
        'price' => 'integer',
        'sales_count' => 'integer',
    ];

    protected $appends = [
        'final_price',
        // Tidak mengubah download_path (hanya memastikan saat diunduh path diperlakukan relatif)
    ];


    /**
     * Final price after applying discount percentage.
     */
    public function getFinalPriceAttribute(): int
    {

        $discount = $this->discount_percentage ?? 0;

        $price = (int) $this->price;
        $discount = max(0, min(100, (int) $discount));


        $final = $price - (int) round(($price * $discount) / 100);

        return max(0, $final);
    }
}

