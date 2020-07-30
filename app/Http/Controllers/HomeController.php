<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.home');
    }
    
    public function verifyemail($token = null)
    {
        // $user = User::where('email_verification_token', $token)->first();
        // return $user;
        // if ($user) {
        //     if ($user->email_verified  == 0) {
        //         $user->email_verified  == 1;
        //         $user->save();
        //         return redirect('/');
        //     } elseif($user->email_verified  == 1) {
        //         echo "Your Email is alrady Verified";
        //     } else {
        //         return view('errors.404');
        //     }
            
        // } else {
        //     return view('errors.404');
        // }

        if ($token == null) {

            session()->flash('message', 'Invalid Token.');
            session()->flash('type', 'danger');
    
            return redirect()->route('login');
            }
    
            $user = User::where('email_verification_token', $token)->first();
    
            if ($user == null) {
    
            session()->flash('message', 'Invalid Token.');
            session()->flash('type', 'danger');
    
            return redirect()->route('login');
            }
    
            $user->update([
                'email_verified' => 1,
                'email_verified_at' => Carbon::now(),
                'email_verification_token' => '',
            ]);
    
            session()->flash('type', 'success');
            session()->flash('message', 'Your Account is Activated, You Can Login Now!!');
    
            return redirect()->route('login');
        
    }
}
