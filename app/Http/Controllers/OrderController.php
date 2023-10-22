<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
   

    public function resetCheckout()
    {
        

        session()->forget('cart'); 

      
        return redirect()->route('checkout')->with('success', 'Checkout has been reset.');
    }

    public function paymentSuccessful()
    {
       
        $this->resetCheckout();

        
        
        return view('payment.success'); 
    }
}
