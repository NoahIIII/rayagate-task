<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_Product;

class Category_ProductController extends Controller
{
    //
    public function getById($productId)
    {
        return Category_Product::where('product_id', $productId)->get();
    }
}
