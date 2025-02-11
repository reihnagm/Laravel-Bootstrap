<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // OVERRIDE AUTHENTICATESUSERS

    public function login(Request $request)
    {
      $this->validateLogin($request);

      if ($this->hasTooManyLoginAttempts($request)) {
          $this->fireLockoutEvent($request);

          return $this->sendLockoutResponse($request);
      }

      if ($this->attemptLogin($request)) {
          return $this->sendLoginResponse($request);
      }

      $this->incrementLoginAttempts($request);

      return $this->sendFailedLoginResponse($request);
    }


    protected function sendFailedLoginResponse(Request $request)
    {
      throw ValidationException::withMessages([
          // FAILED IN BAHASA INDONESIAN
          $this->username() => [trans('auth.failed_in_bahasa')],
      ]);
    }
}
