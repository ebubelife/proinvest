<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function create_plan(Request $request)
    {

        if ($request->isMethod('post')) {

        $validatedData = $request->validate([
            'user_id' => 'required|string',
            'amount' => 'required|string',
            'plan' => 'required|string',
    
           
    
        
        ]);



       // $user_id = Session::put('user_id');


         // Create a new deposit record in the database
         $newTransaction = Investment::create([
            'amount' => $validatedData['amount'],
            'user_id' => $validatedData['user_id'],
            'plan' => $validatedData['plan'],
            'hash' => $validatedData['transaction-hash'],
            
            'asset' => $validatedData['asset-selected'],
            //'type' => "DEPOSIT",
            'status' => "ACTIVE",
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
                session()->flash('error', 'An error occured...');
    
            return redirect()->route('transaction_error');
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
