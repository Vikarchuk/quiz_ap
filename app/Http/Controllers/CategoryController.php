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
        $tests = $category->tests;
        $tests = $this->transform($tests);
        return response()->json(['category' =>$category, 'tests' => $tests]);
    }

    private function transform($collection) {
        return $collection->map(function($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'performance_time' => $item->performance_time,
            ];
        });

    }


}
