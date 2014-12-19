<?php

class LocationController extends \BaseController {

	protected $location;
	public function __construct(Location $location)
	{
		$this->location = $location;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$howMany = 20;
		$locations = Location::paginate($howMany);
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
		/*
		$location = new Location;
		$location->nombre = Input::get('nombre');
		$location->direccion = Input::get('direccion');
		$location->email = Input::get('email');
		$location->telefono = Input::get('telefono');
		$location->save();
		return Redirect::to('location'); 
		*/
		$input = Input::all();
		$this->location->fill($input);
		if( !$this->location->isValid() )
		{
			return Redirect::back()->withInput()->withErrors($this->location->errors);	
		}
		
		$this->location->save();
		
		return Redirect::to('location')->with('message',"La ubicación {$this->location->nombre} ha sido creado");; 	

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->location = Location::find($id);
		return "Id: {$this->location->id}
				Dirección: {$this->location->direccion}
				Nombre: {$this->location->nombre} 
				Email: {$this->location->email} 
				Teléfono: {$this->location->telefono}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		$this->location = Location::find($id);

		if( is_null($this->location) )
		{
			return Redirect::to( 'location' )->with('errors','La ubicación no existe');
		}

		return View::make('locations.edit')
			->with('location',$this->location);
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
		*/
		$this->location = Location::find($id);

		if( is_null($this->location) )
		{
			return Redirect::to( 'location' )->with('errors','La ubicación no existe');
		}

		$input = Input::all();
		$this->location->fill($input);
		if( !$this->location->isValid() )
		{
			return Redirect::back()->withInput()->withErrors($this->location->errors);	
		}

		$this->location->save();
		Session::put('message',"La ubicación {$this->location->nombre} se ha actualizado");
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
		
		$this->location = Location::find($id);

		if( is_null($this->location) )
		{
			return Redirect::to( 'location' )->with('errors','La ubicación no existe');
		}

		Session::put('message',"La ubicación {$this->location->nombre} se ha eliminado");

		$this->location->delete();

		return Redirect::to( 'location' );
	}


}
