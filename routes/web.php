<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignalController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//Signal index view page
Route::get('/' , [SignalController::class , 'index']);


//store the signal data 
Route::post('/signals' , [SignalController::class , 'store']);