<?php

class ProductController extends \BaseController {

	protected $product;
	public function __construct(Product $product)
	{
		$this->product = $product;
	}
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
		$howMany = 20;
		$products = Product::paginate($howMany);
		return View::make('products.mostrar')
			->with('products',$products);
	}

	public function search()
	{
		$keyword = Input::get('keyword');
		$field = Input::get('field');
		$perPage = 20;
		
		if( $keyword == null )
		{
			//$users = User::all();
    		//$users = array($users->lists('id'));
    		//return $users;
			return Redirect::to('product')->with('errors', 'Término de búsqueda vacío');
			//return Redirect::back()->withErrors('Término de búsqueda vacío');
		}

			
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
		if( $field == "location_id" )
		{
			//$keyword = Location::where('nombre', 'LIKE', '%'.$keyword.'%')->get();
			//$keyword = DB::table('locations')->where('nombre', 'LIKE', '%'.$keyword.'%')->get();
				
			//$result->location->nombre
			$results = Product::whereHas('location', function($q) use ($keyword)
			{
				$q->where('nombre', 'LIKE', '%'.$keyword.'%');
			})->get();//->paginate($perPage);//->get();
			//$results->toArray();
			//$paginator = Paginator::make($results->toArray(), $results->count(), $perPage);
			//return $results;
			//return View::make('products.index')
			//	->with('results',$results);
		
		}
		else
		{
			$results = Product::where($field, 'LIKE', '%'.$keyword.'%')->get();	
			//$results->toArray();
			//$paginator = Paginator::make($results->toArray(), $results->count(), $perPage);
		}
		
		if( $results->isEmpty() )
		{
			return Redirect::to('product')
				->with('errors', 'No se encuentran registros con ese término de búsqueda');	
		}	
		
		/*
		if( Auth::check() )
		{
			$products = Product::all();
			return View::make('products.index')
				->with('products',$products)
				->with('results',$results);
				//->with('resultsCount',$results->count());

		}

		*/
		//return $results->lists('id');
		Session::put('results', $results->lists('id'));
		//return View::make('products.index')
		//		->with('results',$results);
				//->with('resultsCount',$results->count());
		return Redirect::to('viewResults');
	}

	public function viewResults()
	{
		$howMany = 20;
		$results_ids = Session::get('results');
		$results = Product::whereIn('id', $results_ids)->paginate($howMany);
		return View::make('products.index')->with('results',$results);
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
		/*
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
		*/
		$input = Input::all();
		$input['user_id'] = Auth::id();
		$this->product->fill($input);
		if( !$this->product->isValidCreate() )
		{
			return Redirect::back()->withInput()->withErrors($this->product->errors);	
		}

		$this->product->save();

		return Redirect::to('product')
			->with('message',"El producto {$this->product->iupac} ha sido creado");
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->product = Product::find($id);
		return "Id: {$this->product->id}
				CAS: {$this->product->cas} 
				IUPAC: {$this->product->iupac} 
				CES: {$this->product->ces}
				Unit_id: {$this->product->unit_id}
				Location_id: {$this->product->location_id}
				Cantidad:{$this->product->cantidad}
				Responsable:{$this->product->responsable}
				User_id: {$this->product->user_id}
				Notas: {$this->product->notas}";
	}

	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->product = Product::find($id);

		if( is_null($this->product) )
		{
			return Redirect::to( 'product' )->with('errors',"El producto no existe");
		}
		
		$locations = Location::all();
  		$location_options = array_combine($locations->lists('id'), $locations->lists('nombre')); 
		$units = Unit::all();
  		$unit_options = array_combine($units->lists('id'), $units->lists('unidad')); 
		return View::make('products.edit')
		 	->with('product',$this->product)
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
		/*
		$this->product = Product::find($id);

		if( is_null($this->product) )
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
		*/
		$this->product = Product::find($id);

		if( is_null($this->product) )
		{
			//Session::put('errors',"El usuario no existe");
			//return Redirect::to('product');
			return Redirect::to( 'product' )->with('errors',"El producto no existe");
		}

		$input = Input::all();
		$input['user_id'] = Auth::id();		
		$this->product->fill($input);
		if( !$this->product->isValidUpdate() )
		{
			return Redirect::back()->withInput()->withErrors($this->product->errors);	
		}
		/*
		$product->email = Input::get('email');
		$product->nombre = Input::get('nombre');
		$product->password = Hash::make(Input::get('password'));
		$product->telefono = Input::get('telefono');
		$product->type_id = Input::get('type_id');
		$product->group_id = Input::get('group_id');
		$product->save();
		*/
		$this->product->save();
		Session::put('message',"El producto {$this->product->email} se ha actualizado");
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
		$this->product = Product::find($id);

		if( is_null($this->product) )
		{
			return Redirect::to( 'product' )->with('errors',"El producto no existe");
		}

		$this->product->delete();

		return Redirect::to( 'product' );
	}


}
