<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EventAttendeeController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Models\EventAttendee;
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

Route::resource('/profile', ProfileController::class);

Route::get('/profile/{profile}/editProfile', [ProfileController::class, 'editProfile'])->name('editProfile');

Route::post('/profile/{profile}/editProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');

// Route::get('/events', [EventController::class, 'index'])
//         ->name('events.index');

// Route::resource('/event', Event::class);

Route::resource('/event', EventController::class);


//Route::resource('/create_event', EventController::class);
Route::resource('/eventAttendee', EventAttendeeController::class);        


// Route::resource('/event', EventController::class);

// Route::post('/event/{event}', [EventController::class, 'userJoinEvent'])->name('join.event');

Route::middleware(['auth'])->group(function () {
        Route::post('/event/{event}/join', [EventController::class, 'userJoinEvent'])->name('joinEvent');
    });

Route::get('/', [EventController::class, 'showWelcomeWithLatestEvent'])->name('show.latestEvent');


Route::get('/event/{event}/certificate', function ($event) {
        $events = Event::find($event);
        return view('certificate.index',['event'=>$events]);
    })->name("certificate");
    

// Route::get('/', [EventController::class, 'showWelcomeWithLatestEvent'])->name('show.latestEvent');

Route::get('/event/{event}/manager', [EventController::class, 'teamManager'])->name('eventManager');

Route::post('/event/{event}/manager', [EventController::class, 'setTeamManager'])->name('setEventRoleManager');

Route::get('/event/{event}/setStatus', [EventController::class, 'setStatus'])->name('setStatusManager');

Route::post('/event/{event}/setStatus', [EventController::class, 'setEventAttendeeStatus'])->name('setStatusAttendeeManager');

// Route::post('/event/{event}/manager', [EventAttendeeController::class, 'setStatus'])->name('setStatusManager');

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
// Route::get('/profile', [ProfileController::class,'index'])->name('budget.index');

Route::resource('/event/{event}/budget',BudgetController::class);

Route::get('/event/{event}/budget/create',[BudgetController::class,'create'])->name('budget.create');

Route::post('/event/{event}/budget/create',[BudgetController::class,'store'])->name('budget.save');

Route::get('/event/{event}/budget/{budget}/{expense}',[BudgetController::class,'showExpense'])->name('expense.show');

Route::get('/eventCreate/{event}/budget/{budget}',[BudgetController::class,'createExpense'])->name('build.expense');

Route::post('/eventCreate/{event}/budget/{budget}',[BudgetController::class,'storeExpense'])->name('save.expense');

// Route::get('/event/{event}/budget/{budget}/create',[BudgetController::class,'createExpense'])->name('build.expense');




// Route::get('/event', [EventController::class, 'showUserEvents'])->name('ownEvents');






// Route::get('/{user}/event', function () {



// Route::get('/{user}/event', function () {
//         return view('event.show-own-event');
// });

// Route::get('/{user}/event', [EventController::class, 'showUserEvents'])->name('user.event');



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
