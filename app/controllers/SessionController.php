<?php

class SessionController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$credentials = Input::only('email', 'password');
	
		if(Auth::attempt($credentials)){
			return Redirect::intended('/');	
		}

		return Redirect::to("login")
            ->withInput()
            ->with('login_errors', true);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
    	Auth::logout();
    	Session::flush();
    	return Redirect::to('/');
	}


}


