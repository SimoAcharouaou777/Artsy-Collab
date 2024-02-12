<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    public function authenticated(Request $request, $user)
    {
     
        $roleId = $user->roles()->pluck('role_id')->first();
    
        if ($roleId == 1) {
            return redirect(route('home'));
        } elseif ($roleId == 2) {
            return redirect(route('dashboard'));
        } elseif ($roleId == 3) {
            return redirect(route('partner.dashboard'));
        } else {
            return redirect($this->redirectTo);
        }
    }
}
