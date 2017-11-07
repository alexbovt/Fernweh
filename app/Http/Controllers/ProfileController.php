<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use app\User;

class ProfileController extends Controller
{
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

    public function changeData(Request $request)
    {
        $data = [
            'login' => $request->input('loginToUpdate'),
            'name' => $request->input('firstNameToUpdate'),
            'surname' => $request->input('lastNameToUpdate'),
            'email' => $request->input('emailToUpdate'),
            'password' => $request->input('passwordToUpdate'),
            'password_confirmation' => $request->input('confirmPasswordToUpdate'),
            'birth_date' => $request->input('dateOfBirthToUpdate'),
            'sex' => $request->input('genderToUpdate')
        ];
        $validator = $this->validator($data);
        if ($validator->fails()) {
            return redirect()->action('Auth\RegisterController@create')->withErrors($validator)->withInput();
        } else {
            $userOld = session()->get("user");
            $user = User::where('id_user', $userOld->id_user)
                ->update([
                    'login' => $data['login'],
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'birth_date' => $data['birth_date'],
                    'sex' => $data['sex']
                ]);
            /*
        $user->login = $data['login'];
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->email = $data['email'];
        $user->passwrod = $data['password'];
        $user->birth_date = $data['birth_date'];
        $user->sex = $data['sex'];
        $user->save();
        */

            return redirect()->back();
        }
    }

    public function getSettings()
    {
        if ($user = session()->get('user')) return view('settings')->with('user', $user);
        else return redirect()->to('/');
    }
}
