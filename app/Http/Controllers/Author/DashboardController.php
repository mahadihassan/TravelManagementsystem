<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;

class DashboardController extends Controller {

	public function __construct() {
		$this->middleware('author');
	}

	public function index() {
		return view('admin.home');
	}
}
