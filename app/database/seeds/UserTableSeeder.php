<?php

class UserTableSeeder extends Seeder {
  public function run(){
    DB::table('users')->insert(array(
    	array('id'=>1, 'email'=>"pruebausuario@prueba.com",
    			'password'=>Hash::make('prueba'), 
    			'nombre'=>"pruebausuario",
    			'telefono'=>666777888,
    			'type_id'=>1,
    			'group_id'=>1),
    	array('id'=>2, 'email'=>"admin@admin.com",
    			'password'=>Hash::make('admin'), 
    			'nombre'=>"admin",
    			'telefono'=>666777888,
    			'type_id'=>1,
    			'group_id'=>1)
    ));
  }
}
