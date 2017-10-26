<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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

    public function getLogin()
    {
        echo 'getLogin';
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'inputLogin' => 'required|max:255',
            'inputPassword' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        } else {
            //$user = User::where('login', $request->input('inputLogin'))->where('password', $request->input('inputPassword'))->first();
            $user_data = ['login' => $request->input('inputLogin'), 'password' => $request->input('inputPassword')];
            if (Auth::attempt($user_data)) {
                $user = Auth::user();
                if(Auth::guest()){
                    echo 'eba';
                    die();
                }
                return redirect("/id$user->id_user");
            } else
                return redirect('/');
        }
        //echo Redirect::back()->withErrors('msg', 'Wrong login or password');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

}