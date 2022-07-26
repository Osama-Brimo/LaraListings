<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Listing Routing //

$idRegExConstraint = '[0-9]+';

//Index - show all listings
Route::get('/', [ListingController::class, 'index'])->name('home');

//Create - show create listing form
Route::get('/listings/create', [ListingController::class, 'create'])
->middleware('auth');

//Store - store listing data
Route::post('/listings', [ListingController::class, 'store'])
->middleware('auth');

//Edit - show edit listing form
Route::get('/listings/edit/{listing}', [ListingController::class, 'edit'])
->where('listing', $idRegExConstraint)
->middleware('auth');

//Update - update listing data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->where('listing', $idRegExConstraint)
->middleware('auth');

//Destroy - remove listing data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->where('listing', $idRegExConstraint)
->middleware('auth');

//Show - show single listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])
->where('listing', $idRegExConstraint);




// User Routing //

// Login 
Route::get('/user/login', [UserController::class, 'login'])
->name('login')
->middleware('guest');

Route::post('/user/login', [UserController::class, 'authenticate'])
->middleware('guest');

Route::get('/user/logout', [UserController::class, 'logout'])
->middleware('auth');
//

//Create - Show registration form
Route::get('/user/register', [UserController::class, 'create'])
->middleware('guest');

//Store - store new user data
Route::post('/user', [UserController::class, 'store'])
->middleware('auth');

//Update - update user data
Route::put('/user/{user}', [UserController::class, 'update'])
->where('user', $idRegExConstraint)
->middleware('auth');

//Destroy - remove user data
Route::delete('/user/{user}', [UserController::class, 'destroy'])
->where('user', $idRegExConstraint)
->middleware('auth');

//Show - show information about given user
Route::get('/user/{user}', [UserController::class, 'show'])
->where('user', $idRegExConstraint);

