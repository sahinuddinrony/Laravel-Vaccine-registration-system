<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserVaccineRegistrationController;

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

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/', [UserVaccineRegistrationController::class, 'index'])->name('index');
Route::post('/vaccine-registration', [UserVaccineRegistrationController::class, 'store'])->name('vaccine_registration');
