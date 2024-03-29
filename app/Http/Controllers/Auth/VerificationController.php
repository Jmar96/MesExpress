<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
