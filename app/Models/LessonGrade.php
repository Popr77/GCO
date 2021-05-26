<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'enrollment_id',
        'date',
        'grade',
        'created_at'
    ];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    public function enrollment() {
        return $this->belongsTo(Enrollment::class);
    }
}
