<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    // OVERRIDE RESETSPASSWORDS

    public function reset(Request $request)
    {
      $this->validate($request, [
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8'
      ], [
        'token.required' => 'Token dibutuhkan!',
        'email.required' => 'Surat Elektronik tidak boleh kosong!',
        'password.required' => 'Kata Sandi tidak boleh kosong!',
        'password.confirmed' => 'Kata Sandi tidak sama!'
      ]);

      $response = $this->broker()->reset(
          $this->credentials($request),
          function ($user, $password) {
              $this->resetPassword($user, $password);
          }
      );


      return $response == Password::PASSWORD_RESET
                  ? $this->sendResetResponse($request, $response)
                  : $this->sendResetFailedResponse($request, $response);
    }

    protected function sendResetResponse(Request $request, $response)
    {
      return redirect($this->redirectPath())
                           ->with('status', trans('passwords.reset_in_bahasa'));
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
      return redirect()->back()
                  ->withInput($request->only('email'))
                  ->withErrors(['email' => trans('passwords.user_in_bahasa')]);
    }

    protected function credentials(Request $request)
    {
      return $request->only(
          'email',
          'password',
          'password_confirmation',
          'token'
      );
    }

    protected function resetPassword($user, $password)
    {
      $user->password = Hash::make($password);

      $user->setRememberToken(Str::random(60));

      $user->save();

      event(new PasswordReset($user));

      $this->guard()->login($user);
    }

    public function broker()
    {
      return Password::broker();
    }

    protected function guard()
    {
      return auth()->guard();
    }
}
