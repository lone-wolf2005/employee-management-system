<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class AuthController extends Controller
{
    // Register Page
    public function showRegister()
    {
        return view('auth.register');
    }

    // Register User
    public function register(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|unique:employees,employee_id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'dob' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        $otp = rand(100000, 999999);

        User::create([
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_code' => $request->country_code,
            'role' => 'employee',
            'password' => Hash::make($request->password)
        ]);
        $employeeNo = Employee::max('employee_no') + 1;
        Employee::create([
            'employee_no' => $employeeNo,
            'employee_id' => $request->employee_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => 'Not Assigned',
            'designation' => 'Employee',
            'salary' => $request->salary ?? 0,
            'joining_date' => date('Y-m-d'),
            'dob' => $request->dob
        ]);

        return redirect('/login')
            ->with('success', 'Registration Successful');
    }

    // Login Page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Login
    public function login(Request $request)
{
    $login = $request->login;

    $field = filter_var($login, FILTER_VALIDATE_EMAIL)
        ? 'email'
        : 'phone';

    if (Auth::attempt([
        $field => $login,
        'password' => $request->password
    ]))
    {
        $user = Auth::user();

        // Admin Login
        if($user->email == 'ajith202005@gmail.com')
        {
            dd('ADMIN DETECTED');
        }

        // Employee Login
        return redirect('/employee/dashboard');
    }

    return back()->with(
        'error',
        'Invalid Login Credentials'
    );
}
    

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // Forgot Password Page
    public function forgotPasswordPage()
    {
        return view('auth.forgot-password');
    }

    // Send Reset OTP
    public function sendResetOtp(Request $request)
    {
        $login = $request->login;

        $field = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'phone';

        $user = User::where($field, $login)->first();

        if (!$user) {
            return back()->with(
                'error',
                'User not found'
            );
        }

        $otp = rand(100000, 999999);

        $user->otp = $otp;
        $user->save();

        session([
            'reset_login' => $login
        ]);

        return back()->with(
            'success',
            'OTP Sent Successfully. OTP: ' . $otp
        );
    }

    // Verify Reset OTP
    public function verifyResetOtp(Request $request)
    {
        $user = User::where(
            'otp',
            $request->otp
        )->first();

        if (!$user) {
            return back()->with(
                'error',
                'Invalid OTP'
            );
        }

        session([
            'reset_user_id' => $user->id
        ]);

        return redirect('/reset-password');
    }

    // Resend Reset OTP
    public function resendResetOtp()
    {
        $login = session('reset_login');

        if (!$login) {
            return back();
        }

        $field = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'phone';

        $user = User::where($field, $login)->first();

        if (!$user) {
            return back();
        }

        $otp = rand(100000, 999999);

        $user->otp = $otp;
        $user->save();

        return back()->with(
            'success',
            'OTP Resent Successfully. OTP: ' . $otp
        );
    }

    // Reset Password Page
    public function resetPasswordPage()
    {
        return view('auth.reset-password');
    }

    // Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $userId = session('reset_user_id');

        if (!$userId) {
            return redirect('/forgot-password');
        }

        $user = User::find($userId);

        $user->password = Hash::make(
            $request->password
        );

        $user->otp = null;
        $user->save();

        session()->forget('reset_user_id');
        session()->forget('reset_login');

        return redirect('/login')
            ->with(
                'success',
                'Password Reset Successfully'
            );
    }
}