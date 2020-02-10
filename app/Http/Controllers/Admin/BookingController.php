<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use \App\Mail\SendMail;

class BookingController extends Controller {

	public function __construct() {
		$this->middleware('auth');
		$this->middleware('admin');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$booking = Booking::orderBy('id', 'DESC')->paginate(7);
		/*
		$booking = DB::table('bookings')->join('users', 'users.id', '=', 'bookings.user_id')
			->join('tour_packages', 'tour_packages.id', '=', 'bookings.package_id')
			->select('bookings.id', 'users.name', 'tour_packages.title', 'bookings.package_id', 'bookings.pp_cost', 'bookings.member', 'bookings.total_cost', 'bookings.status')
			->orderBy('id', 'DESC')
			->paginate(7);
			*/
		return view('admin.Booking.list', compact('booking'));
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
		$booking = Booking::find($id);
		if ($booking->status == 2) {
			return redirect('admin/Booking');
		} else {
			return view('admin.Booking.edit', compact('booking'));
		}

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
			'status' => 'required',
		]);
		$booking = Booking::find($id);
		$data = User::where('id', $booking->user_id)->first();
		$booking->status = $request->input('status');
		if ($request->status == 1) {
			$details = [
				'title' => 'Your Booking Accept ',
				'body' => 'Plase Check It.',
			];
			\Mail::to($data->email)->send(new SendMail($details));
		}
		$booking->save();
		session()->flash('message', 'Booking Update Successfully!');
		session()->flash('type', 'success');
		return redirect('admin/Booking');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$booking = Booking::find($id);
		if ($booking->status == 2) {
			return redirect('admin/Booking');
		} else {
			$booking->delete();
			session()->flash('message', 'Booking Delete Successfully!');
			session()->flash('type', 'warning');
			return redirect('admin/Booking');
		}

	}
}
