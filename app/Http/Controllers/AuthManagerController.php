<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthManagerController extends Controller {
    function login() {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('login');
    }

    function registration() {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('registration');
    }

    function goToDashboard() {
        return view('dashboard');
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'))->with("success", "Logged Successfully!");
        }
        return redirect(route('login'))->with("error", "Login Details error!");
    }

    function registrationPost(Request $request) {
//        default validations
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'indexno' => 'required|unique:users',
            'address' => 'required',
            'contactno' => 'required|unique:users',
            'type' => 'required'
        ]);

// Add a custom validation rule to check if indexno and password are the same
        $validator->after(function ($validator) use ($request) {
            if ($request->password !== $request->indexno) {
                $validator->errors()->add('password', 'The password and indexno must be the same.');
            }
        });
        if ($validator->fails()) {
            return redirect(route('registration'))->withErrors($validator)->withInput();
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'contactno' => $request->contactno,
                'indexno' => $request->indexno,
                'type' => $request->type
            ];

            $user = User::create($data);
            if (!$user) {
                return redirect(route('registration'))->with("error", "Registration error!");
            }
            return redirect(route('login'))->with("success", "Registration success!");
        }
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

}
