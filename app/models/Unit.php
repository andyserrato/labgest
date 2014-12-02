<?php

class Unit extends Eloquent{

	protected $table = 'units';

	public function product(){
		return $this->hasMany('product');
	}
} 