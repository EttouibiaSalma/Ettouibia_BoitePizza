<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Formule;

class FrontController extends Controller
{
    protected function productsList(){
        $products = Product::all();
        $formules = Formule::all();
        return view('welcome')->with('products',$products)->with('formules',$formules);
    }
}
