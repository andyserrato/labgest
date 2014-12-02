<?php

class UserController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		//$types = Type::all();
  		//$type_options = array_combine($types->lists('id'), $types->lists('tipo')); 
		return View::make('users.index')
			->with('users',$users);
		 //	->with('type_options', $type_options);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$types = Type::all();
  		$type_options = array_combine($types->lists('id'), $types->lists('tipo')); 
		$groups = Group::all();
  		$group_options = array_combine($groups->lists('id'), $groups->lists('nombre')); 
		return View::make('users.create')
		 	->with('type_options', $type_options)
		 	->with('group_options', $group_options);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if( (User::where('email', '=', Input::get('email'))->count()) > 0 )
		{
			$user = Input::get('email');
			Session::put('message',"El email {$user} ya se encuentra registrado");
			return Redirect::action('UserController@create');
			/*return Redirect::('users.create')
				->with('message',"El email {$user} ya se encuentra registrado");*/
		}

		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->nombre = Input::get('nombre');
		$user->telefono = Input::get('telefono');
		$user->type_id = Input::get('type_id');
		$user->group_id = Input::get('group_id');
		$user->save();

		//return Redirect::route('user');
		return Redirect::to('login')
			->with('message',"El usuario {$user->email} ha sido creado");		
	}	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return "Id: {$user->id}
				Nombre: {$user->nombre} 
				Email: {$user->email} 
				Teléfono: {$user->telefono}
				Tipo: {$user->type_id}
				Grupo: {$user->group_id}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		if( is_null($user) )
		{
			return Redirect::to( 'user' );
		}

		$types = Type::all();
  		$type_options = array_combine($types->lists('id'), $types->lists('tipo')); 
		$groups = Group::all();
  		$group_options = array_combine($groups->lists('id'), $groups->lists('nombre')); 
		return View::make('users.edit')
			->with('user',$user)
		 	->with('type_options', $type_options)
		 	->with('group_options', $group_options);
		//return View::make('users.edit')->with('user',$user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		if( is_null($user) )
		{
			return Redirect::to( 'user' );
		}

		$user->email = Input::get('email');
		$user->nombre = Input::get('nombre');
		$user->password = Hash::make(Input::get('password'));
		$user->telefono = Input::get('telefono');
		$user->type_id = Input::get('type_id');
		$user->group_id = Input::get('group_id');
		$user->save();
		Session::put('message',"El usuario {$user->email} se ha actualizado");
		return Redirect::to( 'user' );
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);

		if( is_null($user) )
		{
			return Redirect::to( 'user' );
		}

		$user->delete();

		return Redirect::to( 'user' );
	}


}
