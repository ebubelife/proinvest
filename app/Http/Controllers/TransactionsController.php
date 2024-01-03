<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\Members;
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

            $userToUpdate= Members::find($validatedData['user_id']);

            if ($userToUpdate) {
                // Update the deposit_balance column
                $current_deposit_balance = $userToUpdate->deposit_balance;
                $newDepositBalance = 500; // Replace this with the new deposit balance value
                $userToUpdate->deposit_balance = intval($validatedData['amount']) + intval($current_deposit_balance);
                $userToUpdate->save();
            
             
            } else {
                session()->flash('error', 'Your transaction is processing...');
    
            return redirect()->route('An error occured');
            }

            session()->flash('success', 'Your transaction is processing...');
    
            return redirect()->route('deposit_success');

        }

     

        
      
        } else {
            // For the GET request (rendering the form)
            return view('user/deposit'); // Assuming 'plans' is the view for the form
        }




       
    }

}
