<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class CreateStore extends Controller
{
    public function create(Request $request) {

      $domain = $request->domain;
      $store = Tenant::create([
        'id' => $request->sname
      ]);
      $store->domains()->create([
        'domain' => $request->domain
      ]);

      $store->save();

      tenancy()->initialize($store);

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
      ]);

    return redirect(tenant_route($domain, 'welcome'));
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password)
        ]);

        $user->save();
        return response()->json(['message'=> 'user created successfully'],201);
    }



}
