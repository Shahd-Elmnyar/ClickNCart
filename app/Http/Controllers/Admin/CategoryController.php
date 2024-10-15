<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        // $this->middleware('auth'); //ensure if the logged in or not(redirect to logging in )
    }
    private $category_columns = ['name', 'content','slug','img','active','created_by','parent_id'];

    public function index()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $products = Product::all();
        return view('categories.index', compact(['categories','products']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', Category::class);// Only allow if authorized
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $products = Product::all();

        return view('categories.create', compact(['categories','products']));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Category $category)
    {
        // $this->authorize('create', Category::class); // Only allow if authorized
        $categories = Category::all();
        $products = Product::all();

        /************* VALIDATION********************/
       $data= $request->validate(
            [
                'name' => 'required|string|max:255',
                'content' => 'nullable|string',
                'slug' => 'required|string|max:255|unique:categories',
                'img' =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'active' => 'boolean|required',
                'parent_id' => 'nullable|exists:categories,id',
                'created_by'=>'nullable',
            ]
        );

 // Handle file upload
 if ($request->hasFile('img')) {
    $imagePath = $request->file('img')->store('categories', 'public');
    $data['img'] = $imagePath;
}
$data['created_by'] = Auth::id();

// Create the category with the validated data
Category::create($data);
return redirect()->route('categories.index')->with('success', 'Category updated successfully.');

    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categories = Category::get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::get();
        $categories = Category::findOrFail($id);
        // $this->authorize('update', $category); // Only allow if authorized
        return view('categories.edit', compact(['categories','category']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // $this->authorize('update', $category); // Only allow if authorized

        $data=$request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'img' =>  'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'parent_id' => 'nullable|exists:categories,id',
            'active' => 'boolean',
            'created_by'=>'nullable',
        ]);


    // Handle file upload
    if ($request->hasFile('img')) {
        // Delete old image if exists
        if ($category->img) {
            Storage::delete('public/' . $category->img);
        }

        $imagePath = $request->file('img')->store('categories', 'public');
        $data['img'] = $imagePath;
    }

    $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the category by its ID
        $category = Category::findOrFail($id);

        // Optionally, you can uncomment this line to authorize the deletion
        // $this->authorize('delete', $category);

        // Perform the deletion
        $category->delete();

        // Redirect to the categories index with a success message
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    public function trashed()
    {
        return view('categories.trashed', compact('trashedCategories'));
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

    private function isAdmin()
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }
}
