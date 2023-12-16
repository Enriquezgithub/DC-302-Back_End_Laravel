<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::orderBy('id')->get();

        return response()->json($products);
    }

    public function view(Product $product){
        $product->load('category');
        return response()->json($product);
    }

    public function store(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
            'category_id' => 'exists:categories,id|required'
        ]);

        $product = Product::create($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Product has been added with an ID #' . $product->id
        ]);
    }

    public function update(Request $request, Product $product){
        $fields = $request->validate([
            'name' => 'string',
            'price' => 'numeric',
            'qty' => 'integer',
            'category_id' =>  'exists:categories,id'
        ]);

        $product->update($fields);

        return response()->json([
            'status' => 'Ok',
            'message' => 'Product has been updated.'
        ]);
    }

    public function destroy(Product $product) {
        $product->delete();

        return response()->json([
            'status' => 'Ok',
            'message' => 'Product has been deleted.'
        ]);
    }
}
