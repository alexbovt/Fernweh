<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'inputLogin' => 'required|string|max:255',
            'inputPassword' => 'required|min:6',
        ]);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $data = $request->all();
        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        } else {
            $credentials = ['login' => $request->input('inputLogin'), 'password' => $request->input('inputPassword')];
            if (Auth::attempt($credentials)) {
                $user = auth::user();
                Auth::login($user);
                Session::put('user', $user);
                Session::save();
                return redirect()->to('dashboard');
            } else {
                $msg = 'Wrong login or password';
                return back()->with('msg',$msg);
            }
        }
    }

    public function getLogout()
    {
        session()->forget('user');
        Auth::logout();
        return redirect('/')->with('status', 'Logged out !!');
    }

}