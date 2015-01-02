<?php

class UserController extends BaseController {

	
	public function getUserRegister()
	{
		return View::make('user.register');
	}
	
	
	public function getUserLogin()
	{
		return View::make('user.login');
	}
	
	public function SaveRegister()
	{
		$validation = Validator::make(Input::all(),array(
			'email' => 'required|unique:users|email',
			'name' => 'required',
			'username' => 'required|unique:users',
			'pass1' => 'required|',
			'pass2' => 'required|same:pass1'
		));
		
		if($validation->fails())
		{
			return Redirect::route('register')->withErrors($validation)->withInput();
		}
		else
		{
			$user = new user();
			$user->email = Input::get('email');
			$user->name = Input::get('name');
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('pass2'));
			
			if($user->save())
			{
				return Redirect::route('home')->with('Success','User Register Successfully...');
			}
			else
			{
				return Redirect::route('home')->with('Fail','Please try again...');
			}
		}
	}
	
	
	public function UserLogin()
	{
		$validation = Validator::make(Input::all(),array(
			'username' => 'required',
			'pass1' => 'required'
		));
		
		
		if($validation->fails())
		{
			return Redirect::route('login')->withErrors($validation)->WithInput();
		}
		else
		{
			$auth = Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('pass1')
			));
			/*$remember = (Input::has('remember')) ? true : false;
   			$auth = Auth::attempt(array(
   				'username' => Input::get('username'),
   				'password' => Input::get('pass1')
   			), $remember);*/
			
			//echo Input::get('username');
			//echo Input::get('pass1');
			
			//print_r($auth);
			//exit;
			
			if($auth)
			{
				return Redirect::intended('/');
			}
			else
			{
				return Redirect::route('login')->with('Fail','Please try again...');
			
			}
		}
		
	}
	
	
	public function UserLogout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

}
