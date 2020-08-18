<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    //using this function below instead of above
    public function redirectTo(){
        
        // User role
        $userlvl = Auth::user()->user_type; 
        
        // Check user role
        switch ($userlvl) {
            case "admin":
                    return '/admin';
                break;
            case "cs":
                    return '/admin';
                break;
            case "rider":
                    return '/merchant';
                break;
            case "merchant":
                    return '/merchant';
                break;
            default:
                    Auth::logout();
                    // return redirect()->back()->with('error', 'Your account has been deactivated. Try contact the administration...');
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
