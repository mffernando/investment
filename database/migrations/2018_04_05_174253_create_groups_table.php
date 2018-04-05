<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateGroupsTable.
 */
class CreateGroupsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups', function(Blueprint $table) {
            $table->increments('id');
						$table->string('name');
						$table->unsignedInteger('user_id');
						$table->unsignedInteger('institution_id');

            $table->timestamps();
						$table->softDeletes();

						//Foreign key
						$table->foreign('user_id')->references('id')->on('users');
						$table->foreign('institution_id')->references('id')->on('institutions');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('groups');
	}
}
