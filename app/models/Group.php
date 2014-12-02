<?php

class Group extends Eloquent{

	protected $table = 'groups';

	public function user(){
		return $this->hasMany('User');
	}
}