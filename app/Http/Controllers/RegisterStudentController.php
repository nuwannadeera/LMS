<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterStudentController extends Controller {

    function goToRegisterStudent() {
        $studentList = User::where('type', 2)->get();
        return view('addStudent')->with('studentList', $studentList);
    }

    function saveStudent(Request $request) {
//        default validations
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'address' => 'required',
            'contactno' => 'required|unique:users',
            'indexno' => 'required|unique:users'
        ]);

// Add a custom validation rule to check if indexno and password are the same
        $validator->after(function ($validator) use ($request) {
            if ($request->password !== $request->indexno) {
                $validator->errors()->add('error', 'The password and IndexNo must be the same.');
            }
        });
        if ($validator->fails()) {
            return redirect(route('goToRegisterStudent'))
                ->withErrors($validator)->withInput();
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'contactno' => $request->contactno,
                'indexno' => $request->indexno,
                'type' => 2
            ];
            $user = User::create($data);
            if (!$user) {
                return redirect(route('goToRegisterStudent'))->with("error", "Registration error!");
            }
            return redirect(route('goToRegisterStudent'))->with("success", "Student Registration success!");
        }
    }
}
