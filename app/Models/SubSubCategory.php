<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['sub_category_id', 'name'];

    public function subcategory() {
      return $this->belongsTo(SubCategory::class , 'sub_category_id');
    }

    public function courses() {
      return $this->hasMany(Course::class);
    }
}
