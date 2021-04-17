<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'lesson_number',
        'module_id'
    ];

    public function module() {
        return $this->belongsTo(Module::class);
    }

    public function contents() {
        return $this->hasMany(Content::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
