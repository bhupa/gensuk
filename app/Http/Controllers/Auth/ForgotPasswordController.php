<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPasswordLink;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $user;
    public function __construct(UserRepository $user)
    {
//        $this->middleware('guest');
        $this->user = $user;
    }
    public function showLinkRequestForm(){
        return view('backend.auth.forgetPasswordSendEmail');
    }

    public function sendResetLinkEmail(Request $request){
        $user  = $this->user->where('email', $request->email)->first();
        if(!empty($user)){
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => str_random(60), //change 60 to any length you want
                'created_at' => Carbon::now()
            ]);

            $tokenData = DB::table('password_resets')
                ->where('email', $request->email)->first();

            $token = $tokenData->token;
            $email = $request->email;

            Mail::to($user->email)->send(new ForgetPasswordLink($tokenData));
            return redirect()->back()->with('success','Please chek your email ');
        }
        return back()
            ->withInput()
            ->with('flash_error', 'Invalid Email address not found.');
    }
}
