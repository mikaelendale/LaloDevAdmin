<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'content',
        'excerpt',
        'slug',
        'featured_image',
        'status',
        'published_at',
        'seo_title',
        'meta_description',
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the user that owns the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
