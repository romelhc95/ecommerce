<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = ['status'];

    public function productSize(){
        return $this->id;
    }

    public static function findOrCreateBySessionID($shopping_cart_id){
        if ($shopping_cart_id){
            //Buscar el carrito de comprar con el ID
            return ShoppingCart::findBySession($shopping_cart_id);
        }else{
            //Crear el carrito de compras
            return ShoppingCart::createWithoutSession();
        }
    }

    /**
     * @param $shopping_cart_id
     * @return \Illuminate\Database\Eloquent\Collection|Model|null|static|static[]
     */
    public static function findBySession($shopping_cart_id){
        return ShoppingCart::find($shopping_cart_id);
    }

    /**
     * @return $this|Model
     */
    public static function createWithoutSession(){
//        $shopping_cart = new ShoppingCart;
//        $shopping_cart->status = 'incompleted';
//        $shopping_cart->save();
//        return $shopping_cart;

        return ShoppingCart::create([
            "status" => "incompleted"
        ]);
    }
}
