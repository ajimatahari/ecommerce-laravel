<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function category() {
      return $this->belongsTo('App\Category');
    }

    public function orders() {
      return $this->belongsToMany('App\Order');
    }

    public function images() {
      return $this->hasMany('App\ProductImage');
    }

    public function reviews() {
      return $this->hasMany('App\Review');
    }
}
