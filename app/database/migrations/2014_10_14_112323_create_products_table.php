<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('cas',20);
			$table->string('iupac',100)->nullable();
			$table->string('ce',20)->nullable();
			$table->integer('unit_id')->unsigned();
			//$table->foreign('unit_id')->references('id')->on('units');
			$table->integer('location_id')->unsigned();
			//$table->foreign('location_id')->references('id')->on('locations');
			$table->integer('cantidad');
			$table->string('responsable')->nullable();
			$table->integer('user_id')->unsigned();
			//$table->foreign('user_id')->references('id')->on('users');
			$table->string('notas')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
