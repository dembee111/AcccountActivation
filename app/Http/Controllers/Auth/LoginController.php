<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, 
            [
                $this->username() => 
                    [
                       'required', 'string',
                       Rule::exists('users')->where(function ($query){
                             $query->where('active', true);
                       })
                   ],

                'password' => 'required|string',
            ], $this->validationErrors());
    }

    protected function validationErrors()
    {
        return [
           $this->username() . '.exists' => 'Ийм хэрэглэгчийн эрх байхгүй эсвэл идэвхижүүлээгүй байна!'
        ];
    }
}
