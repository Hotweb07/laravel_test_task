<?php

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

Route::get('/', function () {
    return redirect('login');
});
Route::get('/home', function () {
    return redirect('user/home');
});

Auth::routes();

Route::group(['as'=>'user.', 'prefix'=>'user', 'middleware'=>['auth','isUser','PreventBackHistory']], function(){
    
    Route::any('/home', [App\Http\Controllers\ProductController::class, 'index'])->name('home');
    
});