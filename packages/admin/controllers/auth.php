<?php
defined('DS') or exit('No direct access.');

class Admin_Auth_Controller extends Controller
{
    public $restful = true;

    public function get_login()
    {
        $user = Auth::user();
        if ($user && !empty($user->is_admin)) { return Redirect::to('admin'); }
        return View::make('admin::login');
    }

    public function post_authenticate()
    {
        $validation = Validator::make(Input::all(), ['email' => 'required|email', 'password' => 'required']);
        if ($validation->fails()) { return Redirect::back()->with_input('only', ['email'])->with_errors($validation); }

        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])) {
            $user = Auth::user();
            if ($user && !empty($user->is_admin)) {
                return Redirect::to('admin');
            }

            Auth::logout();
        }

        return Redirect::back()->with_input('only', ['email'])->with('error', 'Email atau password salah.');
    }

    public function post_logout()
    {
        Auth::logout();
        return Redirect::to('admin/login');
    }
}
