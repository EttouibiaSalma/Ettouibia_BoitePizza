<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Category;
use DB;

class ProductController extends Controller
{
    protected function productscategory(){
        //$products = Product::all();
        $categories = Category::all();
        
        $products=DB::table('products')->select('*')->OrderBy('category_id')->get();
        //$products=Product::with('category');
        return view('products.menu',compact('products','categories'));
    }
    protected function productdetails($id){
        $product = Product::find($id);
        $comments = Comment::where('productCode',$id)->get();
        return view('products.details',compact('product', 'comments'));
    }
}
