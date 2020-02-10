<?php

namespace App\Http\Controllers\Admin;

use App\Discount;
use App\Category;
use App\Http\Controllers\Controller;
use App\TourPackage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class TourPackageController extends Controller {
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('admin');
	}
	public function index() {
		$TourPackage = TourPackage::orderBy('id', 'DESC')->paginate(3);
		return view('admin.TourPackage.list', compact('TourPackage'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$category = Category::all();
		$discount = Discount::all();
		return view('admin.TourPackage.create', compact('discount', 'category'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validatedData = $request->validate([
			'title' => 'required|max:255',
			'category' => 'required',
			'location' => 'required',
			'date' => 'required',
			'cost' => 'required',
			'description' => 'required',
			'discount_id' => 'required',
			'discount' => 'required',
			'image' => 'required',
		]);
		$user = Auth::user();
		$TourPackage = new TourPackage;
		$TourPackage->title = $request->input('title');
		$TourPackage->category = $request->input('category');
		$TourPackage->location = $request->input('location');
		$TourPackage->ex_date = $request->input('date');
		$TourPackage->pp_cost = $request->input('cost');
		$TourPackage->discount_id = $request->input('discount_id');
		$TourPackage->discount = $request->input('discount');
		$TourPackage->description = $request->input('description');
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = "images/TourImage/$filename";
			Image::make($image)->save($location);
			$TourPackage->image = $filename;
		}
		if ($request->discount_id == 1) {
			$TourPackage->ppcost_discount = $request->cost - $request->discount;
		} elseif ($request->discount_id == 2) {
			$TourPackage->ppcost_discount = $request->cost - ($request->cost / $request->discount);
		} else {
			$TourPackage->ppcost_discount = $request->discount;
		}
		$TourPackage->created_by = $user->id;
		$TourPackage->save();
		session()->flash('message', 'Package Tour Create Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/TourPackageClass');
	}
	/*

		 * Display the specified resource.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
	*/
	public function show($id) {
		$TourPackage = TourPackage::find($id);
		return view('admin.TourPackage.show', compact('TourPackage'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$category = Category::all();
		$discount = Discount::all();
		$TourPackage = TourPackage::find($id);
		return view('admin.TourPackage.edit', compact('TourPackage', 'discount', 'category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validatedData = $request->validate([
			'title' => 'required|max:255',
			'category' => 'required',
			'location' => 'required',
			'date' => 'required',
			'cost' => 'required',
			'discount_id'=> 'required',
			'discount'=> 'required',
		]);
		$user = Auth::user();
		$tp = TourPackage::find($id);
		$tp->title = $request->input('title');
		$tp->category_id = $request->input('category');
		$tp->location = $request->input('location');
		$tp->ex_date = $request->input('date');
		$tp->pp_cost = $request->input('cost');
		$tp->discount_id = $request->input('discount_id');
		$tp->discount = $request->input('discount');
		$tp->description = $request->input('description');
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = "images/TourImage/$filename";
			Image::make($image)->save($location);
			$tp->image = $filename;
		}
		if ($request->discount_id == 1) {
			$tp->ppcost_discount = $request->cost - $request->discount;
		} elseif ($request->discount_id == 2) {
			$tp->ppcost_discount = $request->cost - ($request->cost / $request->discount);
		} else {
			$tp->ppcost_discount = $request->discount;
		}
		$tp->update_by = $user->id;
		$tp->save();
		session()->flash('message', 'Package Tour Update Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/TourPackageClass');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$TourPackage = TourPackage::find($id);
		$TourPackage->delete();
		session()->flash('message', 'Package Tour Delete Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/TourPackageClass');
	}
}
