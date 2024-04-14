<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    protected $redirectTo = 'membres';
      

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $les_membres)
    {
        $this->middleware('guest')->except('logout');
    }

    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/membres/vue');
    }

    protected function authenticated(Request $request, $user)
    {

        if ($user->isAdmin) {
            // On récupère les membres non vérifié
            $unverifiedUsers = User::where('isVerified', false)->get();
            if($unverifiedUsers){
                return view('pages_site/validation', compact('unverifiedUsers'));
            }else{
                return redirect('/membres/vue');
            }
        } else {
            return redirect('/membres/vue');
        }
    }
}
