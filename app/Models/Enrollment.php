<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    public function grades() {
        return $this->belongsToMany(Lesson::class, 'lesson_grades');
    }

    public function examGrade() {
        return $this->hasMany(ExamGrade::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
