<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(){
        return view('front.cart.index');
    }
    public function store(Request $request){
        $dubl = Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });
        if($dubl->isNotEmpty()){
            return redirect()->back()->with('msg','Item is already in your Cart');
        }
        Cart::add($request->id,$request->name,1,$request->price)->associate('App\Product');
        return redirect()->back()->with('msg','Item has added to cart');
    }
    public function destroy($id){
        Cart::remove($id);
        return redirect()->back()->with('msg','Item has been from cart');
    }
    public function saveLater($id){
        $item = Cart::get($id);
        Cart::remove($id);
        $dubl = Cart::instance('saveforLater')->search(function($cartItem, $rowId) use ($item){
            return $cartItem->id === $item->id;
        });
        if($dubl->isNotEmpty()){
            return redirect()->back()->with('msg','Item has already been saved for Later');
        }
        Cart::instance('saveforLater')->add($item->id,$item->name,1,$item->price)->associate('App\Product');
        return redirect()->back()->with('msg','Item has been saved for Later'); 

    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between: 1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors','Quantity must be between 1 and 5');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->quantity);

        session()->flash('msg','Quantity has been updated');

        return response()->json(['success' => true]);

    }
}
