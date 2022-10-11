<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list_product(){
        $pro = Product::paginate(6);
        if( request()->key ) {
            $key = request()->key;
            $pro = Product::where('name','LIKE','%'.$key.'%')->paginate(6);
        }
        return view('product.index',compact('pro'));
    }
    
    public function create_product( Request $req ){
        // $filled = $req->all();
        $req->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'name' => 'required',
            'price' => 'required',
            'sale_price' => 'required'
        ],[]);
        $imageName = time().'.'.$req->image->extension();
        $products = new product();
        $products->name = $req->name;
        $products->status = $req->status;
        $products->price = $req->price;
        $products->sale_price = $req->sale_price;
        $products->category_id = $req->category_id;
        $products->image = $imageName;  
        $products->save();  

        // Public Folder    
        $req->image->move(public_path('images'), $imageName);
        
        return redirect()->route('product.index');
    }

    // public function delete( Request $cats){
    //     $cats->delete();
    //     return redirect()->route('product.index');
    // }
}
