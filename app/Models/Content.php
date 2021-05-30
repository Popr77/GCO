<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_type_id',
        'lesson_id',
        'content',
    ];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    public function type() {
        return $this->belongsTo(ContentType::class,'content_type_id');
    }

}
