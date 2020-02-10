<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('socials', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('fb')->unique();
			$table->string('twitter')->unique();
			$table->string('instagram')->unique();
			$table->string('linkedin')->unique();
			$table->string('created_by')->nullable();
			$table->string('updated_by')->nullable();
			$table->integer('status')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('socials');
	}
}
