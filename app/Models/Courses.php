<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model 
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'duration',
        'category',
        'level',
        'status',
        'outcomes',
        'start_date',
        'instructor_experience',
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];
    // App\Models\Course.php
public function subsections()
{
    return $this->hasMany(Subsection::class, 'course_id');
}
public function enrollments()
{
    return $this->hasMany(Enrollment::class, 'course_id');
}
public function badges()
    {
        return $this->belongsToMany(Badge::class, 'course_badges', 'course_id', 'badge_id');
    }
public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'course_id');
    }
}
