<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegister;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }




    // OVERRIDE SENDSPASSWORDRESETEMAILS

    protected function validateEmail(Request $request)
    {
        $this->validate(
            $request,
            [
          'email' => 'required|email'
        ],
        [
          'email.required' => 'Surat elektronik tidak boleh kosong!'
        ]
      );
    }


    protected function sendResetLinkResponse(Request $request, $response)
    {
        return back()->with('status', trans('passwords.sent_in_bahasa'));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => trans('passwords.user_in_bahasa')]);
    }
}
