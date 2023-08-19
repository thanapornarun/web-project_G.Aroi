<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
        return view('welcome');
});

Route::get('/', [EventController::class, 'showWelcomeWithLatestEvent'])->name('event');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

/* The code `Route::middleware('auth')->group(function () { ... })` is creating a group of routes that
        require authentication. This means that the routes inside this group can only be accessed by
        authenticated users. */
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/profile', [ProfileController::class,'index'])->name('budget.index');

Route::resource('/{event}/budget',BudgetController::class);

Route::get('/{event}/budget/create',[BudgetController::class,'createExpense'])->name('budget.expense.create');

Route::post('/{event}/budget/create',[BudgetController::class,'storeExpense'])->name('budget.expense.store');

Route::resource('/profile', ProfileController::class);

Route::resource('/my_event', EventController::class);

// Route::get('/my_event', [EventController::class, 'showUserEvents'])->name('ownEvents');

Route::get('/my_events', [EventController::class, 'index'])
        ->name('events.index');


// Route::get('/{user}/my_event', function () {
//         return view('event.show-own-event');
// });

// Route::get('/{user}/my_event', [EventController::class, 'showUserEvents'])->name('user.my_event');

Route::get(
        '/{user}/profile',
        [UserController::class, 'createProfile']
)->name('users.profile.create');

Route::post(
        '/{user}/profile',
        [UserController::class, 'storeProfile']
)->name('users.profile.store');


// Route::get('/profile', [ProfileController::class, 'index'])
//     ->name('profile.index');

// Route::get('/web-login', LoginController::class)->name('web.login');

// show form route
// Route::get('web-login', 'Auth\LoginController@showLoginForm');
// // post credential to the login method
// Route::post('web-login', 'Auth\LoginController@login')->name('web-login');
// // remove default login route
// Auth::route(['login' => false]);

require __DIR__ . '/auth.php';
