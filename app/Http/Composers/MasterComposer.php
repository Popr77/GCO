<?php

namespace App\Http\Composers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class MasterComposer {

    public function compose(View $view) {

        $categories = Category::all();

        $view->with('categories', $categories);
    }
}
