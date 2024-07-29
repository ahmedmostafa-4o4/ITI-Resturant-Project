<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function index()
    {
        $items = Items::all();
        $categories = Category::all();
        return view("restaurant.index", compact(["items", "categories"]));
    }
    function menu()
    {
        $items = Items::all();
        $categories = Category::all();
        return view("restaurant.menu", compact(["items", "categories"]));
    }
}
