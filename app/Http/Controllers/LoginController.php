<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); 
    }
	    public function index()
    {
        return view ('auth.login');
    }
	 public function login(Request $request)
	 {
	 $request->validate([
	 'email' => 'required',
	 'password' => 'required',
	 ]);
	 $credentials = $request->only('email', 'password');
	 if (Auth::attempt($credentials)) {
	 return redirect()->intended('forum');
	 }
	 return redirect("login")->withSuccess(__('lang.logintry'));
	 }
	  public function logout() {
		Session::flush();
		Auth::logout();
		return Redirect('login');
	}


}
