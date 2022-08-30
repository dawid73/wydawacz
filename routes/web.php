<?php

use App\Http\Controllers\DealController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect(route('deals.index'));
});

Auth::routes();

Route::get('/wydania/lista', [DealController::class, 'index'])->name('deals.index');
Route::get('/wydania/lista/delete', [DealController::class, 'indexDelete'])->name('deals.index.delete');
Route::get('/wydania/dodaj', [DealController::class, 'create'])->name('deals.add');
Route::get('/wydania/edytuj/{id}', [DealController::class, 'edit'])->name('deals.edit')->middleware('auth');

Route::post('/wydania/zapisz', [DealController::class, 'store'])->name('deals.store');
Route::post('/wydania/krok-1', [DealController::class, 'step1'])->name('deals.step1');
Route::post('/wydania/krok-2', [DealController::class, 'step2'])->name('deals.step2');

Route::put('/wydania/delete/{id}', [DealController::class, 'delete'])->name('deals.delete');
Route::put('/wydania/zmien/{id}', [DealController::class, 'update'])->name('deals.update')->middleware('auth');

// Nie usuwamy, tylko ustawiamy wartość delete na true
//Route::delete('/wydania/{id}', [DealController::class, 'destroy'])->name('deals.delete')->middleware('auth');

Route::resource('employee', EmployeeController::class, [
        'except' =>[
            'index', 'show']
    ])->middleware('auth');

Route::resource('employee', EmployeeController::class, [
        'only' =>[
            'index', 'show']
    ]);


Route::resource('product', ProductController::class,[
        'except' =>[
            'index','show']
    ])->middleware('auth');


Route::resource('product', ProductController::class,[
        'only' =>[
            'index','show']
        ]);

Route::put('product/{id}/disable', [ProductController::class, 'disable']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [HelperController::class, 'about'])->name('about');
