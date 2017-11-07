<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected function SettingsValidate(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);
    }

    protected function EditValidate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'phone_number' => 'string|min:9',
            'education' => 'string',
            'sex' => 'required|string',
            'languages' => 'string',
            'job' => 'string',
            'countries' => 'string',
            'notes' => 'string',
        ]);
    }

    protected function DeleteValidate(array $data)
    {
        return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ]);
    }


    public function getSettings()
    {
        if ($logged_user = session()->get('user')) {
            $user = User::where('id_user', $logged_user->id_user)->first();
            return view('settings')->with('user', $user);
        } else return redirect()->to('/');
    }

    public function postSettings(Request $request)
    {
        $data = [
            'login' => $request->input('loginToUpdate'),
            'email' => $request->input('emailToUpdate'),
            'password' => $request->input('passwordToUpdate'),
            'password_confirmation' => $request->input('confirmPasswordToUpdate'),
        ];
        $validator = $this->SettingsValidate($data);
        if ($validator->fails()) {
            return redirect()->refresh()->withErrors($validator)->withInput();
        } else {
            $user = session()->get("user");
            User::where('id_user', $user->id_user)
                ->update([
                    'login' => $data['login'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
            return redirect()->to('/settings')->with('status', 'Profile updated!');
        }
    }

    public function getEdit()
    {
        if ($logged_user = session()->get('user')) {
            $user = User::where('id_user', $logged_user->id_user)->first();
            return view('edit')->with('user', $user);
        } else return redirect()->to('/');
    }


    public function postEdit(Request $request)
    {
        $data = [
            'name' => $request->input('firstNameToUpdate'),
            'surname' => $request->input('lastNameToUpdate'),
            'birth_date' => $request->input('dateOfBirthToUpdate'),
            'sex' => $request->input('genderToUpdate'),
            'phone_number' => $request->input('phoneNumberToUpdate'),
            'education' => $request->input('educationToUpdate'),
            'languages' => $request->input('languagesToUpdate'),
            'job' => $request->input('jobToUpdate'),
            'countries' => $request->input('countriesToUpdate'),
            'notes' => $request->input('notesToUpdate')
        ];
        $validator = $this->EditValidate($data);
        if ($validator->fails()) {
            return redirect()->refresh()->withErrors($validator)->withInput();
        } else {
            $user = session()->get("user");
            User::where('id_user', $user->id_user)
                ->update([
                    'name' => $data['name'],
                    'surname' => $data['surname'],
                    'birth_date' => $data['birth_date'],
                    'sex' => $data['sex'],
                    'phone_number' => $data['phone_number'],
                    'education' => $data['education'],
                    'languages' => $data['languages'],
                    'job' => $data['job'],
                    'countries' => $data['countries'],
                    'notes' => $data['notes']
                ]);
            return redirect()->to('/edit')->with('status', 'Profile updated!');
        }
    }

    public function postDeleteAccount(Request $request)
    {
        $data = [
            'password' => $request->input('passwordToUpdate'),
            'password_confirmation' => $request->input('confirmPasswordToUpdate'),
        ];
        $validator = $this->DeleteValidate($data);
        if ($validator->fails()) {
            return redirect()->refresh()->withErrors($validator)->withInput();
        } else {
            $user = session()->get("user");
            User::where('id_user', $user->id_user)->delete();
            session()->forget('user');
            return redirect('/')->with('status', 'Your account has been deleted!!');
        }
    }
}
