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


         // Create a new deposit record in the database
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
              //  $newDepositBalance = 500; // Replace this with the new deposit balance value
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


    public function withdrawal(Request $request)
    {

        if ($request->isMethod('post')) {

        $validatedData = $request->validate([
            'user_id' => 'required|string',
            'amount' => 'required|string',
            
        ]);



       //get current user current balance

       $curr_user = Members::find($validatedData['user_id']);

       $total_balance = intval($curr_user->deposit_balance) + intval($curr_user->balance) + intval($curr_user->ref_balance);

       if(intval($validatedData['amount']) <= intval($total_balance)){

         // Create a new withdrawal record in the database 
         $newTransaction = Transactions::create([
            'amount' => $validatedData['amount'],
            'user_id' => $validatedData['user_id'],
            'wallet_address' => NULL,
            'hash' => NULL,
            
            'asset' => NULL,
            'type' => "WITHDRAWAL",
            'status' => "PENDING",
           // 'user_id'=>$user_id
         
           // 'plan' => $validatedData['plan'],
             
          
          
        ]);

        if($newTransaction){

            session()->flash('success', 'Your withdrawal request has been placed successfully and is processing...');
    
            return redirect()->route('withdrawals');

          
          

        }
        else{

           
          // return redirect()->route('withdrawals');

           return redirect()->route('withdrawals')->withErrors([ 'An error occured']);

        }


    
           /// return view('user/withdrawals',['total_balance'=>$total_balance]);
        

    }else{

      //  session()->flash('error', 'Withdrawal amount cannot exceed balance');
    
      //return redirect()->route('withdrawals')->withErrors(['failed2', 'Withdrawal amount cannot exceed balance']);
      return view('user/withdrawals',['total_balance'=>$total_balance])->withErrors([ 'Withdrawal amount cannot exceed total balance']);

    }

     

        
}else{


}
    
    




       
    }


    
}
