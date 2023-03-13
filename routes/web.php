<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::middleware(['guest'])->group(function () {
    //ログイン画面
    Route::get('/',[UserController::class,'index'])->name('index');
    //ログイン処理
    Route::post('login',[UserController::class,'login'])->name('login');
});



Route::middleware(['auth'])->group(function () {
    //ホーム画面
    Route::get('home',function(){
        return view('login.home');
    })->name('home');
    
    //ログアウト処理
    Route::post('logout',[UserController::class,'logout'])->name('logout');
});


