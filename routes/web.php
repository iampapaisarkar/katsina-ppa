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

Route::get('/verify-mda-user', [App\Http\Controllers\Auth\VerificationMDAController::class, 'verifyMdaUser'])->name('verify-mda-user');
Route::post('/update-mda-user-password', [App\Http\Controllers\Auth\VerificationMDAController::class, 'updateMdaUserPassword'])->name('update-mda-user-password');

if(Auth::check()){
	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
}else{
	Route::get('/', function () { return view('auth.login'); });
}

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified'], ['can:isVendor,isPpa,isMdaHead,isMdaMember,isMdaMinistry']], function () {
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

    Route::get('/download-certificate/{id}', [App\Http\Controllers\Vendor\RegistrationController::class, 'downloadCertificate'])->name('download-certificate');
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
    Route::post('/pending-invoice-approve/{id}', [App\Http\Controllers\InvoiceController::class, 'pendingApproved'])->name('pending-invoice-approve');
    Route::post('/pending-invoice-query/{id}', [App\Http\Controllers\InvoiceController::class, 'pendingQueried'])->name('pending-invoice-query');

    Route::get('/queried-invoice', [App\Http\Controllers\InvoiceController::class, 'queriedIndex'])->name('invoice.queried.index');
    Route::get('/queried-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'queriedShow'])->name('invoice.queried.show');

    Route::get('/approved-invoice', [App\Http\Controllers\InvoiceController::class, 'approvedIndex'])->name('invoice.approved.index');
    Route::get('/approved-invoice/{id}', [App\Http\Controllers\InvoiceController::class, 'approvedShow'])->name('invoice.approved.show');

    Route::resource('/vendor-registration-pending', 'App\Http\Controllers\Ppa\VendorRegistration\PendingController');
    Route::post('/vendor-registration-submit-query/{id}', [App\Http\Controllers\Ppa\VendorRegistration\PendingController::class, 'queryRegistration'])->name('vendor-registration-submit-query');
    Route::post('/vendor-registration-submit-approved/{id}', [App\Http\Controllers\Ppa\VendorRegistration\PendingController::class, 'approvedRegistration'])->name('vendor-registration-submit-approved');

    Route::resource('/vendor-registration-queried', 'App\Http\Controllers\Ppa\VendorRegistration\QueriedController');
    Route::resource('/vendor-registration-approved', 'App\Http\Controllers\Ppa\VendorRegistration\ApprovedController');
    
    Route::get('/vendor-registration-download-director-document/{field}/{name}/{id}', [App\Http\Controllers\Ppa\DownloadController::class, 'downloadDirectorDocument'])->name('vendor-registration-download-director-document');
    Route::get('/vendor-registration-download-category-document/{field}/{name}/{id}', [App\Http\Controllers\Ppa\DownloadController::class, 'downloadCategoryDocument'])->name('vendor-registration-download-category-document');

    Route::resource('/mda-user', 'App\Http\Controllers\Ppa\MDAUserMamangementController');
});


Route::group(['middleware' => ['auth','verified'], ['can:isMdaHead,isMdaMember,isMdaMinistry']], function () {
    Route::get('/plans', [App\Http\Controllers\Mda\PlanController::class, 'plans'])->name('plans');
    Route::get('/plan-template-download', [App\Http\Controllers\Mda\PlanController::class, 'planTemplateDownload'])->name('plan-template-download');
    Route::post('/plan-upload', [App\Http\Controllers\Mda\PlanController::class, 'planUpload'])->name('plan-upload');
    Route::get('/plans/{planId}/projects', [App\Http\Controllers\Mda\PlanController::class, 'projects'])->name('plan-projects');
    Route::get('/plans/{planId}/projects/{projectId}/details', [App\Http\Controllers\Mda\PlanController::class, 'projectDetails'])->name('plan-project-details');
    Route::get('/plans/{planId}/projects/{projectId}/details-edit', [App\Http\Controllers\Mda\PlanController::class, 'projectDetailsEdit'])->name('plan-project-details-edit');
});