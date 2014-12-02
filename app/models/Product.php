<?php

class Product extends Eloquent{
	
	protected $table = 'products';

	public function user(){
		return $this->belongsTo('User');
	}

	public function location(){
		return $this->belongsTo('Location');
	}

	public function unit(){
		return $this->belongsTo('Unit');
	}
}