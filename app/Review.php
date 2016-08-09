<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Review extends Model
{
    protected $fillable = ['user_id', 'rate', 'review', 'product_id'];

    public function product() {
      return $this->belongsTo(Product::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function scopeRanking($query) {
      return $query->select(DB::raw('count(*) as num, product_id'))->
          groupBy('product_id')->
          orderBy('num', 'desc')->
          take(5);
    }
}
