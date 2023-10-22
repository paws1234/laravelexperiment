<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
public function show($id)
{
    $product = Product::findOrFail($id); 
    return view('products.show', compact('product')); 
}

public function buy($id)
{
    $product = Product::findOrFail($id);
    $order = new Order();
    $order->product_id = $product->id;
    $order->user_id = auth()->user()->id; 
    $order->quantity = 1; 
    $order->total_price = $product->price * $order->quantity; 
    $order->status = 'pending'; 



    $order->save();

   
    return redirect()->route('checkout.index');
}
}

