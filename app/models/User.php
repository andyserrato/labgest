<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $fillable = array('nombre', 'email', 'password', 'telefono', 'type_id', 'group_id');
	public static $rulesCreate = array(
		'nombre'	=> 'required|min:3', 
		'email' 	=> 'required|email|unique:users', 
		'password' 	=> 'required|min:5', 
		'telefono' 	=> 'required|integer|min:9',
		'type_id'	=> 'required',
		'group_id'	=> 'required' 
	);
	public static $rulesUpdate = array(
		'nombre'	=> 'required|min:3', 
		'email' 	=> 'required|email|', 
		'password' 	=> 'required|min:5', 
		'telefono' 	=> 'required|integer|min:9',
		'type_id'	=> 'required',
		'group_id'	=> 'required' 
	);
	public $errors;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function type(){
		return $this->belongsTo('Type');
	}

	public function group(){
		return $this->belongsTo('Group');
	}

	public function product(){
		return $this->hasMany('Product');
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
