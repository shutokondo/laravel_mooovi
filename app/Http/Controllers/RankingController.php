<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Review;
use DB;

class RankingController extends Controller
{
    public function __construct()
    {
        $productRanks = Review::ranking()->get()->map(function($review)
        {
            return Product::find($review->product_id);
        });

        $this->ranking = $productRanks;
    }
}
