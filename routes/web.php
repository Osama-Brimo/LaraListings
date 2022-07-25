<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
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
Route::get('/', [ListingController::class, 'index']);

//Create - show create listing form
Route::get('/listings/create', [ListingController::class, 'create']);

//Store - store listing data
Route::post('/listings', [ListingController::class, 'store']);

//Edit - show edit listing form
Route::get('/listings/edit/{listing}', [ListingController::class, 'edit'])->where('listing', $idRegExConstraint);

//Update - update listing data
Route::put('/listings/{listing}', [ListingController::class, 'update'])->where('listing', $idRegExConstraint);

//Destroy - remove listing data
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->where('listing', $idRegExConstraint);

//Show - show single listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->where('listing', $idRegExConstraint);




// User Routing //

Route::get('/user/login', [UserController::class, 'login']);

//Create - Show registration form
Route::get('/user/register', [UserController::class, 'create']);

//Store - store new user data
Route::post('/user', [UserController::class, 'store']);

//Update - update user data
Route::put('/user/{user}', [UserController::class, 'update'])->where('user', $idRegExConstraint);

//Destroy - remove user data
Route::delete('/user/{user}', [UserController::class, 'destroy'])->where('user', $idRegExConstraint);

//Show - show information about given user
Route::get('/user/{user}', [UserController::class, 'show'])->where('user', $idRegExConstraint);

