<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function index()
    {
        // Retrieve paginated products with their categories
        $products = Product::with('categories')->paginate(20);

        // If there are no products, display a message
        if ($products->isEmpty()) {
            $message = "No products available yet.";
            return view('products.index', compact('products', 'message'));
        }

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        try {

            $product = Product::findOrFail($id);

            return view('products.show', compact('product'));
        } catch (ModelNotFoundException $e) {
            // Redirect back with a message if the product is not found
            return redirect()->back()->with('info', 'Product not found.');
        }
    }

    public function create()
    {
        // Retrieve categories for product creation
        $categories = (new CategoryController())->get();

        return view('products.create', compact('categories'));
    }

    public function store(CreateProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        if ($request->has('description')) {
            $product->description = $request->input('description');
        }

        $product->save();
         // Attach selected categories to the product
        $product->categories()->attach($request->input('categories'));

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }
}
