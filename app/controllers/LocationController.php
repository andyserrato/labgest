<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$locations = Location::all();
		return View::make('locations.index')
			->with('locations', $locations);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('locations.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$location = new Location;
		$location->nombre = Input::get('nombre');
		$location->direccion = Input::get('direccion');
		$location->email = Input::get('email');
		$location->telefono = Input::get('telefono');
		$location->save();
		return Redirect::to('location'); 
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$location = Location::find($id);
		return "Id: {$location->id}
				Dirección: {$location->direccion}
				Nombre: {$location->nombre} 
				Email: {$location->email} 
				Teléfono: {$location->telefono}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$location = Location::find($id);

		if( is_null($location) )
		{
			return Redirect::to( 'location' );
		}

		return View::make('locations.edit')
			->with('location',$location);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$location = Location::find($id);

		if( is_null($location) )
		{
			return Redirect::to( 'location' );
		}

		$location->nombre = Input::get('nombre');
		$location->email = Input::get('email');
		$location->direccion = Input::get('direccion');
		$location->telefono = Input::get('telefono');
		$location->save();
		return Redirect::to( 'location' );
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$location = Location::find($id);

		if( is_null($location) )
		{
			return Redirect::to( 'location' );
		}

		$location->delete();

		return Redirect::to( 'location' );
	}


}
