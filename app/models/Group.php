<?php

class Group extends Eloquent{

	protected $table = 'groups';
	protected $fillable = array('nombre','email','telefono');
	public static $rules = array(
		'nombre'	=> 'required|min:3', 
		'email' 	=> 'required|email', 
		'telefono' 	=> 'required|integer|min:9'); 
	public $errors;

	public function user(){
		return $this->hasMany('User');
	}

	public function isValid(){
		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes())
			return true;

		$this->errors = $validation->messages();

		return false;
	}
}
