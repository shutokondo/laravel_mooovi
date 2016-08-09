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
        $productRanks = Review::ranking()->get()->map(function($review) {
          return Product::find($review->product_id);
        });
        $this->ranking = $productRanks;
    }

    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'ASC')->take(20)->get();
        $user = Auth::user();

        return view('products.index')->with(['products' => $products, 'ranking' => $this->ranking, 'user' => $user]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show')->with('product', $product);
    }

    public function search(Request $request)
    {
        if (Auth::guest())
        {
            return redirect('/login');
        }

        $user = Auth::user();
        $keyword = $request->input('keyword');
        $products = Product::where('title', 'LIKE', "%$keyword%")->take(20)->get();

        return view('products.search')->with(['products' => $products, 'ranking' => $this->ranking, 'user' => $user]);
    }
}
