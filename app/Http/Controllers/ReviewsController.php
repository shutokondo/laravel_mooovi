<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Review;
use Auth;

class ReviewsController extends Controller
{
    public function create($id)
    {
        if (Auth::guest())
        {
            return redirect('/login');
        }

        $product = Product::find($id);
        $review = new Review();

        return view('reviews.create')->with(['product' => $product, 'review' => $review]);
    }

    public function store(Request $request)
    {
        Review::create([
          'user_id'     => $request->user()->id,
          'rate'        => $request->rate,
          'review'      => $request->review,
          'product_id'  => $request->products,
        ]);

        return redirect()->route('products.index');
    }
}
