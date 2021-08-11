<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ReceiptController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\AmbulanceController;
use App\Http\Controllers\Backend\InsuranceController;
use App\Http\Controllers\Backend\SingleServiceController;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

//################################ dashboard user ##########################################

        Route::get('/dashboard/user', function () {
            return view('backend.user.dashboard');
        })->middleware(['auth'])->name('dashboard.user');

//################################ end dashboard user #####################################


//################################ dashboard admin ########################################

        Route::get('/dashboard/admin', function () {
            return view('backend.admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');

//################################ end dashboard user #####################################


//---------------------------------------------------------------------------------------------------------------



    Route::group(['prefix' => 'admin' , 'middleware' => 'auth:admin'],function(){


//############################# sections route ##########################################

        Route::resource('sections' , SectionController::class);

//############################# end sections route ######################################


//############################# sections route ##########################################

        Route::resource('doctors' , DoctorController::class);
        Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
        Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');

        
//############################# end sections route ######################################


//############################# sections route ##########################################

        Route::resource('services' , SingleServiceController::class);

//############################# end sections route ######################################


//############################# ServicesGroup route ##########################################

        Route::view('ServicesGroup' , 'livewire.ServicesGroup.create-services-group')->name('ServicesGroup');

//############################# end ServicesGroup route ######################################


//############################# Insurances route ##########################################

        Route::resource('Insurances' , InsuranceController::class);

//############################# end Insurances route ######################################


//############################# Ambulances route ##########################################

        Route::resource('Ambulances' , AmbulanceController::class);

//############################# end Ambulances route ######################################


//############################# Patients route ##########################################

        Route::resource('Patients' , PatientController::class);

//############################# end Patients route ######################################



//############################# SingleInvoice route ##########################################

        Route::view('Single-Invoice' , 'livewire.SingleInvoice.index')->name('SingleInvoice');

//############################# end SingleInvoice route ######################################



//############################# Receipt route ##########################################

        Route::resource('Receipts' , ReceiptController::class);

//############################# end Receipt route ######################################


//############################# Payment route ##########################################

        Route::resource('Payments' , PaymentController::class);

//############################# end Payment route ######################################

        });


    require __DIR__.'/auth.php';

});
