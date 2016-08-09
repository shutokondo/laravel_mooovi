<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function review_average()
    {
        return round($this->reviews()->avg('rate'));
    }
}
