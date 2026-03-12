<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use UsesUuid, HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image', 'excerpt', 'category_id', 'author_id', 'published_at', 'is_featured', 'views'];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function incrementView($ipAddress = null)
    {
        if (!$ipAddress) {
            $ipAddress = request()->ip();
        }

        // Check if this IP already viewed this blog in the last 24 hours
        $recentView = $this->blogViews()
            ->where('ip_address', $ipAddress)
            ->where('viewed_at', '>=', now()->subHours(24))
            ->exists();

        if ($recentView) {
            return false; // Don't increment, already viewed recently
        }

        // Record the view and increment counter
        $this->blogViews()->create([
            'ip_address' => $ipAddress,
            'viewed_at' => now(),
        ]);

        $this->increment('views');
        return true;
    }

    public function blogViews()
    {
        return $this->hasMany(BlogView::class);
    }
}

