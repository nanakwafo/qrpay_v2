<?php


use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
//use Analytics;
//
//use Spatie\Analytics\Period;


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

Route::get('/test',function (){
    \QrCode::size(500)
        ->format('png')
        ->color(255, 0, 0,25)
        ->generate('https://qrcodepay.nanalabs.co.uk', public_path('images/qrcode4.png'));
    return view('test');

});
Route::get('/', [WelcomeController::class, 'index']);
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

Route::middleware(['visitor'])->group(function () {

    Route::get('/registeraccount', [AccountController::class, 'index']);
    Route::get('/success/{amount}/{companyname}', [PaymentController::class, 'success'])->name('success');


    Route::get('/privacy',[PrivacyController::class,'index'])->name('privacy');
    Route::get('/forgotpassword', [ForgotPasswordController::class,'index'])->name('forgotpassword');
    Route::get('/reset/{email}/{resetCode}', [ForgotPasswordController::class,'resetpassword'])->name('reset');
    Route::post('/reset/{email}/{resetCode}', [ForgotPasswordController::class,'postresetpassword'])->name('reset');

    Route::get('/activate/{email}/{activationCode}', [ActivationController::class, 'activate'])->name('activate');



    Route::get('/loginaccount', [LoginController::class, 'index'])->name('loginaccount');
    Route::post('/loginaccount', [LoginController::class, 'handleAccountLogin']);
    Route::get('/accountveirfied', [AccountController::class, 'accountveirfied'])->name('accountveirfied');
    Route::get('/pay/{platformId?}/{qrcode_id?}', [PaymentController::class, 'createPayment'])->name('pay');


    Route::post('/validateemail', [PasswordController::class, 'confirmemail'])->name('validateemail');
    Route::post('/updatepassword', [PasswordController::class, 'update'])->name('updatepassword');
    Route::get('/accountpassword/{platformId?}/{email?}', [PasswordController::class, 'index'])->name('accountpassword');





    Route::get('/stripereturn', 'AccountController@accountReturn')->name('stripereturn');
    Route::get('/striperefresh/{email?}', 'AccountController@striperefresh')->name('striperefresh');
    Route::post('/registereduser', 'AccountController@registereduser')->name('registereduser');
    Route::post('/paymentdone', 'WebhookController@paymentdone')->name('paymentdone');
    Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword')->name('forgot-password');
    Route::post('/sendContact', 'ContactController@sendEmail')->name('sendContact');
});


Route::get('/dashboard/{platformId?}', [DashboardController::class, 'index'])->name('dashboard')->middleware('vendor');
Route::get('/profile/{platformId?}',[ProfileController::class, 'index'])->name('profile')->middleware('vendor');
Route::get('/transaction/{platformId?}', 'TransactionController@index')->name('transaction')->middleware('vendor');
Route::any('/qrcodes/{platformId?}/{qrcodeId?}', 'QrcodeController@index')->name('qrcodes')->middleware('vendor');
Route::get('/qrcodeDownload/{id?}', 'QrcodeController@qrcodeDownload')->name('qrcodeDownload')->middleware('vendor');
Route::get('/indexqrcodes/{platformId?}', 'ReportController@indexqrcodes')->name('indexqrcodes')->middleware('vendor');

//downloads
Route::get('/transactions/pdf/{platformId?}/{qrCodeId?}','PdfController@export_pdf')->name('transactions-pdf')->middleware('vendor');
Route::get('/transactions/xlsx/{platformId?}/{qrCodeId?}','ExcelController@exportxlsx')->name('transactionsxlsx')->middleware('vendor');
Route::get('/transactions/csv/{platformId?}/{qrCodeId?}','ExcelController@exportcsv')->name('transactionscsv')->middleware('vendor');

Route::post('/updatelogo', 'QrcodeController@updatelogo')->name('updatelogo')->middleware('vendor');

//Amount Setting
Route::post('/saveuseramount', 'AmountsettingController@save')->name('saveuseramount')->middleware('vendor');
Route::post('/updateamount', ['as'=>'updateamount','uses'=>'AmountsettingController@updateamount'])->middleware('vendor');
Route::post('/deleteamount', ['as'=>'deleteamount','uses'=>'AmountsettingController@deleteamount'])->middleware('vendor');


Route::post('/getstatistics', [DashboardController::class, 'getstatistics'])->name('getstatistics')->middleware('vendor');
Route::post('/transactiontotalqrcode', 'ReportController@transactiontotalqrcode')->name('transactiontotalqrcode')->middleware('vendor');
Route::post('/getpiechartdata', 'ReportController@piechartData')->name('getpiechartdata')->middleware('vendor');

Route::get('/createQrcode/{platformId?}', 'QrcodeController@createQrcode')->name('createQrcode')->middleware('vendor');


Route::post('/generateQrcode', 'QrcodeController@generateQrCode')->name('generateQrcode')->middleware('vendor');
Route::post('/updateQrcode', 'QrcodeController@updateQrcode')->name('updateQrcode')->middleware('vendor');
Route::post('/deleteQrcode', 'QrcodeController@deleteQrcode')->name('deleteQrcode')->middleware('vendor');
Route::post('/activateQrcode', 'QrcodeController@activateQrcode')->name('activateQrcode')->middleware('vendor');
Route::post('/qrcodesreports', ['as'=>'qrcodesreports','uses'=>'ReportController@reports'])->middleware('vendor');
Route::post('/updateprofile',[ProfileController::class, 'updateprofile'] )->middleware('vendor');
Route::get('/registeraccount/{email?}', 'AccountController@handleAccountCreation')->name('registeraccount')->middleware('vendor');
Route::post('/searchqrcode', 'QrcodeController@searchQrcode')->name('searchqrcode')->middleware('vendor');







