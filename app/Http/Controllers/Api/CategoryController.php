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
        // Gestione 404 per i path come: /categories/*
        if (empty($category)) {
            return response()->json(["message" => "Category Not Found"], 404);
        }
        return response()->json($category);
    }
}
