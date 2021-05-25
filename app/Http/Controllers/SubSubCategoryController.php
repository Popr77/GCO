<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsubcategories = SubSubCategory::all();
        return view('pages.admin.subsubcategories.subsubcategories', ['subsubcategories' => $subsubcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();

        return view('pages.admin.subsubcategories.create-subsubcategory', ['subcategories' => $subcategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_category_id' => 'required',
            'name' => 'required'
        ]);

        SubSubCategory::create($request->all());

        return redirect('dashboard')->with('status', 'Sub Sub Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubSubCategory $subSubCategory)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubSubCategory $subsubcategory)
    {
        $subcategories = SubCategory::all();

        return view('pages.admin.subsubcategories.edit-subsubcategory', ['subsubcategory' => $subsubcategory, 'subcategories' => $subcategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSubCategory $subsubcategory)
    {
        $subsubcategory->update($request->all());

        return redirect('dashboard')->with('status','Sub Sub Category edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSubCategory $subsubcategory)
    {
        $subsubcategory->delete();

        return redirect('dashboard')->with('status', 'Sub Sub Category deleted successfully!');
    }
}
