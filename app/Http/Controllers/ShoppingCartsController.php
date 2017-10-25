<?php

namespace App\Http\Controllers;

use App\Paypal;
use App\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartsController extends Controller
{
    public function __construct()
    {
        $this->middleware("shoppingcart");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shopping_cart = $request->shopping_cart;
//        $paypal = new Paypal($shopping_cart);
//        $payment = $paypal->generate();
//        return redirect($payment->getApprovalLink());

        $products = $shopping_cart->products()->get();
        $total = $shopping_cart->total();

        return view("shopping_carts.index", [
            'products'  => $products,
            'total'     => $total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shopping_cart = ShoppingCart::where('customid', $id)->first();
        $order = $shopping_cart->order();
        return view("shopping_carts.completed", ["shopping_cart" => $shopping_cart, "order" => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
