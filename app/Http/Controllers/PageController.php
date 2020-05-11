<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class PageController extends Controller
{

    public function login()
    {
        $number = 10;
        return view('page.login', compact('number'));
    }

    public function submitLogin(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'username' => 'required|min:5',
            'password' => 'required',
        ], [
            'username.required' => 'Username không được để trống',
            'username.min' => 'Username tối thiểu 5 ký tự',
            'password.required' => 'Password không được để trống',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $data = $request->only(['username', 'password']);
        $username = $request->get('username');
        $password = $request->get('password');
        if ($username == 'admin' && $password == 'admin') {
            echo 'Login Success';
        } else {
            echo 'Login False';
        }
    }
}