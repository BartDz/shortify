<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\RedirectController;

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

//Route::get('/', [LinkController::class, 'create'])->name('link.create');

//Route::post('/', [LinkController::class, 'store'])->name('link.store');


Route::get('/', function(){
    return view('layout');
})->name('link.create');

Route::get('/{slug}', [RedirectController::class, 'redirect'])->name('redirect');