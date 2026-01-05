<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itinerary extends Model
{
    use HasFactory, UsesUuid;

    protected $guarded = [];

    public function serviceItem()
    {
        return $this->belongsTo(ServiceItem::class);
    }
}
