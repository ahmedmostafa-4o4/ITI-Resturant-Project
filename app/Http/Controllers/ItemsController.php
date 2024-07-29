<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::all();
        return view('dashboard.items', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.addItem', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'itemDate' => 'required|string',
            'license' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|min:1'
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $filePath = $request->file('image')->storeAs('images', $fileName, 'public');
        } else {
            $filePath = null;
        }




        $item = new Items();
        $item->title = $request->title;
        $item->license = $request->license;
        $item->price = $request->price;
        $item->itemDate = $request->itemDate;
        $item->isActive = $request->isActive ?? "off";
        $item->category = $request->category;
        $item->image = $filePath;
        $item->created_at = now();
        $item->updated_at = now();
        $item->save();
        return redirect()->route('items')->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = Items::find($id);
        $category = Category::all();
        return view('dashboard.editItem', ['items' => $items, 'categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'itemDate' => 'required|string',
            'price' => 'required|numeric|min:0',
            'license' => 'required',
            'category' => 'required|min:1'
        ]);
        $items = Items::find($id);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $filePath = $request->file('image')->storeAs('images', $fileName, 'public');
        } else {
            $filePath = $items->image;
        }

        if ($items) {
            $items->update([
                'title' => $request->title,
                'itemDate' => $request->itemDate,
                'price' => $request->price,
                'license' => $request->license,
                'category' => $request->category,
                'isActive' =>  $request->isActive ?? "off",
                'image' => $filePath,
                'updated_at' => now(),
            ]);
            return redirect()->route('items')->with('success', 'Item updated seccessfully');
        } else {
            return redirect()->route('items')->with('error', 'Item did not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Items::find($id)->delete();
        return redirect()->route('items')->with('success', 'Item Deleted Seccessfully');
    }
}
