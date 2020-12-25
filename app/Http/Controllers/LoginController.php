<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
  public function login(Request $request)
  {


$request->validate([
          'email' => 'required|string|email',
          'password' => 'required|string',
          'remember_me' => 'boolean'
      ]);

      if(!Auth::attempt($request->only('email', 'password'))) {
        /*  return response()->json([
              'message' => 'Authorization failed'
          ], 401); */
          throw ValidationException::withMessages(['email' => 'email is incorrect', 'password' => 'password is incorrect']);
        }
        $user = Auth::user();
        return $user->createToken('store-owner')->plainTextToken;
  }

  public function logout (Request $request) {
    Auth::user()->currentAccessToken()->delete();
    return response('Logged out');
  }
}
