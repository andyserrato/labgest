<?php

class GroupTableSeeder extends Seeder {
  public function run(){

  	$faker = Faker\Factory::create();
    $faker->addProvider(new CompanyNameGenerator\FakerProvider($faker));
    
    Group::truncate();

    DB::table('groups')->insert(array(
    	'nombre'	=>	"Prueba", 
    	'email'		=>	"prueba@prueba.com", 
    	'telefono'	=>	666777888)
    );

    foreach(range(1,30) as $index)
    {
        Group::create([  
            'nombre'	=>	$faker->companyName,
            'email'		=> 	$faker->email,
            'telefono'	=>	$faker->numberBetween($min = 600000000, $max = 999999999)
            ]);
    }
  }
}
