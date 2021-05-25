<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $with=[
        'answers'
    ];

    protected $fillable=[
        'lesson_id',
        'question'
    ];

    public function answers() {
        return $this->hasMany(Answer::class)->orderBy('id');
    }

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
}
