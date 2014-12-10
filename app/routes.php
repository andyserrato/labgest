<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
  return View::make("labgest.index");
});

Route::get('/riskquim', function() {
  return Redirect::to("http://riskquim.insht.es:86/riskquim/CLP/");
});

Route::get('login', array(
  'uses' => 'SessionController@create',
  'as' => 'session.create'
));

Route::post('login', array(
  'uses' => 'SessionController@store',
  'as' => 'session.store'
));

Route::get('logout', array(
  'uses' => 'SessionController@destroy',
  'as' => 'session.destroy'
));

Route::resource('product', 'ProductController', array('only' => array('index')));
Route::resource('user', 'UserController', array('only' => array('create','store')));

Route::post('search', array(
  'uses' => 'ProductController@search',
  'as' => 'product.search'
));

Route::group(array('before' => 'auth' ), function()
{
  Route::get('administracion', function() {
    return View::make("labgest.administracion");
  });
  Route::resource('group', 'GroupController');
  Route::resource('location', 'LocationController');
  Route::resource('type', 'TypeController');
  Route::resource('unit', 'UnitController');
  Route::resource('user', 'UserController', array('except' => array('create','store')));
  Route::get('mostrar', array(
  'uses' => 'ProductController@mostrar',
  'as' => 'product.mostrar'));
  Route::resource('product', 'ProductController', 
                  array('except' => array('index')));
});

/*Route::get('/productos', function() {
  return View::make("labgest.productos");
});*/

/*Route::get('/sustancias', function() {
  return View::make("labgest.sustancias");
});
*/

//Route::resource('crear_usuario', 'UserController@create');

/*
Route::get('/administracion', function(){
	return View::make("labgest.administracion");
});
*/

/*
Route::get('/administracion', function() {
  return View::make("labgest.administracion");
});
*/
/*
Route::get('/login', function() {
  return View::make("labgest.login");
});

Route::post('/login', function() {
	
	$credentials = Input::only('email', 'password');
	
	if(Auth::attempt($credentials)){
		return Redirect::intended('/');	
	}

	return Redirect::to("login");
});

Route::get('/logout', function() {
	Auth::logout();
	return View::make("labgest.logout");
});
*/
//Route::resource('login', 'SessionController@create');

