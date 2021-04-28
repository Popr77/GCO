<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\SubSubCategory;

class SubCategory extends Model
{
    use HasFactory;

    protected $with = ['subsubcategories'];

    public function category() {
      return $this->belongsTo(Category::class);
    }

    public function subsubcategories() {
      return $this->hasMany(SubSubCategory::class);
    }
}
