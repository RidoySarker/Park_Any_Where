<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $credentials = $request->except(['_token']);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            if ($user->email_verified == 0) {

                session()->flash('type', 'danger');
                session()->flash('message', 'Your Acount isn\'t Activated, Please Active Your Account. Check Your Email.');
                auth()->logout();

                return redirect()->route('login');
            }
            return redirect()->to('/admin');
        }

        session()->flash('message', 'Wrong Email Or Password.');
        session()->flash('type', 'danger');

        return redirect()->back();
    }
    //  /**
    //  * Handle a login request to the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
    //  */
    //  public function login(Request $request)
    //  {
    //      $this->validateLogin($request);
 
    //      // If the class is using the ThrottlesLogins trait, we can automatically throttle
    //      // the login attempts for this application. We'll key this by the username and
    //      // the IP address of the client making these requests into this application.
    //      if ($this->hasTooManyLoginAttempts($request)) {
    //          $this->fireLockoutEvent($request);
 
    //          return $this->sendLockoutResponse($request);
    //      }
 
    //      // Customization: Validate if client status is active (1)
    //      if ($this->attemptLogin($request)) {
    //          return $this->sendLoginResponse($request);
    //      }
 
    //      // Customization: Validate if client status is active (1)
    //      $email = $request->get($this->username());
    //      // Customization: It's assumed that email field should be an unique field 
    //      $user = User::where($this->username(), $email)->first();
 
    //      // If the login attempt was unsuccessful we will increment the number of attempts
    //      // to login and redirect the user back to the login form. Of course, when this
    //      // user surpasses their maximum number of attempts they will get locked out.
    //      $this->incrementLoginAttempts($request);
 
    //      // Customization: If client status is inactive (0) return failed_status error.
    //      if ($user->email_verified === 0) {
    //          return $this->sendFailedLoginResponse($request, 'auth.failed_status');
    //      }
        
    //      return $this->sendFailedLoginResponse($request);
    //  }
 
    //  /**
    //   * Get the needed authorization credentials from the request.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @return array
    //   */
    //  protected function credentials(Request $request)
    //  {
    //      $credentials = $request->only($this->username(), 'password');
    //      // Customization: validate if client status is active (1)
    //      $credentials['email_verified'] = 1;
    //      return $credentials;
    //  }
 
    //  /**
    //   * Get the failed login response instance.
    //   *
    //   * @param  \Illuminate\Http\Request  $request
    //   * @param  string  $field
    //   * @return \Illuminate\Http\RedirectResponse
    //   */
    //  protected function sendFailedLoginResponse(Request $request, $trans = 'auth.failed')
    //  {
    //      $errors = [$this->username() => trans($trans)];
 
    //      if ($request->expectsJson()) {
    //          return response()->json($errors, 422);
    //      }
 
    //      return redirect()->back()
    //          ->withInput($request->only($this->username(), 'remember'))
    //          ->withErrors($errors);
    //  }
}
