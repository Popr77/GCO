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

    public function contents(){
//        return $this->belongsTo('App\Models\Content');
        return $this->hasMany(Content::class);
    }
}
