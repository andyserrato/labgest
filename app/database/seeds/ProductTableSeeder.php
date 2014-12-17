<?php

class ProductTableSeeder extends Seeder {
  public function run(){
    /*DB::table('products')->insert(array(
    	'id'=>1, 'cas'=>"cas de prueba", 
    	'iupac'=>"iupac de prueba",'ce'=>"ce de prueba", 
    	'unit_id'=>1, 'location_id'=>1, 'cantidad'=>100, 
    	'responsable'=>"yo", 'user_id'=>1, 'notas'=>"vacías")
    );*/
	$faker = Faker\Factory::create();

	Product::truncate();
    $locations = Location::all();
    $locations = array($locations->lists('id'));
    $units = Unit::all();
    $units = array($units->lists('id'));
    $users = User::all();
    $users = array($users->lists('id'));
        
	foreach(range(1,50) as $index)
	{
		Product::create([
			'cas'=>$faker->text(20), 
    		'iupac'=> $faker->text(30),
    		'ce'=>$faker->numberBetween(0,1000), 
    		'unit_id'=> 1, 
    		'location_id'=>1, 
    		'cantidad'=> $faker->numberBetween(0,1000), 
    		'responsable'=> $faker->name, 
    		'user_id'=>1, 
    		'notas'=> $faker->text(400) ]);
	}
  }
}
