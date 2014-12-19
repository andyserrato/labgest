<?php

class TypeController extends \BaseController {
	
	protected $type;
	public function __construct(Type $type)
	{
		$this->beforeFilter('role:admin');
		$this->type = $type;
	}
	
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
		/*
		$type = new Type;
		$type->tipo = Input::get('tipo'); // recuerda que esta limitado a 20
		$type->save();
		return Redirect::to('type'); 
		*/

		$input = Input::all();
		$this->type->fill($input);
		if( !$this->type->isValid() )
		{
			return Redirect::back()->withInput()->withErrors($this->type->errors);	
		}
		
		$this->type->save();
		
		return Redirect::to('type')->with('message',"El tipo de usuario {$this->type->tipo} ha sido creado");; 	

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->type = Type::find($id);
		return "Id: {$this->type->id}
				Tipo: {$this->type->tipo}";
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->type = Type::find($id);

		if( is_null($this->type) )
		{
			return Redirect::to( 'type' )->with('errors','La unidad de medida no existe');
		}

		return View::make('types.edit')
			->with('type',$this->type);
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
		$type = Type::find($id);

		if( is_null($type) )
		{
			return Redirect::to( 'type' );
		}

		$type->tipo = Input::get('tipo');
		$type->save();
		return Redirect::to( 'type' );
		*/
		$this->type = type::find($id);

		if( is_null($this->type) )
		{
			return Redirect::to( 'type' )->with('errors','La unidad de medida no existe');
		}

		$input = Input::all();
		$this->type->fill($input);
		if( !$this->type->isValid() )
		{
			return Redirect::back()->withInput()->withErrors($this->type->errors);	
		}

		$this->type->save();
		Session::put('message',"La unidad de medida {$this->type->unidad} se ha actualizado");
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
		$this->type = Type::find($id);

		if( is_null($this->type) )
		{
			return Redirect::to( 'type' )->with('errors','La unidad de medida no existe');
		}

		Session::put('message',"La unidad de medida {$this->type->unidad} se ha eliminado");

		$this->type->delete();

		return Redirect::to( 'type' );
	}

}
