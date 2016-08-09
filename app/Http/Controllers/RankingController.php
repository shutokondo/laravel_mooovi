<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;
use App\Review;
use DB;

class RankingController extends Controller
{
    public $layout = "layouts.review_site";
}
