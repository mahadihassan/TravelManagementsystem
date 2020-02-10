<?php

namespace App\Http\Controllers;
use App\Slider;
use App\TourPackage;
use App\Booking;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller {

	public function view() {
		$slider = Slider::orderBy('id', 'DESC')->get();
		$TourPackage = TourPackage::where('ex_date', '<=', date('Y-m-d'))->paginate(3);
		return view('Frontend.home', compact('TourPackage', 'slider'));
	}

	public function about()
	{
		return view('Frontend.about');
	}

	public function blog()
	{
		return view('Frontend.blog');
	}

	public function contact() {
		return view('Frontend.contact');
	}

	public function TourPackage() {
		$TourPackages = TourPackage::paginate(6);
		return view('Frontend.tourpackage', compact('TourPackages'));
	}

	public function Details($id) {
		$details = TourPackage::find($id);
		return view('Frontend.package_details', compact('details'));
	}
	public function category($id)
	{
		$tour_category = TourPackage::where('category', $id)->get();
		return view('Frontend.category_package', compact('tour_category'));
	}

}
