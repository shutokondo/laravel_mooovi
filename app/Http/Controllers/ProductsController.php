<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Review;
use Auth;

class ProductsController extends RankingController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth', array('only' => 'search'));
    }

    public function index()
    {
        $products = Product::orderBy('id', 'ASC')->take(20)->get();

        return view('products.index')->with('products', $products);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show')->with('product', $product);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $products = Product::where('title', 'LIKE', "%{$request->keyword}%")->take(20)->get();

        return view('products.search')->with('products', $products);
    }
}
