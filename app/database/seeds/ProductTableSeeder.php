<?php

class ProductTableSeeder extends Seeder {
  public function run(){
    DB::table('products')->insert(array(
    	'id'=>1, 'cas'=>"cas de prueba", 
    	'iupac'=>"iupac de prueba",'ce'=>"ce de prueba", 
    	'unit_id'=>1, 'location_id'=>1, 'cantidad'=>100, 
    	'responsable'=>"yo", 'user_id'=>1, 'notas'=>"vacías")
    );
  }
}
