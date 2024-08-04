<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintainance extends Model
{
    use HasFactory;
    protected $table = "maintainance";

    protected $fillable = [
        'email',
        'title',
        'description',
        'time_line_status',
        'time_line_1',
        'time_line_1_header',
        'time_line_1_description',
        'time_line_1_link',
        'time_line_2',
        'time_line_2_header',
        'time_line_2_description',
        'time_line_2_link',
        'time_line_3',
        'time_line_3_header',
        'time_line_3_description',
        'time_line_3_link',
        'time_line_4',
        'time_line_4_header',
        'time_line_4_description',
        'time_line_4_link',
    ];

    /**
     * Get the user that owns the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
