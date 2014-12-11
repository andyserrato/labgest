<?php

class GroupController extends \BaseController {

	protected $group;
	public function __construct(Group $group)
	{
		$this->group = $group;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = Group::all();
		return View::make('groups.index')
			->with('groups', $groups);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('groups.create');
	}
			
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/*
		$group = new Group;
		$group->nombre = Input::get('nombre');
		$group->email = Input::get('email');
		$group->telefono = Input::get('telefono');
		$group->save();
		return Redirect::to('group'); 
		*/
		$input = Input::all();
		$this->group->fill($input);
		if( !$this->group->isValid() )
		{
			return Redirect::back()->withInput()->withErrors($this->group->errors);	
		}
		
		$this->group->save();
		
		return Redirect::to('group')->with('message',"El grupo de investigación {$this->group->nombre} ha sido creado");; 	

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->group = Group::find($id);
		return "Id: {$this->group->id}
				Nombre: {$this->group->nombre} 
				Email: {$this->group->email} 
				Teléfono: {$this->group->telefono}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->group = Group::find($id);

		if( is_null($this->group) )
		{
			return Redirect::to( 'group' )->with('errors','El grupo de investigación no existe');
		}

		return View::make('groups.edit')
			->with('group',$this->group);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		/*
		$group = Group::find($id);

		if( is_null($group) )
		{
			return Redirect::to( 'group' );
		}

		$group->nombre = Input::get('nombre');
		$group->email = Input::get('email');
		$group->telefono = Input::get('telefono');
		$group->save();
		return Redirect::to( 'group' );
		*/
		$this->group = Group::find($id);

		if( is_null($this->group) )
		{
			return Redirect::to( 'group' )->with('errors','El grupo de investigación no existe');
		}

		$input = Input::all();
		$this->group->fill($input);
		if( !$this->group->isValid() )
		{
			return Redirect::back()->withInput()->withErrors($this->group->errors);	
		}

		$this->group->save();
		Session::put('message',"El grupo de investigación {$this->group->nombre} se ha actualizado");
		return Redirect::to( 'group' );
	
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->group = Group::find($id);

		if( is_null($this->group) )
		{
			return Redirect::to( 'group' )->with('errors','El grupo de investigación no existe');
		}

		Session::put('message',"El grupo de investigación {$this->group->nombre} se ha eliminado");

		$this->group->delete();

		return Redirect::to( 'group' );
	}


}
