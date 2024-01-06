<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class MembersController extends Controller
{
   

    //Add new member

  

    public function addMember(Request $request)
    {

        if ($request->isMethod('post')) {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:members',
            'phone' => 'required|string',
    
            'email_confirm' => 'required|string',
    
            'referrer' => 'nullable|string', 
    
            'wallet' => 'required|string',
    
            'password' => 'required|string|min:8',
           // 'plan' => 'required|string',
    
    
    
            
        
        ]);

        //generate referral code

        $hashed_password = Hash::make($validatedData["password"]);

        //generate referral code
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = substr(str_shuffle($characters), 0, 5);
        $referrer1 = NULL;
        
        $referrer1_info = NULL;
       

        if (array_key_exists('referrer', $validatedData) || $referrer1 != NULL ) {

            $referrer1 = $validatedData['referrer'];

         

            //get first upline info and other uplines
            $referrer1_info =  Members::where("referral_code",$referrer1 )->first();

          


            
        } 
       
       

        //get selected plan from session
        $selected_plan = Session::get('selected_plan');


    
        // Create a new user record in the database
        $user = Members::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($validatedData["password"]),
            'wallet_address' => $validatedData['wallet'],
            'referrer1' => $referrer1,
            'referral_code' => $random_string,
            'referrer1'=>$referrer1,
            'referrer2'=> $referrer1_info->referrer1,
            'referrer3'=> $referrer1_info->referrer2,
           
           // 'plan' => $validatedData['plan'],
             
          
          
        ]);

        if($user){

           

            Session::put('user_id', $user->id); // Assuming $user->id is the user's ID
            Session::put('user_plan', strtoupper($user->plan));
            Session::put('user_name', $user->name);
            Session::put('user_ref', $user->referral_code);
            Session::put('deposit_balance', $user->deposit_balance);
            Session::put('ref_balance', $user->ref_balance);
            

            session()->flash('success', 'Account created successfully!');
    
            return redirect()->route('admin'); // Redirect to a success page or another route

        }

        
      
        } else {
            // For the GET request (rendering the form)
            return view('plans'); // Assuming 'plans' is the view for the form
        }




       
    }




    public function updateMember(Request $request)
    {

        if ($request->isMethod('post')) {

        $validatedData = $request->validate([

            'id' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'ref' => 'required|string',
            'deposit' => 'required|string',
            'roi' => 'required|string'
    
          
         
        ]);

       


    
        // Create a new user record in the database


            $user = Members::find($validatedData['id']);
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->ref_balance = $validatedData['ref'];
            $user->deposit_balance = $validatedData['deposit'];
            $user->balance = $validatedData['roi'];

            if($user->save()){

                session()->flash('success', 'user has been successfully updated');
    
                return redirect()->route('admin_view_user', ['id' => $user->id]);
    



            }
            
           
           
           // 'plan' => $validatedData['plan'],
             
          
        
      
        } else {
            // For the GET request (rendering the form)
            return view('admin.view_user'); // Assuming 'plans' is the view for the form
        }




       
    }




    public function searchMember(Request $request)
    {

        if ($request->isMethod('post')) {

        $validatedData = $request->validate([

          
            'term' => 'required|string',
            
      
         
        ]);

       


    
        // Create a new user record in the database

        $term = $validatedData['term'];


        $users = Members::where(function($query) use ($term) {
            $query->where('email', 'LIKE', "%$term%")
                  ->orWhere('name', 'LIKE', "%$term%");
        })->get();

            if(count($users)>0){

                session()->flash('success', 'user has been successfully retrieved');
    
                return view('admin.users', ['users' => $users]);
    



            }
            else{

                session()->flash('success', 'No user was found');
    
                return view('admin.users', ['users' => $users]);
    


            }
           
           
           // 'plan' => $validatedData['plan'],
             
          
        
      
        } else {
            // For the GET request (rendering the form)
            return view('admin.view_user'); // Assuming 'plans' is the view for the form
        }




       
    }




    public function login(Request $request){


         if ($request->isMethod('post')) {

        $validatedData = $request->validate([
         
            'email' => 'required|string',
        
            'password' => 'required|string',
           // 'plan' => 'required|string',
    
      
        
        ]);

        $user = Members::where('email',strtolower($request->email) )
        // ->where('is_payed', "true")
         ->first();
 
         if (!$user ) {
              return response()->json(['message'=>'That email doesn\'t exist.'],405);
         }
         else if(!Hash::check($request->password, $user->password)){
             return response()->json(['message'=>'That password is wrong.'],405);
 
         }


         Session::put('user_id', $user->id); // Assuming $user->id is the user's ID
         Session::put('user_plan', strtoupper($user->plan));
         Session::put('user_name', $user->name);
         Session::put('user_ref', $user->referral_code);
         Session::put('deposit_balance', $user->deposit_balance);
         Session::put('ref_balance', $user->ref_balance);
         Session::put('roi_balance', $user->balance);

         Cookie::queue('user_id', 'user_id', 7000);
         

         session()->flash('success', 'Login successfully!');
 
         return redirect()->route('admin'); // Redirect to a success page or another route


    }
}



}
