<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller {

	public function __construct() {
		$this->middleware('guest');
	}

	public function update(Request $request) {

		$user = User::find(Auth::user()->id);

		if ($user) {
			$validate = null;
			if (Auth::user()->email === $request['email']) {
				$validate = $request->validate([
					'email' => 'required|min:2',
					'password' => 'required|min:2',

				]);
			} else {
				$validate = $request->validate([
					'email' => 'required|email|unique:users',
					'password' => 'required|min:2',

				]);
			}

			if ($validate) {
				$user->email = $request['email'];
				$user->password = $request['password'];

				$user->save();
				$request->session()->flash('success', 'Your password has been changed!');
				return redirect()->back();
			} else {
				return redirect()->back();
			}

		} else {
			return redirect()->back();
		}
	}

	public function edit() {
		if (Auth::user()) {
			$user = User::find(Auth::user()->id);

			if ($user) {
				return view('forgotpassword')->withUser($user);
			} else {
				return redirect()->back();
			}
		} else {
			return redirect()->back();
		}
	}
}
