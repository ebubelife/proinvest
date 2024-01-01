<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use Illuminate\Support\Facades\Session;
use App\Models\Members;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/about', function () {
    return view('about');
})->name('about');



Route::get('/focus', function () {
    return view('services');
})->name('focus');



Route::get('/contact', function () {
    return view('contact');
})->name('contact');




Route::get('/register/{plan}', function ($plan) {

    //save selected plan to session
    Session::put('selected_plan', $plan);

    session()->flash('success', 'You\'ve selected the  '.$plan  .'  plan');

    return view('register', ['plan' => $plan]); // Pass the plan to the view
})->name('register.plan'); // Assign a single name

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/admin', function () {
    return view('admin');
})->name('admin');


Route::get('/plans', function () {
    return view('plans');
})->name('plans');




Route::get('/user/invest', function () {
    return view('/user/invest');
})->name('invest');



Route::get('/user/referrals', function () {

    //get referral code of user from session
    $referral_code = Session::get('user_ref');

    $referrals = Members::where('referrer1', $referral_code)
    ->orWhere('referrer2', $referral_code)
    ->orWhere('referrer3', $referral_code)
    ->get();

    
    return view('/user/referrals', ['referrals' => $referrals]);
})->name('referrals');


Route::get('/user/deposit', function () {
    return view('/user/deposit');
})->name('deposit');


Route::get('/user/withdrawals', function () {
    return view('/user/withdrawals');
})->name('withdrawals');


Route::get('/user/profile', function () {
    return view('/user/profile');
})->name('profile');



Route::get('/ref/{ref_code}', function ($ref_code) {
    // Perform any necessary logic based on $ref_code

    Session::put('referred_by', $ref_code);

    // Redirect to another route (e.g., 'index')
    return redirect()->route('home'); // Replace 'index' with your route name
});


Route::post( '/add_member', [MembersController::class, 'addMember'])->name('add_member');


Route::post( '/login', [MembersController::class, 'login'])->name('login');
