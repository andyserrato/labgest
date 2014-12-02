<?php

class GroupController extends \BaseController {

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
		$group = new Group;
		$group->nombre = Input::get('nombre');
		$group->email = Input::get('email');
		$group->telefono = Input::get('telefono');
		$group->save();
		return Redirect::to('group'); 
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$group = Group::find($id);
		return "Id: {$group->id}
				Nombre: {$group->nombre} 
				Email: {$group->email} 
				Teléfono: {$group->telefono}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$group = Group::find($id);

		if( is_null($group) )
		{
			return Redirect::to( 'group' );
		}

		return View::make('groups.edit')
			->with('group',$group);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
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
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$group = Group::find($id);

		if( is_null($group) )
		{
			return Redirect::to( 'group' );
		}

		$group->delete();

		return Redirect::to( 'group' );
	}


}
