<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:categories'
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->created_at = now();
        $category->updated_at = now();
        $category->save();
        return redirect()->route('categories')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $title)
    {
        $cat = Category::select()->where('title', $title)->get();
        return view('dashboard.editCategory',  ['category' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $title)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $category = Category::where('title', $title)->first();

        if ($category) {
            $category->where('title', $title)->update([
                'title' => $request->title,
                'updated_at' => now(),
            ]);
            return redirect()->route('categories')->with('success', 'Category updated seccessfully');
        } else {
            return redirect()->route('categories')->with('error', 'Category did not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category)
    {
        Category::where('title', $category)->delete();
        return redirect()->route('categories')->with('success', 'Category removed seccessfully');
    }
}
