<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('products.index');
	}

	public function mostrar()
	{
		$products = Product::all();
		return View::make('products.mostrar')
			->with('products',$products);
	}

	public function search()
	{
		$keyword = Input::get('keyword');
		$field = Input::get('field');
		
		/**if( is_null($keyword) and Auth::check() )
		{
			return Redirect::to( 'product' );
		}
		
		if( Input::has('keyword') and (!Auth::guest()) ) 
		{
			return View::make("keyword");
			//return Redirect::to('labgest.productos')
			//	->with('errors', 'No se encontró término de búsqueda');	
		}
		*/

		$results = Product::where($field, 'LIKE', '%'.$keyword.'%')->get();
		
		if( $keyword == null )
		{
			return Redirect::to('product')
				->with('errors', 'Término de búsqueda vacío');
		}

		if( $results->isEmpty() )
		{
			return Redirect::to('product')
				->with('errors', 'No se encuentran registros con ese término de búsqueda');	
		}		

		if( Auth::check() )
		{
			$products = Product::all();
			return View::make('products.index')
				->with('products',$products)
				->with('results',$results);
				//->with('resultsCount',$results->count());

		}

		return View::make('products.index')
				->with('results',$results);
				//->with('resultsCount',$results->count());

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$locations = Location::all();
  		$location_options = array_combine($locations->lists('id'), $locations->lists('nombre')); 
		$units = Unit::all();
  		$unit_options = array_combine($units->lists('id'), $units->lists('unidad')); 
		return View::make('products.create')
		 	->with('location_options', $location_options)
		 	->with('unit_options', $unit_options);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$product = new Product;
		$product->cas = Input::get('cas');
		$product->iupac = Input::get('iupac');
		$product->ce = Input::get('ce');
		$product->unit_id = Input::get('unit_id');
		$product->location_id = Input::get('location_id');
		$product->cantidad = Input::get('cantidad');
		$product->responsable = Input::get('responsable');
		$product->user_id = Auth::id();//Input::get('user_id');
		$product->notas = Input::get('notas');
		$product->save();

		return Redirect::to( 'product' );
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::find($id);
		return "Id: {$product->id}
				CAS: {$product->cas} 
				IUPAC: {$product->iupac} 
				CES: {$product->ces}
				Unit_id: {$product->unit_id}
				Location_id: {$product->location_id}
				Cantidad:{$product->cantidad}
				Responsable:{$product->responsable}
				User_id: {$product->user_id}
				Notas: {$product->notas}";
	}

	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = Product::find($id);

		if( is_null($product) )
		{
			return Redirect::to( 'product' );
		}
		
		$locations = Location::all();
  		$location_options = array_combine($locations->lists('id'), $locations->lists('nombre')); 
		$units = Unit::all();
  		$unit_options = array_combine($units->lists('id'), $units->lists('unidad')); 
		return View::make('products.edit')
		 	->with('product',$product)
		 	->with('location_options', $location_options)
		 	->with('unit_options', $unit_options);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$product = Product::find($id);

		if( is_null($product) )
		{
			return Redirect::to( 'product' );
		}

		$product->cas = Input::get('cas');
		$product->iupac = Input::get('iupac');
		$product->ce = Input::get('ce');
		$product->unit_id = Input::get('unit_id');
		$product->location_id = Input::get('location_id');
		$product->cantidad = Input::get('cantidad');
		$product->responsable = Input::get('responsable');
		$product->user_id = Auth::id();//Input::get('user_id');
		$product->notas = Input::get('notas');
		$product->save();

		return Redirect::to( 'product' );
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::find($id);

		if( is_null($product) )
		{
			return Redirect::to( 'product' );
		}

		$product->delete();

		return Redirect::to( 'product' );
	}


}
