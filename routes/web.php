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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Auth::routes(['verify' => true]);
Route::get('order','App\Http\Controllers\CoffeeController@order')->middleware(['auth'])->name('coffee.order');
Route::post('order','App\Http\Controllers\CoffeeController@order')->middleware(['auth'])->name('coffee.order');

require __DIR__.'/auth.php';
