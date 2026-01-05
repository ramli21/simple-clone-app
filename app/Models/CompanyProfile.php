<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyProfile extends Model
{
    use HasFactory, UsesUuid;

    protected $guarded = [];
    
    protected $casts = [
        'social_media' => 'array',
    ];
}
