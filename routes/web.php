<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MypageController;
use App\Http\Controllers\InterestController;
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

Route::group(['middleware' => 'auth'], function () {
    //マイページの機能
    Route::resource('mypage', MypageController::class);
    // 興味の機能
    Route::resource('interest',InterestController::class);
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
