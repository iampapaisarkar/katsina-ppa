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

if(Auth::check()){
	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
}else{
	Route::get('/', function () { return view('auth.login'); });
}

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified'], ['can:isVendor,isPpa']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth','verified', 'can:isVendor']], function () {
    Route::get('/registration', [App\Http\Controllers\Vendor\RegistrationController::class, 'registration'])->name('registration');
    Route::get('/registration-preview', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationPreview'])->name('registration-preview');
    Route::post('/registration-submit', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationSubmit'])->name('registration-submit');
    
    Route::post('/invoices', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoices.index');
    Route::post('/invoices/{id}', [App\Http\Controllers\InvoiceController::class, 'show'])->name('invoices.show');
});