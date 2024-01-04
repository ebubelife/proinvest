<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Members;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function create_plan(Request $request)
    {

        if ($request->isMethod('post')) {

        $validatedData = $request->validate([
            'user_id' => 'required|string',
            'amount' => 'required|string',
            'plan-selected' => 'required|string',
    
           
    
        
        ]);



       // set min and max values for investment plans

       $max_plan_cost = 0;
       $min_plan_cost = 0;

       if($validatedData['plan-selected'] == "STANDARD"){

           $max_plan_cost = 4000;
           $min_plan_cost = 300;


       }

       if($validatedData['plan-selected'] == "PRO"){

        $max_plan_cost = 4100;
        $min_plan_cost = 9900;


    }

    if($validatedData['plan-selected'] == "ELITE"){

        $max_plan_cost = 10000;
        $min_plan_cost = 30000;


    }

    if($validatedData['plan-selected'] == "DEX"){

        $max_plan_cost = 79750;
        $min_plan_cost = 79750;


    }

    if($validatedData['plan-selected'] == "PRO_DEX"){

        $max_plan_cost = 57050;
        $min_plan_cost = 57050;


    }

      


       $curr_user = Members::find($validatedData['user_id']);

       $total_balance = intval($curr_user->deposit_balance) + intval($curr_user->balance) + intval($curr_user->ref_balance);

       if(intval($validatedData['amount']) <= intval($total_balance)){

        if($validatedData['amount'] <=$max_plan_cost && $validatedData['amount'] >= $min_plan_cost  ){




         // Create a new deposit record in the database
         $newTransaction = Investment::create([
            'amount' => $validatedData['amount'],
            'user_id' => $validatedData['user_id'],
            'plan' => $validatedData['plan-selected'],
           
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
               // $newDepositBalance = 500; // Replace this with the new deposit balance value
                $userToUpdate->deposit_balance = intval($current_deposit_balance) - intval($validatedData['amount']) ;
                $userToUpdate->save();
            
             
            } else {
                session()->flash('error', 'An error occured...');
    
            return redirect()->route('transaction_error');
            }

            session()->flash('success', 'Your plan has been successfully created');
    
            return redirect()->route('admin');

        }

    }
    else{

//either amount is higher or lower than allowed range
return redirect()->route('invest')->withErrors([ 'Please select an amount within the range of the selected plan']);
    }


}else{
//amount selected to invest is more than balance
return redirect()->route('invest')->withErrors([ 'Amount is more than deposited balance. Please make a deposit.']);
    
}

     

        
      
        } else {
            // For the GET request (rendering the form)
            return view('user/deposit'); // Assuming 'plans' is the view for the form
        }




       
    }

   
}
