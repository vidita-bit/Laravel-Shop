<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    public function create(){
        $product = new Product();
        return view('admin.products.create',compact('product'));
    }

    public function store(Request $request){
        //dd($request->all());

        //validate
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|required',
        ]);
        //upload
        if($request->hasfile('image')){
            $image = $request->image;
            $image->move('uploads',$image->getClientOriginalName());
        }
        //save the data
        Product::create([
            'name' => $request->name,
            'price'=> $request->price,
            'description'=> $request->description,
            'image' => $request->image->getClientOriginalName()
        ]);

        //session message
        $request->session()->flash('msg','Your Product has been added');

        //redirect
        return redirect('admin/products/create');

    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit',compact('product'));
    }

    public function update(Request $request, $id){
        //find the product
        $product = Product::find($id);

        //validate the form
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        //check the image
        if($request->hasfile('image')){

            //delete old image
            if(file_exists(public_path('uploads/').$product->image)){
                unlink(public_path('uploads/').$product->image);
            }
            //upload new image
            $image = $request->image;
            $image->move('uploads',$image->getClientOriginalName());

            $product->image= $request->image->getClientOriginalName();
        }

        //updating the product
        $product->update([
            'name' => $request->name,
            'price'=> $request->price,
            'description'=> $request->description,
            'image' => $product->image
        ]);
        //store the message in session
        session()->flash('msg','Product has been Updated');

        //redirect
        return redirect('admin/products');
    }

    public function show($id){
        $product = Product::find($id);

        return view('admin.products.details',compact('product'));
    }

    public function destroy($id){
        Product::destroy($id);

        session()->flash('msg','Product has been deleted');

        return redirect('admin/products');
    }
}
