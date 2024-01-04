<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function login(Request $request){


        if ($request->isMethod('post')) {

       $validatedData = $request->validate([
        
           'email' => 'required|string',
       
           'password' => 'required|string',
          // 'plan' => 'required|string',
   
     
       
       ]);

       $user = Admin::where('email',strtolower($request->email) )
       // ->where('is_payed', "true")
        ->first();

        if (!$user ) {
             return response()->json(['message'=>'That email doesn\'t exist.'],405);
        }
        else if(!Hash::check($request->password, $user->password)){
            return response()->json(['message'=>'That password is wrong.'],405);

        }


        Session::put('user_id', $user->id); // Assuming $user->id is the user's ID
       
        Session::put('user_name', $user->name);
       
        Session::put('user_email', $user->email);

        Cookie::queue('user_id', 'user_id', 7000);
        

        session()->flash('success', 'Login successfully!');

        return redirect()->route('control'); // Redirect to a success page or another route


    }
     

   
}


public function addAdmin(Request $request){


    if ($request->isMethod('get')) {

 

   
   // Create a new user record in the database
   $user = Admin::create([
       'name' => "Super Admin",
       'email' => "admin@proinvest.com",
       
       'password' => Hash::make("PROinvest@2024"),
      
      
      // 'plan' => $validatedData['plan'],
        
     
     
   ]);

   if($user){


    Session::put('user_id', $user->id); // Assuming $user->id is the user's ID
   
    Session::put('user_name', $user->name);
   
    Session::put('user_email', $user->email);

    Cookie::queue('user_id', 'user_id', 7000);

    return "Done";
    

    session()->flash('success', 'Admin account created successfully!');

    return redirect()->route('control'); // Redirect to a success page or another route


}
}

}

    
}
