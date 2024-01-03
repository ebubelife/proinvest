<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransactionsController extends Controller
{
    public function deposit(Request $request)
    {

        if ($request->isMethod('post')) {

        $validatedData = $request->validate([
            'user_id' => 'required|string',
            'amount' => 'required|string',
            'wallet-address' => 'required|string',
    
            'transaction-hash' => 'required|string',
    
            'asset-selected' => 'required|string', 
    
        
          
    
    
    
            
        
        ]);

       // $user_id = Session::put('user_id');


         // Create a new user record in the database
         $newTransaction = Transactions::create([
            'amount' => $validatedData['amount'],
            'user_id' => $validatedData['user_id'],
            'wallet_address' => $validatedData['wallet-address'],
            'hash' => $validatedData['transaction-hash'],
            
            'asset' => $validatedData['asset-selected'],
            'type' => "DEPOSIT",
            'status' => "PENDING",
           // 'user_id'=>$user_id
         
           // 'plan' => $validatedData['plan'],
             
          
          
        ]);

        if($newTransaction){

            session()->flash('success', 'Your transaction is processing...');
    
            return redirect()->route('deposit_success');

        }

     

        
      
        } else {
            // For the GET request (rendering the form)
            return view('user/deposit'); // Assuming 'plans' is the view for the form
        }




       
    }

}
