<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    use HasFactory;

    protected $table = "sites";

    protected $fillable = [
        'blog_site_status',
        'community_site_status',
        'forum_site_status',
        'wiki_site_status',
        'feedback_site_status', 
        'Learn_site_status', 
        'url', 
    ];

    /**
     * Get the user that owns the user page.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming User is your user model
    }
}
