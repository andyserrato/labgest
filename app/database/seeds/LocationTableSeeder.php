<?php

class LocationTableSeeder extends Seeder {
  public function run(){

    $faker = Faker\Factory::create();
    $faker->addProvider(new CompanyNameGenerator\FakerProvider($faker));
    $faker->addProvider(new Faker\Provider\en_US\Address($faker));
    Location::truncate();

    DB::table('locations')->insert(array(
    	'nombre'	=>	"Prueba Location", 
    	'direccion'	=>	"Dirección de prueba",
    	'telefono'	=>	666777888,
    	'email'		=>	"pruebalocation@pruebalocation.com"
    	));

    foreach(range(1,30) as $index)
    {
        Location::create([  
            'nombre'	=>	$faker->companyName,
            'direccion'	=>	$faker->address,
            'email'		=> 	$faker->email,
            'telefono'	=>	$faker->numberBetween($min = 600000000, $max = 999999999)
            ]);
    }
  }
}
