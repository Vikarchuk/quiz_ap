<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Test;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(['id','title']);
        return response()->json($categories);
    }
    public function show(Category $category)
    {
        return response()->json(['category' => $category]);
    }

}
