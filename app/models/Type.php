<?php

class Type extends Eloquent{

	protected $table = 'types';

	public function user(){
		return $this->hasMany('User');
	}
}