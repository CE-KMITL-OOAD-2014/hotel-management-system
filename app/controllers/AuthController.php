<?php

class AuthController extends BaseController {

    public function showLogin()
    {
        // Check if we already logged in
        if (Auth::check())
        {
            // Redirect to homepage
            return Redirect::to('')->with('success', 'You are already logged in');
        }

        // Show the login page
        return View::make('auth/login');
    }

    public function postLogin()
    {
        // Get all the inputs
        // id is used for login, username is used for validation to return correct error-strings
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        // Declare the rules for the form validation.
        $rules = array(
            'username'  => 'Required',
            'password'  => 'Required'
        );

        // Validate the inputs.
        $validator = Validator::make($userdata, $rules);

        // Check if the form validates with success.
        if ($validator->passes())
        {
            // Try to log the user in.
            if (Auth::attempt($userdata))
            {
                // Redirect to homepage
                return Redirect::to('')->with('success', 'You have logged in successfully');
            }
            else
            {
                // Redirect to the login page.
                return Redirect::to('login')->withErrors(array('password' => 'Password invalid'))->withInput(Input::except('password'));
            }
        }

        // Something went wrong.
        return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
    }

      public function getLogout()
    {
        // Log out
        Auth::logout();

        // Redirect to homepage
        return Redirect::to('')->with('success', 'You are logged out');
    }

        public function showRegister()
        {
            return View::make('auth.register');
        }

        public function postRegister()
        {
                    $userdata = array(
            'name' => Input::get('name'),
            'lastname' => Input::get('lastname'),
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password')),
            'email' => Input::get('email')
        );
                            $rules = array(
            'name' => 'Required',
            'lastname' =>  'Required',
            'username' =>  'Required|unique:users',
            'password' =>  'Required',
            'email' =>  'Required|email|unique:users'
        );
        $validator = Validator::make($userdata, $rules);
        if ($validator->passes())
        {
            // Create user in database
            $new_user = user::create($userdata);
            // set defualt role to member
            $new_user->roles()->attach(2);

            // logged user in
            Auth::attempt(array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
            ));

            

            // Redirect to home with success message
            return Redirect::to('')->with('success', 'You have successfully create account');
        }
        else
        // Something went wrong.
        return Redirect::to('register')->withErrors($validator)->withInput(Input::except('password'));
        }
    public function showEditProfile(){
        return View::make('auth.edit_profile');
    }
    public function postEditProfile(){
        $user =User::find(Auth::id());
        $user->name = Input::get('name');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
        $user->save();
    return Redirect::to('')->with('success', 'You have successfully edit '.$user->name.' profile.');
    }
}