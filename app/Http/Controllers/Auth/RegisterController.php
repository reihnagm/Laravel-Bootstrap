<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegister;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

use DB;
use App\Models\User;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
      $this->middleware('guest');
    }

    // OVERRIDE REGISTERSUSERS

    public function register(UserRegister $request)
    {
      $user = new User;
      $user->nickname = $request->nickname;
      $user->fullname = $request->fullname;
      $user->email = $request->email;
      $user->gender = $request->gender;
      $user->group_id = 3;
      $user->password = Hash::make($request->password);

      $user->save();

      // IF NOT USE AUTH GUARD, ACCESS DENIED TO EMAIL VERIFY
      auth()->guard()->login($user);

      event(new Registered($user));

      return redirect(route('verification.notice'));
  }
}
