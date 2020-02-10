<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourPackagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tour_packages', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('title');
			$table->integer('category');
			$table->string('location');
			$table->date('ex_date');
			$table->float('pp_cost');
			$table->integer('discount_id');
			$table->float('discount');
			$table->float('ppcost_discount');
			$table->string('image');
			$table->text('description');
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
		Schema::dropIfExists('tour_packages');
	}
}
