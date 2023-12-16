<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::orderBy('id')->get();

        return response()->json($category);
    }

    public function view(Category $category){
        $category->load('products');
        return response()->json($category);
    }

    public function store(Request $request, Category $category){
        $fields = $request->validate([
            'category' => 'required',
        ]);

        $category = Category::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Customer has been added with an ID #'.$category->id
        ]);
    }

    public function update(Request $request, Category $category){
        $fields = $request->validate([
            'category' => 'required|string',
        ]);

        $category->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Customer has been updated.'
        ]);
    }

    public function destroy(Category $category) {
        $category->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => 'Customer has been deleted.'
        ]);
    }
}
