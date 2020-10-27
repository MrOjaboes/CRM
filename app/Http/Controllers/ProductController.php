<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
class ProductController extends Controller
{
  public function Index()
  {
    $products = Product::orderBy('created_at','desc')->get();
    return view('products.index',compact('products'));
  }
  public function products()
  {
    $products = Product::orderBy('created_at','desc')->get();
    return view('products.products',compact('products'));
  }

    public function Create()
    {
      return view('products.create');
    }

    
    public function Store(Request $request)
    {
      $request->validate([
            
        'title' =>'required',                       
        
    ]);
    auth()->user()->products()->create([             
        'title' =>$request['title'],
         'user_id'=>auth()->user()->id,         
      ]);
      return redirect()->route('admin.products')->with('success', 'Product Added succesfully');

      
    }
         

    public function Edit(Product $product)
    {
      
      return view('products.edit', compact('product'));
    }

    public function Update(Request $request, Product $product) 
     {
      $this->validate($request, [
        'title' => '',
    ]);
    $data = $request->all();         
    $product->update($data);
    return redirect()->route('admin.products')->with('success', 'Product updated succesfully');
    }

    public function Delete(Request $request, Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Product Deleted succesfully');
    }
}
