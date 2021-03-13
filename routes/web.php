<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[userController::class,'User'])->name('save-user');
Route::post('/save-user',[userController::class,'saveUser'])->name('save-user');
Route::get('login-from',[userController::class,'loginFrom'])->name('login-from');
///login
Route::post('/login',[userController::class,'Login'])->name('login');
//jquery  routes
Route::post('/user-data',[userController::class,'userData'])->name('user_data');

Route::post('/encrypt-user_data',[userController::class,'encryptData'])->name('encrypt-user_data');
Route::post('/save_licence',[userController::class,'licenceSave'])->name('save_licence');
