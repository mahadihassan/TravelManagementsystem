<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {

	protected $fillable = [
		'user_id', 'package_id', 'pp_cost', 'member', 'total_cost', 'user',
	];

	protected $table = 'bookings';

	public function user() {
		return $this->belongsTo('App\User');
	}
	public function package()
	{
		return $this->belongsTo('App\TourPackage');
	}

}
