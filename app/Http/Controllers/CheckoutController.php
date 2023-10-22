<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 

class CheckoutController extends Controller
{
    public function index()
    {
        // Assuming you want to retrieve the user's orders for display in the checkout
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();

        // Calculate the total price of all orders (you may adjust this based on your logic)
        $totalPrice = $orders->sum('total_price');

        // Pass the orders and total price to the view
        return view('checkout.index', compact('orders', 'totalPrice'));
    }

    public function resetCheckout()
    {
        

        session()->forget('orders'); 

       
        return redirect()->route('checkout.index')->with('success', 'Checkout has been reset.');
    }
    public function success()
{
    DB::table('orders')->update(['quantity' => 0]);

   
    return redirect()->route('payments.confirmation');
}
}