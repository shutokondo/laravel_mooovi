<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Review;
use DB;
use View;
use Log;

class RankingController extends Controller
{
    public function __construct()
    {
        $reviewSort = Review::select(DB::raw('count(*) as num, product_id'))->groupBy('product_id')->orderBy('num', 'DESC')->take(5)->get();
        $productRanks = $reviewSort->map(function($review)
        {
            return Product::find($review->product_id);
        });
        View::share('ranking', $productRanks);
    }
}
