<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use http\Env\Request;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/login');
    }

    public function index()
    {
        if (Auth::user()) {
            return redirect('/admin');
        }

        return view('login');
    }

    public function login(\Illuminate\Http\Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->post('username');
        $password = $request->post('password');

        $user = User::where(['username' => $username])->get();

        if ( isset($user[0]) ) {
            $user = $user[0];
        } else {
            abort(401, 'Username '.$username.' not found');
        }

        if ( Hash::check($password, $user->password) ) {
            Auth::login($user);
        } else {
            abort(401, 'Invalid password.');
        }

        return response(['login accepted']);
    }
}
