<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  //
  // public function showLoginForm()
  // {
  //   if (!session()->has('url.intended')) {
  //     session(['url.intended' => url()->previous()]);
  //   }
  //   return view('auth.login');
  // }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    // dd($credentials);
    if (Auth::attempt($credentials, true)) {


      $request->session()->regenerate();

      if (Auth::user()->admin) {
        return redirect('/dashboard');
      }
      return redirect()->intended('/');
    }
    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function store(Request $request)
  {
    $attributes = $request->validate([
      'username' => 'required',
      'email' => ['required', 'email'],
      'password' => 'required',
      'cpf' => 'required'
    ]);
    // dd($request->input('cpf'));

    if ($attributes) {
      $user = new User;
      $user->name = $request->username;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->cpf = $request->cpf;
      $user->gender = $request->gender;
      $user->phone = $request->phone;
      $user->cellphone = $request->cellphone;
      $user->email_verified_at = now();
      $user->save();
      // $user = User::create([
      //   'name' => $request->input('username'),
      //   'email' => $request->input('email'),
      //   'password' => $request->input('password'),
      //   'cpf' => $request->input('cpf'),
      //   'gender' => $request->input('gender'),
      //   'phone' => $request->input('phone'),
      //   'cellphone' => $request->input('cellphone'),
      //   'email_verified_at' => now(),
      // ]);

      Address::create([
        'user_id' => $user->id,
        'city' => $request->input('city'),
        'state' => $request->input('state'),
        'zipcode' => 12345,
        'street' => $request->input('street'),
        'number' => $request->input('number'),
        'complement' => 'A',
        'observation' =>  "Nothing to see here.",
      ]);
    }

    return redirect()->intended('/')->with('msg', "Welcome To Shole Shop!");
  }

  public function destroy()
  {
    Auth::logout();

    return redirect()->intended('/');
  }
}
