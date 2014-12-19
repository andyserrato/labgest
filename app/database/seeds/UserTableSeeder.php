<?php

class UserTableSeeder extends Seeder {
  public function run(){

    $faker = Faker\Factory::create();

    User::truncate();

    DB::table('users')->insert(array(
        array(  'id'        =>  1, 
                'email'     =>  "pruebausuario@prueba.com",
                'password'  =>  Hash::make('prueba'), 
                'nombre'    =>  "pruebausuario",
                'telefono'  =>  666777888,
                'type_id'   =>  1,
                'group_id'  =>  1),
        array(  'id'        =>  2, 
                'email'     =>  "admin@admin.com",
                'password'  =>  Hash::make('admin'), 
                'nombre'    =>  "admin",
                'telefono'  =>  666777888,
                'type_id'   =>  1,
                'group_id'  =>  1)
    ));

    $types = Type::all();
    $types = $types->lists('id');
    $groups = Group::all();
    $groups = $groups->lists('id');
    
    foreach(range(1,30) as $index)
    {
        User::create([  
            'email'     =>  $faker->email,
            'password'  =>  Hash::make('12345'), 
            'nombre'    =>  $faker->name,
            'telefono'  =>  $faker->numberBetween($min = 600000000, $max = 999999999),
            'type_id'   =>  $faker->randomElement($types),
            'group_id'  =>  $faker->randomElement($groups)]);
    }
  }
}
