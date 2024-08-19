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

include('admin.php');


// Public Routes.
Route::get('/', [App\Http\Controllers\PagesController::class, 'index']);
Route::get('/engineering-services', [App\Http\Controllers\PagesController::class, 'engineeringServices']);
Route::get('/network-protection', [App\Http\Controllers\PagesController::class, 'networkProtection']);
Route::get('/testing', [App\Http\Controllers\PagesController::class, 'testingPage']);
Route::get('/knowledge-hub/{slug}', [App\Http\Controllers\PagesController::class, 'knowledgeHubPostInfo']);
Route::get('/knowledge-hub', [App\Http\Controllers\PagesController::class, 'knowledgeHub']);
Route::get('/make-inquiry', [App\Http\Controllers\PagesController::class, 'makeInquiry']);


// Customer routes.
Route::group(['middleware' => ['role:CUSTOMER']], function () {
    Route::prefix('customer')->group(function () {
        Route::post('change-password', [\App\Http\Controllers\Customer\SettingsController::class, 'changePassword'])->name('change-password-customer');
        Route::post('update-settings', [\App\Http\Controllers\Customer\SettingsController::class, 'updateSettings'])->name('update-settings-customer');
        Route::get('settings', [\App\Http\Controllers\Customer\SettingsController::class, 'viewSettings']);
        Route::get('inquiries', [\App\Http\Controllers\Customer\DashboardController::class, 'viewInquiriesAll']);
        Route::get('', [\App\Http\Controllers\Customer\DashboardController::class, 'index']);
    });

    Route::post('/add-inquiry', [App\Http\Controllers\InquiryController::class, 'addInquiry'])->name('add-inquiry-customer');
});

Route::get('/test-email-blade', [App\Http\Controllers\InquiryController::class, 'testEmailBlade']);
Route::get('/test-email', [App\Http\Controllers\InquiryController::class, 'testEmail']);

Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () { return redirect('/'); })->name('home');
