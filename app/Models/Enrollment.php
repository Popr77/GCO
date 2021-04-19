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
}