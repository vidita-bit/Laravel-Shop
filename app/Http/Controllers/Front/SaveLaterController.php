<?php

namespace App\Http\Controllers\Front;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveLaterController extends Controller
{
    public function destroy($id){
        Cart::instance('saveforLater')->remove($id);
        return redirect()->back()->with('msg','Item has been removed from save for later');
    }
    public function moveToCart($id){
        $item = Cart::instance('saveforLater')->get($id);
        Cart::instance('saveforLater')->remove($id);
        $dubl = Cart::instance('saveforLater')->search(function($cartItem, $rowId) use ($item){
            return $cartItem->id === $item->id;
        });
        if($dubl->isNotEmpty()){
            return redirect()->back()->with('msg','Item has already been saved for Later');
        }
        Cart::instance('default')->add($item->id,$item->name,1,$item->price)->associate('App\Product');
        return redirect()->back()->with('msg','Item has been Moved to Cart'); 

    }
}
