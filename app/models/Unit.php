<?php

class Unit extends Eloquent{

	protected $table = 'units';
	protected $fillable = array('unidad');
	public static $rules = array('unidad'	=> 'required'); 
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