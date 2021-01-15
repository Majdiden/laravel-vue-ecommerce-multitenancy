<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  public function login(Request $request)
  {


$request->validate([
          'email' => 'required|string|email',
          'password' => 'required|string',
          'remember_me' => 'boolean'
      ]);

      $user = User::where('email', $request->email)->first();

         if (! $user || ! Hash::check($request->password, $user->password)) {
             throw ValidationException::withMessages([
                 'email' => ['The provided credentials are incorrect.'],
             ]);
         }
         $token = $user->createToken('Store Owner')->plainTextToken;
          $data = ['token' => $token];
        return $data['token'];
  }

  public function logout (Request $request) {
    Auth::user()->currentAccessToken()->delete();
    return response('Logged out');
  }
}
