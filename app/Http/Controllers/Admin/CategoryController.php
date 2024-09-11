<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $category_columns = ['name', 'description'];
    public function index()
    {
        $categories = AdminCategory::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = AdminCategory::find($id);//  find the id of column selected to edit
        return view('admin/categories/edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => 'required']);
        AdminCategory::where('id', $id)->update($request->only($this->category_columns));
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');//return directly to categories.index when success
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
