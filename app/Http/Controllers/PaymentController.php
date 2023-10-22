<?php

namespace App\Http\Controllers;


use DB;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
       
        $request->validate([
            'amount' => 'required|numeric',
           
        ]);
    
       
        DB::beginTransaction();
    
        try {
           
            $payment = Payment::create([
                'amount' => $request->amount,
                'user_id' => auth()->user()->id,
                'status' => 'pending', 
            ]);
    
           
            $payment->update(['status' => 'paid']);
    
            DB::commit();
    
            
            return redirect()->route('payments.confirmation');
        } catch (Exception $e) {
           
            DB::rollBack();
    
          
            return redirect()->route('payments.error')->with('error', 'Payment failed. Please try again.');
        }
    }
    public function confirmation()
{
 
    return view('payments.confirmation');
}
public function create()
{
    
    return view('payments.create');
}
public function error()
{
   
    return view('payments.error');
}
}
