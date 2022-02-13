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

    Route::get('/invoice-download/{id}', [App\Http\Controllers\InvoiceController::class, 'download'])->name('invoice.download');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile-update', [App\Http\Controllers\ProfileController::class, 'profileUpdate'])->name('profile-update');
    Route::get('/profile-password', [App\Http\Controllers\ProfileController::class, 'profilePassword'])->name('profile-password');
    Route::post('/profile-password-update', [App\Http\Controllers\ProfileController::class, 'profilePasswordUpdate'])->name('profile-password-update');
});

Route::group(['middleware' => ['auth','verified', 'can:isVendor']], function () {
    Route::get('/registration', [App\Http\Controllers\Vendor\RegistrationController::class, 'registration'])->name('registration');
    Route::get('/registration-preview', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationPreview'])->name('registration-preview');
    Route::post('/registration-submit', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationSubmit'])->name('registration-submit');

    Route::post('/registration-company-details-submit', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationCompanyDetailSubmit'])->name('registration-company-details-submit');
    Route::post('/registration-company-director-submit', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationCompanyDirectorSubmit'])->name('registration-company-director-submit');
    Route::post('/registration-product-service-submit', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationProductServiceSubmit'])->name('registration-product-service-submit');
    Route::post('/registration-category-document-submit', [App\Http\Controllers\Vendor\RegistrationController::class, 'registrationCategoryDocumentSubmit'])->name('registration-category-document-submit');

    Route::get('/registration-status', [App\Http\Controllers\Vendor\RegistrationController::class, 'status'])->name('registration-status');

    Route::get('/invoice', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'show'])->name('invoice.show');
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

    Route::get('/unpaid-invoice', [App\Http\Controllers\InvoiceController::class, 'unpaidIndex'])->name('invoice.unpaid.index');
    Route::get('/unpaid-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'unpaidShow'])->name('invoice.unpaid.show');

    Route::get('/pending-invoice', [App\Http\Controllers\InvoiceController::class, 'pendingIndex'])->name('invoice.pending.index');
    Route::get('/pending-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'pendingShow'])->name('invoice.pending.show');
    Route::get('/download-pending-invoice-evidence/{id}', [App\Http\Controllers\InvoiceController::class, 'downloadEvidence'])->name('download-pending-invoice-evidence');
    Route::post('/pending-invoice-query/{id}', [App\Http\Controllers\InvoiceController::class, 'pendingQueried'])->name('pending-invoice-query');

    Route::get('/queried-invoice', [App\Http\Controllers\InvoiceController::class, 'queriedIndex'])->name('invoice.queried.index');
    Route::get('/queried-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'queriedShow'])->name('invoice.queried.show');

    Route::get('/approved-invoice', [App\Http\Controllers\InvoiceController::class, 'approvedIndex'])->name('invoice.approved.index');
    Route::get('/approved-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'approvedShow'])->name('invoice.approved.show');
});