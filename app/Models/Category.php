<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use UsesUuid, HasFactory;

    protected $guarded = [];
    
    public function serviceItems()
    {
        return $this->hasMany(ServiceItem::class);
    }
}
