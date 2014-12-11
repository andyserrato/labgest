<?php

class Type extends Eloquent{

	protected $table = 'types';
	protected $fillable = array('tipo');
	public static $rules = array('tipo'	=> 'required|min:5'); 
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