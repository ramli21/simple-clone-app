<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class ClientBrief extends Model
{
    use HasFactory, UsesUuid;

    protected $guarded = [];

    protected $casts = [
        'company_info' => 'array',
        'contact_info' => 'array',
        'social_media' => 'array',
        'business_info' => 'array',
        'website_content' => 'array',
        'portfolios_projects' => 'array',
        'testimonials' => 'array',
        'faqs' => 'array',
        'gallery_files' => 'array',
        'blog_info' => 'array',
        'seo_info' => 'array',
        'domain_hosting' => 'array',
        'email_info' => 'array',
        'features_checklist' => 'array',
        'design_references' => 'array',
        'target_website' => 'array',
        'cta_info' => 'array',
        'legality_files' => 'array',
        'supporting_files' => 'array',
        'submitted_at' => 'datetime',
        'progress_percentage' => 'integer',
    ];

    public static function generateToken(): string
    {
        return Str::random(32);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Calculate filled progress percentage (0 - 100)
     */
    public function calculateProgressPercentage(): int
    {
        $fields = [
            'company_info',
            'contact_info',
            'social_media',
            'business_info',
            'website_content',
            'portfolios_projects',
            'testimonials',
            'faqs',
            'gallery_files',
            'blog_info',
            'seo_info',
            'domain_hosting',
            'email_info',
            'features_checklist',
            'design_references',
            'target_website',
            'cta_info',
            'legality_files',
            'supporting_files',
            'additional_notes',
        ];

        $filled = 0;
        foreach ($fields as $field) {
            $val = $this->{$field};
            if (!empty($val)) {
                if (is_array($val)) {
                    // Check if array has non-empty elements
                    $nonEmpty = array_filter($val, fn($v) => !empty($v));
                    if (count($nonEmpty) > 0) {
                        $filled++;
                    }
                } else if (trim((string) $val) !== '') {
                    $filled++;
                }
            }
        }

        return (int) round(($filled / count($fields)) * 100);
    }
}
