<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Session;
use App\Models\Members;
use App\Models\Transactions;
use App\Http\Middleware\CheckLoggedIn;

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
})->name('admin')->middleware(CheckLoggedIn::class);


Route::get('/plans', function () {
    return view('plans');
})->name('plans');




Route::get('/user/invest', function () {
    return view('/user/invest');
})->name('invest')->middleware(CheckLoggedIn::class);



Route::get('/user/referrals', function () {

    //get referral code of user from session
    $referral_code = Session::get('user_ref');

    $referrals = Members::where('referrer1', $referral_code)
    ->orWhere('referrer2', $referral_code)
    ->orWhere('referrer3', $referral_code)
    ->get();

    
    return view('/user/referrals', ['referrals' => $referrals]);
})->name('referrals')->middleware(CheckLoggedIn::class);


Route::get('/user/deposit', function () {
    return view('/user/deposit');
})->name('deposit')->middleware(CheckLoggedIn::class);


Route::get('/user/withdrawals', function () {

    $user_id = Session::get("user_id");
    $curr_user = Members::find($user_id);

    $total_balance = intval($curr_user->deposit_balance) + intval($curr_user->balance) + intval($curr_user->ref_balance);

    
    return view('/user/withdrawals', ['total_balance'=>$total_balance]);
})->name('withdrawals')->middleware(CheckLoggedIn::class);


Route::get('/user/profile', function () {
    return view('/user/profile');
})->name('profile')->middleware(CheckLoggedIn::class);

Route::get('/user/deposit/success', function () {
    return view('/user/deposit_message');
})->name('deposit_success')->middleware(CheckLoggedIn::class);

Route::get('/user/deposit/history', function () {
    $transactions = Transactions::where("user_id", "18")->where("type", "DEPOSIT")->get();
    return view('user.deposit_history', ['transactions' => $transactions]);
})->name('deposit_history')->middleware(CheckLoggedIn::class);


Route::get('/user/withdrawal/success', function () {
    return view('/user/withdrawal_success');
})->name('withdrawal_success')->middleware(CheckLoggedIn::class);

Route::get('/user/withdrawal/history', function () {
    $transactions = Transactions::where("user_id", "18")->where("type", "WITHDRAWAL")->get();
    return view('user.withdrawal_history', ['transactions' => $transactions]);
})->name('withdrawal_history')->middleware(CheckLoggedIn::class);



Route::get('/ref/{ref_code}', function ($ref_code) {
    // Perform any necessary logic based on $ref_code

    Session::put('referred_by', $ref_code);

    // Redirect to another route (e.g., 'index')
    return redirect()->route('home'); // Replace 'index' with your route name
});


Route::post( '/add_member', [MembersController::class, 'addMember'])->name('add_member');

Route::post( '/submit_deposit', [TransactionsController::class, 'deposit'])->name('submit_deposit')->middleware(CheckLoggedIn::class);


Route::post( '/submit_withdrawal', [TransactionsController::class, 'withdrawal'])->name('submit_withdrawal')->middleware(CheckLoggedIn::class);


Route::post( '/login', [MembersController::class, 'login'])->name('login');

Route::post( '/create_plan', [TransactionsController::class, 'create_plan'])->name('create_plan')->middleware(CheckLoggedIn::class);

