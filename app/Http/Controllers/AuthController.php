<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller
{
    public function getRegister()
    {
    	return view('auth.register');
    }

    public function register(Request $request)
    {
    	// Validate
    	$name = $request->get('name');
    	$email = $request->get('email');
    	$password = $request->get('password');
    	$user = new User();
    	$user->name = $name;
    	$user->email = $email;
    	$user->password = bcrypt($password);
    	$user->save();
    	return redirect()->route('login');
    }

    public function getLogin()
    {
    	return view('auth.login');
    }

    public function login(Request $request)
    {
    	$email = $request->get('email');
    	$password = $request->get('password');

    	$user = User::where('email', $email)->first();

    	if (!$user || !Hash::check($password, $user->password)) {
    		return redirect()->back();
    	}
    	// so sanh mat khau user voi mat khau trong DB
    	// Hash::check($password, $user->password)

    	Auth::login($user);
    	return redirect()->route('book.index');
    }
}
