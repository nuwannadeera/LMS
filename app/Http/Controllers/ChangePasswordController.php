<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller {

    function goToChangePasswordForm() {
        return view('changePassword');
    }

    function updatePassword(Request $request, User $user) {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            're_password' => 'required'
        ]);
        $validator->after(function ($validator) use ($request) {
            if ($request->password !== $request->re_password) {
                $validator->errors()->add('error', 'Password Does not Match !');
            }
        });
        if ($validator->fails()) {
            return redirect(route('changePasswordForm'))
                ->withErrors($validator)->withInput();
        } else {
            $input = $request->all();
            $user->update($input);
            return redirect()->route('dashboard');
        }
    }


}
