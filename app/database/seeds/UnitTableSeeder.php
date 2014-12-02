<?php

class UnitTableSeeder extends Seeder {
  public function run(){
    DB::table('units')->insert(array(
    	array('id'=>1, 'unidad'=>"Litro"),
    	array('id'=>2, 'unidad'=>"Decilitro"),
    	array('id'=>3, 'unidad'=>"Centilitro"),
    	array('id'=>4, 'unidad'=>"mililitro")
    ));
  }
}
