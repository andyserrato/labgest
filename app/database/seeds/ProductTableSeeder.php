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
    $locations = $locations->lists('id');
    $units = Unit::all();
    $units = $units->lists('id');
    $users = User::all();
    $users = $users->lists('id');
        
	foreach(range(1,50) as $index)
	{
		Product::create([
			'cas'=>$faker->text(20), 
    		'iupac'=> $faker->text(30),
    		'ce'=>$faker->numberBetween(0,1000), 
    		'unit_id'=> $faker->randomElement($units), 
    		'location_id'=> $faker->randomElement($locations), 
    		'cantidad'=> $faker->numberBetween(0,1000), 
    		'responsable'=> $faker->name, 
    		'user_id'=> $faker->randomElement($users), 
    		'notas'=> $faker->text(400) ]);
	}
  }
}
