<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function __construct() {
		$this->middleware('admin');
		$this->middleware('auth');
	}

	public function index() {
		$slider = Slider::orderBy('id', 'DESC')->get();
		return view('admin.Slider.list', compact('slider'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.Slider.create');
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
			'sub_title' => 'required',
			'image' => 'required',
		]);

		$slider = new Slider;
		$slider->title = $request->input('title');
		$slider->sub_title = $request->input('sub_title');
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = "images/Slider/$filename";
			Image::make($image)->save($location);
			$slider->image = $filename;
		}
		$slider->save();
		session()->flash('message', 'Slider Create Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/Slider');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$slider = Slider::find($id);
		return view('admin.Slider.show', compact('slider'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$sliders = Slider::find($id);
		return view('admin.Slider.edit', compact('sliders'));
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
			'sub_title' => 'required',
		]);

		$slider = Slider::find($id);
		$slider->title = $request->input('title');
		$slider->sub_title = $request->input('sub_title');
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$filename = time() . '.' . $image->getClientOriginalExtension();
			$location = "images/Slider/$filename";
			Image::make($image)->save($location);
			$slider->image = $filename;
		}
		$slider->save();
		session()->flash('message', 'Slider Update Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/Slider');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$slider = Slider::find($id);
		$slider->delete();
		session()->flash('message', 'Slider Delete Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/Slider');

	}
}
