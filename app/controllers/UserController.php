<?php

class UserController extends \BaseController {

	protected $user;
	public function __construct(User $user)
	{
		$this->user = $user;
	}

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

	public function cuentaUsers()
	{
		//return User::all()->count();
		Session::put('cuentaUsers', User::all()->count() );

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
		$input = Input::all();

		//$input['password'] = Hash::make($input['password']);
		$this->user->fill($input);
		$validation = Validator::make(Input::all(), User::$rulesCreate);
		//if( !$this->user->isValidCreate() )
		if( $validation->fails() )
		{
			//return Redirect::back()->withInput()->withErrors($this->user->errors);	
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		/*$validation = Validator::make(Input::all(), User::$rules);

		if($validation->fails())
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		
		if( (User::where('email', '=', Input::get('email'))->count()) > 0 )
		{
			$user = Input::get('email');
			Session::put('message',"El email {$user} ya se encuentra registrado");
			return Redirect::action('UserController@create');
			return Redirect::('users.create')
				->with('message',"El email {$user} ya se encuentra registrado");
		}
		*/
		$this->user->password = Hash::make($this->user->password);

		$this->user->save();

		/*
		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->nombre = Input::get('nombre');
		$user->telefono = Input::get('telefono');
		$user->type_id = Input::get('type_id');
		$user->group_id = Input::get('group_id');
		$user->save();
		*/
		//return Redirect::route('user');
		return Redirect::to('login')
			->with('message',"El usuario {$this->user->email} ha sido creado");		
	}	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->user = User::find($id);
		return "Id: {$this->user->id}
				Nombre: {$this->user->nombre} 
				Email: {$this->user->email} 
				Teléfono: {$this->user->telefono}
				Tipo: {$this->user->type_id}
				Grupo: {$this->user->group_id}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->user = User::find($id);

		if( is_null($this->user) )
		{
			//Session::put('errors',"El usuario no existe");
			return Redirect::to( 'user' )->with('errors',"El usuario no existe");
		}

		$types = Type::all();
  		$type_options = array_combine($types->lists('id'), $types->lists('tipo')); 
		$groups = Group::all();
  		$group_options = array_combine($groups->lists('id'), $groups->lists('nombre')); 
		return View::make('users.edit')
			->with('user',$this->user)
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
		$this->user = User::find($id);

		if( is_null($this->user) )
		{
			//Session::put('errors',"El usuario no existe");
			//return Redirect::to('user');
			return Redirect::to( 'user' )->with('errors',"El usuario no existe");
		}

		$input = Input::all();
		$this->user->fill($input);
		$validation = Validator::make(Input::all(), User::$rulesUpdate);
		//if( !$this->user->isValidCreate() )
		if( $validation->fails() )
		{
			//return Redirect::back()->withInput()->withErrors($this->user->errors);	
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		/*//$input['password'] = Hash::make($input['password']);
		$this->user->fill($input);
		if( !$this->user->isValidUpdate() )
		{
			return Redirect::back()->withInput()->withErrors($this->user->errors);	
		}
		*/

		/*
		$user->email = Input::get('email');
		$user->nombre = Input::get('nombre');
		$user->password = Hash::make(Input::get('password'));
		$user->telefono = Input::get('telefono');
		$user->type_id = Input::get('type_id');
		$user->group_id = Input::get('group_id');
		$user->save();
		*/

		$this->user->password = Hash::make($this->user->password);
		$this->user->save();
		Session::put('message',"El usuario {$this->user->email} se ha actualizado");
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
		$this->user = User::find($id);

		if( is_null($this->user) )
		{
			return Redirect::to( 'user' )->with('errors',"El usuario no existe");
		}

		Session::put('message',"El usuario {$this->user->email} se ha eliminado");

		$this->user->delete();

		return Redirect::to( 'user' );
	}


}
