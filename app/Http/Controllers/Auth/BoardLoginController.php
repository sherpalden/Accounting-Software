<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class BoardLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:board', ['except' => ['logout','boardLogout']]);
	}

    public function showLoginForm()
    {
    	return view('auth.board-login');
    }

    public function login(Request $request)
    {
    	// Validate the form data 
    	$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:8'
		]);

    	// Attempt to log the user in 
    	if(Auth::guard('board')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    		// if successful then redirect to their intended location
    		return redirect()->intended(route('board.dashboard'));
    	}

    	// if unsuccessful, then redirect back to the login with the form data
    	return redirect()->back()->WithInput($request->only('email', 'remember'));
    }
	
	public function boardLogout()
    {
        Auth::guard('board')->logout();

//        $request->session()->invalidate();

//        return $this->loggedOut($request) ?: redirect('/');
		return redirect('/');
    }
}
