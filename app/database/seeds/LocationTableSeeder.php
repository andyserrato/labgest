<?php

class LocationTableSeeder extends Seeder {
  public function run(){
    DB::table('locations')->insert(array(
    	'nombre'=>"Prueba Location", 
    	'direccion'=>"Dirección de prueba",
    	'telefono'=>666777888,
    	'email'=>"pruebalocation@pruebalocation.com"
    	)
    );
  }
}
