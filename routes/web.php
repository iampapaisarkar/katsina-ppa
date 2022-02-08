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

    Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'show'])->name('invoice.show');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [App\Http\Controllers\ProfileController::class, 'profileUpdate'])->name('profile-update');
    Route::get('/profile-password', [App\Http\Controllers\ProfileController::class, 'profilePassword'])->name('profile-password');
    Route::post('/profile-password-update', [App\Http\Controllers\ProfileController::class, 'profilePasswordUpdate'])->name('profile-password-update');
});

Route::group(['middleware' => ['auth','verified', 'can:isVendor']], function () {
    Route::get('/registration', [App\Http\Controllers\Vendor\RegistrationController::class, 'registration'])->name('registration');
    Route::get('/registration-preview', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationPreview'])->name('registration-preview');
    Route::post('/registration-submit', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationSubmit'])->name('registration-submit');

    Route::get('/registration-status', [App\Http\Controllers\Vendor\RegistrationController::class, 'status'])->name('registration-status');

    Route::post('/payment-update/{id}', [App\Http\Controllers\InvoiceController::class, 'paymentUpdate'])->name('payment-update');
});

Route::group(['middleware' => ['auth','verified', 'can:isPpa']], function () {
    Route::resource('/mda-type', 'App\Http\Controllers\FormData\MdaTypeController');
    Route::resource('/mda', 'App\Http\Controllers\FormData\MdaController');
    Route::resource('/core-competence', 'App\Http\Controllers\FormData\CoreCompetenceController');
    Route::resource('/organization-type', 'App\Http\Controllers\FormData\OrganizationTypeController');
    Route::resource('/registration-category', 'App\Http\Controllers\FormData\RegistrationCategoryController');
    Route::resource('/additional-fee', 'App\Http\Controllers\FormData\AdditionalFeeController');
    Route::resource('/service-type', 'App\Http\Controllers\FormData\ServiceTypeController');
    Route::resource('/service', 'App\Http\Controllers\FormData\ServiceController');
});