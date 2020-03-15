<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Cache;
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
    protected $user;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('backend.auth.login');
    }


    public function login(Request $request){

        if (Auth::attempt(['email' => $request->email,'password' => $request->password,])){

                return redirect()->to('/dashboard')->with('success-login','Successfully login');

        }

       return back()
            ->withInput()
            ->with('flash_error', 'Credentials do not match the records.');
    }
    public function logout(Request $request){

        $this->guard()->logout();
        Session::flush();
        $request->session()->regenerate();
        Session::flash('succ_message', 'Logged out Successfully');
        Cache::flush();

        return redirect('/login')->with('success','Logout Successfully');
    }

}
