<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userpage extends Model
{
    use HasFactory;

    protected $table = "userpage";

    protected $fillable = [
        'info',
        'page_status',
        'reason',
        'description',
        'user_id', // assuming you have a user_id foreign key
    ];

    /**
     * Get the user that owns the user page.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming User is your user model
    }
}
