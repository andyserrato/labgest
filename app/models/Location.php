<?php

class Location extends Eloquent{

	protected $table = 'locations';

	public function product(){
		return $this->hasMany('product');
	}
} 