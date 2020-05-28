<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    protected function productscategory(){
        $products = Product::all();
        $categories = Category::all();
        return view('products.menu')->with('products',$products);
    }
}
