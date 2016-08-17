<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Review;
use Auth;

class ProductsController extends RankingController
{
    public function index()
    {
        $products = Product::orderBy('id', 'ASC')->take(20)->get();

        return view('products.index')->with(['products' => $products, 'ranking' => $this->ranking]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show')->with(['product' => $product, 'ranking' => $this->ranking]);
    }

    public function search(Request $request)
    {
        if (Auth::guest())
        {
            return redirect('/login');
        }

        $user = Auth::user();
        $products = Product::where('title', 'LIKE', "%{$request->keyword}%")->take(20)->get();

        return view('products.search')->with(['products' => $products, 'ranking' => $this->ranking]);
    }
}
