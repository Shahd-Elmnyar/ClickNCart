<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name'      => 'required|string|max:255',
                'content'   => 'required|string',
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('category_images', 'public');
            
            if (!$imagePath) {
                return back()->with('error', 'Failed to upload image. Please try again.')->withInput();
            }
        } else {
            return back()->with('error', 'Image file is required.')->withInput();
        }
        
        //  dd($request->content);
        $category = Category::create([
            'name'      => $request->name,
            'content'   => $request->content,
            'img'       => $imagePath,
        ]);

        if (!$category) {
            return back()->with('error', 'Failed to create category. Please try again.')->withInput();
        }

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $category = Category::find($id);
        return view('admin/categories/edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'content'   => 'required|string',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category->name = $validated['name'];
        $category->content = $validated['content'];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->img) {
                Storage::disk('public')->delete($category->img);
            }

            // Store new image
            $imagePath = $request->file('image')->store('category_images', 'public');
            $category->img = $imagePath;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage (soft delete).
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category moved to trash successfully.');
    }

    /**
     * Display a listing of trashed resources.
     */
    public function trashed()
    {
        $trashedCategories = Category::onlyTrashed()->get();
        return view('admin.categories.trash', compact('trashedCategories'));
    }

    /**
     * Restore the specified resource from trash.
     */
    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('categories.trashed')->with('success', 'Category restored successfully.');
    }

    /**
     * Permanently remove the specified resource from storage.
     */
    public function forceDelete($id)
    {
        $category = Category::withTrashed()->findOrFail($id);

        // Delete the associated image
        if ($category->img) {
            Storage::disk('public')->delete($category->img);
        }

        $category->forceDelete();

        return redirect()->route('categories.trashed')->with('success', 'Category permanently deleted.');
    }
}
