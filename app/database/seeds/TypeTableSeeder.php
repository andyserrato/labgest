<?php

class TypeTableSeeder extends Seeder {
  public function run(){
    DB::table('types')->insert(array(
    	array('id'=>1, 'tipo'=>"admin"),
    	array('id'=>2, 'tipo'=>"responsable"),
    	array('id'=>3, 'tipo'=>"trabajador"),
    	array('id'=>4, 'tipo'=>"invitado")
    ));
  }
}
