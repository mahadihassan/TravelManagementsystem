<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model {
	protected $fillable = [
		'title','category', 'location', 'ex_date', 'pp_cost', 'discount_id', 'discount', 'ppcost_discount','image', 'description',
	];
	protected $table = 'tour_packages';

	public function categorys() {
		return $this->belongsTo('App\Category', 'category');
	}

}
