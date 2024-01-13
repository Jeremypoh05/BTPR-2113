<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\myCart;
use Auth;
use Session;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); //require login before access controller
    }

    public function addCart(){
        $r=request();
        $add=myCart::create([
            'quantity'=>$r->quantity,
            'orderID'=>'',
            'productID'=>$r->id,
            'dateAdd'=>'',
            'userID'=>Auth::id(),
        ]);
        Session::flash('success', "Item added to cart");
        return redirect()->route('showProduct');
    }

    public function view(){
        $cart=DB::table('my_carts')->leftjoin
        ('products','products.id','=','my_carts.productID')
        ->select('my_carts.quantity as cartQty',
        'my_carts.id as cid','products.*')
        ->where('my_carts.orderID','=','')
        ->where('my_carts.userID','=',Auth::id())
        ->get();
        (new CartController)->cartItem();
        // return redirect()->route('myCart');
        return view('myCart')->with('cart',$cart);
    }

    public function cartItem(){
        $cartItem=0;
        $noItem=DB::table('my_carts')
        ->leftjoin('products','products.id','=','my_carts.productId')
        ->select(DB::raw('COUNT(*) as count_item'))
        ->where('my_carts.userID','=',Auth::id())
        ->groupBy('my_carts.userID')
        ->first();
        if($noItem){
            $cartItem=$noItem->count_item;
        }
        Session()->put('cartItem',$cartItem);
    }
}
