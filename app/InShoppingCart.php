<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    public function shopping_carts(){
        return $this->hasMany("App\InShoppingCart");
    }
}
