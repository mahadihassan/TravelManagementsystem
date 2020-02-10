<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('bookings', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('user_id');
			$table->string('package_id');
			$table->float('pp_cost');
			$table->integer('member');
			$table->float('total_cost');
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
		Schema::dropIfExists('bookings');
	}
}
