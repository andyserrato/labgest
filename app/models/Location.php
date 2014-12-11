<?php

class Location extends Eloquent{

	protected $table = 'locations';
	protected $fillable = array('nombre','direccion','telefono','email');
	public static $rules = array(
		'nombre'	=> 'required|min:3', 
		'direccion'	=> 'required|min:5',
		'email' 	=> 'required|email', 
		'telefono' 	=> 'required|integer|min:9'); 
	public $errors;

	public function product(){
		return $this->hasMany('product');
	}

	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes())
			return true;

		$this->errors = $validation->messages();

		return false;
	}
}

