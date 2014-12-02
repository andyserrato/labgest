<?php

class GroupTableSeeder extends Seeder {
  public function run(){
    DB::table('groups')->insert(array(
    	'id'=>1, 'nombre'=>"Prueba", 'email'=>"prueba@prueba.com", 
    	'telefono'=>666777888)
    );
  }
}
