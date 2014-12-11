<?php

class UnitController extends \BaseController {

	protected $unit;
	public function __construct(Unit $unit)
	{
		$this->unit = $unit;
	}
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
		$input = Input::all();
		$this->unit->fill($input);
		if( !$this->unit->isValid() )
		{
			return Redirect::back()->withInput()->withErrors($this->unit->errors);	
		}
		
		$this->unit->save();
		
		return Redirect::to('unit')->with('message',"La unidad de medida {$this->unit->unidad} ha sido creado");; 	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->unit = Unit::find($id);
		return "Id: {$this->unit->id}
				Unidad: {$this->unit->unidad}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->unit = Unit::find($id);

		if( is_null($this->unit) )
		{
			return Redirect::to( 'unit' )->with('errors','La unidad de medida no existe');
		}

		return View::make('units.edit')
			->with('unit',$this->unit);
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
		$unit = Unit::find($id);

		if( is_null($unit) )
		{
			return Redirect::to( 'unit' );
		}

		$unit->unidad = Input::get('unidad');
		$unit->save();
		return Redirect::to( 'unit' );
		*/
		$this->unit = Unit::find($id);

		if( is_null($this->unit) )
		{
			return Redirect::to( 'unit' )->with('errors','La unidad de medida no existe');
		}

		$input = Input::all();
		$this->unit->fill($input);
		if( !$this->unit->isValid() )
		{
			return Redirect::back()->withInput()->withErrors($this->unit->errors);	
		}

		$this->unit->save();
		Session::put('message',"La unidad de medida {$this->unit->unidad} se ha actualizado");
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
		$this->unit = Unit::find($id);

		if( is_null($this->unit) )
		{
			return Redirect::to( 'unit' )->with('errors','La unidad de medida no existe');
		}
		
		Session::put('message',"La unidad de medida {$this->unit->unidad} se ha eliminado");

		$this->unit->delete();

		return Redirect::to( 'unit' );
	}


}
