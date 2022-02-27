<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function show($slugCat) {
        $category = Category::where("slugCat", $slugCat)->with("posts")->first();
        return response()->json($category);
    }
}
