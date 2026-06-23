<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| OTP Verification
|--------------------------------------------------------------------------
*/

Route::get('/verify-otp', [AuthController::class, 'showOtpPage']);

Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

Route::get('/resend-otp', [AuthController::class, 'resendOtp']);

/*
|--------------------------------------------------------------------------
| Forgot Password
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password',
    [AuthController::class, 'forgotPasswordPage']);

Route::post('/forgot-password',
    [AuthController::class, 'sendResetOtp']);

Route::get('/reset-password',
    [AuthController::class, 'resetPasswordPage']);

Route::post('/reset-password',
    [AuthController::class, 'resetPassword']);

/*
|--------------------------------------------------------------------------
| Employee Management (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/employee',
        [EmployeeController::class, 'index']);

    Route::get('/employee/create',
        [EmployeeController::class, 'create']);

    Route::post('/employee',
        [EmployeeController::class, 'store']);

});
Route::get('/forgot-password',
    [AuthController::class, 'forgotPasswordPage']);

Route::post('/forgot-password',
    [AuthController::class, 'sendResetOtp']);

Route::post('/verify-reset-otp',
    [AuthController::class, 'verifyResetOtp']);

Route::post('/resend-reset-otp',
    [AuthController::class, 'resendResetOtp']);

Route::get('/reset-password',
    [AuthController::class, 'resetPasswordPage']);

Route::post('/reset-password',
    [AuthController::class, 'resetPassword']);
Route::get('/admin/dashboard',
    [EmployeeController::class,'adminDashboard']);

Route::get('/employee/dashboard',
    [EmployeeController::class,'employeeDashboard']);
    Route::delete(
        '/employees/{id}',
        [EmployeeController::class, 'destroy']
    );
Route::delete(
        '/employees/{id}',
        [EmployeeController::class, 'destroy']
    );
    Route::get(
        '/employee/edit-profile',
        [EmployeeController::class, 'editProfile']
    );
    
    Route::post(
        '/employee/update-profile',
        [EmployeeController::class, 'updateProfile']
    );
    Route::get(
        '/employee/edit-profile',
        [EmployeeController::class, 'editProfile']
    );
    
    Route::post(
        '/employee/update-profile',
        [EmployeeController::class, 'updateProfile']
    );
    Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit']);

Route::post('/employees/update/{id}', [EmployeeController::class, 'update']);
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/employees/update/{id}', [EmployeeController::class, 'update']);
Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/employees/update/{id}', [EmployeeController::class, 'update']);
Route::get('/admin/dashboard', [EmployeeController::class, 'adminDashboard']);
Route::post(
    '/employee/upload-files',
    [EmployeeController::class,'uploadFiles']
    );
    