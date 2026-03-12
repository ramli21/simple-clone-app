<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogView extends Model
{
    use HasFactory;

    protected $fillable = ['blog_id', 'ip_address', 'viewed_at'];

    protected $casts = [
        'viewed_at' => 'datetime',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
