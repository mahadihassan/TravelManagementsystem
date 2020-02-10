<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller {
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
		$social = Social::all();
		return view('admin.Social.list', compact('social'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.Social.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$socials = Social::find($id);
		return view('admin.Social.edit', compact('socials'));
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
			'facebook' => 'required',
			'twitter' => 'required',
			'instagram' => 'required',
			'linkedin' => 'required',
		]);
		$social = Social::find($id);
		$social->fb = $request->input('facebook');
		$social->twitter = $request->input('twitter');
		$social->instagram = $request->input('instagram');
		$social->linkedin = $request->input('linkedin');
		$social->save();
		session()->flash('message', 'Social Media Update Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/Social');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
