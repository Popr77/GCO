<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserData;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
        $messages = array(
            'phone.min'=>'Cannot be less than 9 digits',
            'nif.min'=>'Cannot be less than 9 digits',
            'nif.max'=>'Cannot be less than 9 digits',
            'postal_code.regex'=>'Wrong format (example: xxxx-xxx)',
        );
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'regex:/^\d{4}(-\d{3})?$/', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:9','max:255'],
            'nif' => ['required', 'integer', 'min:99999999','max:999999999'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['mimes:jpg,png,jpeg','max:5048']
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (isset($data['photo'])){
            $newImage = time() . '-' . $data['name'] . '.'.
                $data['photo']->extension();
            $data['photo']->storeAs('public/img/users', $newImage);
        }

        User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user = User::latest('id')->first();

        $userData = new UserData();
        $userData->user_id = $user->id;
        $userData->name = $data['name'];
        $userData->address = $data['address'];
        $userData->postal_code = $data['postal_code'];
        $userData->city = $data['city'];
        $userData->phone = $data['phone'];
        $userData->nif = $data['nif'];
        isset($data['photo'])?$userData->photo = $newImage : null;
        $userData->save();

        return $user;
    }
}
