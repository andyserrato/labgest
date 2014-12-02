<?php

class TypeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$types = Type::all();
		return View::make('types.index')
			->with('types', $types);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('types.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$type = new Type;
		$type->tipo = Input::get('tipo'); // recuerda que esta limitado a 20
		$type->save();
		return Redirect::to('type'); 
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$type = Type::find($id);
		return "Id: {$type->id}
				Tipo: {$type->tipo}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$type = Type::find($id);

		if( is_null($type) )
		{
			return Redirect::to( 'type' );
		}

		return View::make('types.edit')
			->with('type',$type);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$type = Type::find($id);

		if( is_null($type) )
		{
			return Redirect::to( 'type' );
		}

		$type->tipo = Input::get('tipo');
		$type->save();
		return Redirect::to( 'type' );
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$type = Type::find($id);

		if( is_null($type) )
		{
			return Redirect::to( 'type' );
		}

		$type->delete();

		return Redirect::to( 'type' );
	}

}
