<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamGrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'grade',
        'created_at'
    ];

    public function enrollment() {
        return $this->belongsTo(Enrollment::class);
    }
}
