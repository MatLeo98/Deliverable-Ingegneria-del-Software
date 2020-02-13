<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cognome' => ['required', 'string', 'max:255'],
            'indirizzo' => ['required','string','max:255'],
            'recapito' => ['required','string','max:255'],
            
            'eta' => ['required','string','max:255'],

            'flag' => ['required','boolean','max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'cognome' => $data['cognome'],
            'indirizzo' => $data['indirizzo'],
            'recapito' => $data['recapito'],
            'ragionesociale' => $data['ragionesociale'],
            'sede' => $data['sede'],
            'eta' => $data['eta'],
            'titolodistudio' => $data['titolodistudio'],
            'corsodistudi' => $data['corsodistudi'],
            'flag' => $data['flag'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
