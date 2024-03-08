<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = 'dashboard/home';

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Split the full name into first name and last name
        $names = explode(' ', $data['name'], 2);
        $firstName = $names[0];
        $lastName = isset($names[1]) ? $names[1] : '';

        return User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $data['email'],
            'uuid' => $this->generateUUID(),
            'password' => Hash::make($data['password']),
        ]);
    }

    private function generateUUID()
    {
        $uuid = Str::uuid();
        $shortUUID = str_replace('-', '', $uuid->toString());
        return substr($shortUUID, 0, 12);
    }
    // return redirect()->intended(route('user.dashboard.home'));
}
