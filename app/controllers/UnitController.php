<?php

class UnitController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$units = Unit::all();
		return View::make('units.index')
			->with('units', $units);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('units.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$unit = new Unit;
		$unit->unidad = Input::get('unidad'); // recuerda que esta limitado a 20
		$unit->save();
		return Redirect::to('unit'); 	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$unit = Unit::find($id);
		return "Id: {$unit->id}
				Unidad: {$unit->unidad}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$unit = Unit::find($id);

		if( is_null($unit) )
		{
			return Redirect::to( 'unit' );
		}

		return View::make('units.edit')
			->with('unit',$unit);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$unit = Unit::find($id);

		if( is_null($unit) )
		{
			return Redirect::to( 'unit' );
		}

		$unit->unidad = Input::get('unidad');
		$unit->save();
		return Redirect::to( 'unit' );
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$unit = Unit::find($id);

		if( is_null($unit) )
		{
			return Redirect::to( 'unit' );
		}

		$unit->delete();

		return Redirect::to( 'unit' );
	}


}
