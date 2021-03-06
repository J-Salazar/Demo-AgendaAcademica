<?php

namespace App\Http\Controllers\OrgnzAuth;

use App\Orgnz;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/orgnz/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('orgnz.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //Validacion de datos
        return Validator::make($data, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'dir' => 'required|max:255',
            'phone' => 'required|max:12',
            'alias' => 'required|max:255|unique:orgnzs',        //alias no registrado en la tabla
            'email' => 'required|email|max:255|unique:orgnzs',  //email no registrado en la tabla
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Orgnz
     */
    protected function create(array $data)
    {
        return Orgnz::create([
            'name'       => $data['name'],
            'last_name'  => $data['last_name'],
            'alias'      => $data['alias'],
            'email'      => $data['email'],
            'dir'        => $data['dir'],
            'phone'      => $data['phone'],
            'password'   => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('orgnz.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('orgnz');
    }
}
