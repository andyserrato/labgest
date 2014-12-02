<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('email',100)->unique();
			$table->string('password',128);
			$table->string('nombre');
			$table->integer('telefono')->unsigned();
			$table->integer('type_id')->unsigned();
			//$table->foreign('type_id')->references('id')->on('types');
			$table->integer('group_id')->unsigned();
			//$table->odbc_foreignkeys(connection_id, pk_qualifier, pk_owner, pk_table, fk_qualifier, fk_owner, fk_table)('group_id')->references('id')->on('groups');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
		