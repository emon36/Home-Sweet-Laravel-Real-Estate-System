<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\ValidationException;
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
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    public function login(Request $request)
//    {
//        $input = $request->all();
//
//        $this->validate($request, [
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
//        {
//            if (auth()->user()->role_id == 1) {
//                return redirect()->route('admin.dashboard');
//            }else{
//                return redirect()->route('user.dashboard');
//            }
//        }else{
//            return redirect()->route('login')
//                ->with('error','Email or Password Are Wrong.');
//        }
//
//    }


    protected function credentials(Request $request)
    {
        if(is_numeric($request->get('email'))){
            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
        elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            return ['email' => $request->get('email'), 'password'=>$request->get('password')];
        }
        else
            return ['username' => $request->get('email'), 'password'=>$request->get('password')];
    }


    protected function authenticated(Request $request, $user) {
        if ($user->role_id == 1) {
            return redirect()->route('admin.dashboard');
        } else if ($user->role_id == 3) {
            return redirect()->route('seller.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }

}
