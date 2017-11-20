<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|string|max:255|unique:user',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
            'birth_date' => 'required|date',
            'sex' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $data = [
            'login' => $request->input('inputLogin'),
            'name' => $request->input('inputFirstName'),
            'surname' => $request->input('inputLastName'),
            'email' => $request->input('inputEmail'),
            'password' => $request->input('inputPassword'),
            'password_confirmation' => $request->input('inputConfirmPassword'),
            'birth_date' => $request->input('inputDateOfBirth'),
            'sex' => $request->input('inputGender')
        ];
        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->action('Auth\RegisterController@create')
                ->withErrors($validator)
                ->withInput();
        } else {
            User::create([
                'login' => $data['login'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'name' => $data['name'],
                'surname' => $data['surname'],
                'birth_date' => $data['birth_date'],
                'sex' => $data['sex'],
            ]);
            return redirect()->refresh()->with('status', 'You are signed up!');;
        }
    }

    public function postRegister(Request $request)
    {
        $fullName = [
            'firstName' => $request->input('inputFirstName'),
            'lastName' => $request->input('inputLastName')
        ];
        return view('auth.register')->with('fullName', $fullName);
    }
}
