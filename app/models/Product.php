<?php

class Product extends Eloquent{
	
	protected $table = 'products';
	protected $fillable = array('cas','ce','iupac','unit_id','location_id','cantidad','responsable','user_id','notas');
	public static $rulesCreate = array(
		'cas'			=> 'required',
		'ce'			=> 'required',
		'iupac'			=> 'required',
		'unit_id'		=> 'required',
		'location_id'	=> 'required',
		'cantidad'		=> 'required',
		'responsable'	=> 'required',
		'user_id'		=> 'required',
		'notas'			=> 'required'
	);
	public static $rulesUpdate = array(
		'cas'			=> 'required',
		'ce'			=> 'required',
		'iupac'			=> 'required',
		'unit_id'		=> 'required|integer',
		'location_id'	=> 'required|integer',
		'cantidad'		=> 'required|integer',
		'responsable'	=> 'required',
		'user_id'		=> 'required|integer',
		'notas'			=> 'required'
	);
	

	public function user(){
		return $this->belongsTo('User');
	}

	public function location(){
		return $this->belongsTo('Location');
	}

	public function unit(){
		return $this->belongsTo('Unit');
	}

	public function isValidCreate(){
		$validation = Validator::make($this->attributes, static::$rulesCreate);

		if($validation->passes())
			return true;

		$this->errors = $validation->messages();

		return false;
	}

	public function isValidUpdate(){
		$validation = Validator::make($this->attributes, static::$rulesUpdate);

		if($validation->passes())
			return true;

		$this->errors = $validation->messages();

		return false;
	}
}