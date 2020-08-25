<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Support\Facades\Auth;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
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
                    return '/rider';
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
        $this->middleware('auth');
    }
}
