<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function subsubcategory() {
      return $this->belongsTo(SubSubCategory::class, 'sub_sub_category_id');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withPivot(['date', 'payment_status', 'feedback_stars', 'feedback_comment']);
    }

    public function modules() {
        return $this->hasMany(Module::class);
    }
}
