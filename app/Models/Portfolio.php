<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image',
        'link',
        'story',
        'highlights',
        'published',
    ];

    protected $casts = [
        'highlights' => 'array',
        'published' => 'boolean',
    ];

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) return null;
        // We store image in storage/app/public then serve via public/storage symlink
        return asset('storage/' . $this->image);
    }
}

