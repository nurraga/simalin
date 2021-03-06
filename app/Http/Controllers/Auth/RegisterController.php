<?php

namespace App\Http\Controllers\Auth;

use App\AsalPelapor;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    public function showFormPendaftaran()
    {
        $asal = AsalPelapor::all();
        return view('auth.register', compact('asal'));
    }

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'no_id' => 'required|max:255',
            'id_asal' => 'required|max:255',
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:data_pelapor',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'no_id' => $data['no_id'],
            'id_asal' => $data['id_asal'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
