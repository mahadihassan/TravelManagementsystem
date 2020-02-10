<?php

namespace App\Http\Controllers;
use App\Booking;
use App\Contact;
use App\TourPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use \App\Mail\SendMail;

//
class UserDashboardController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$user = Auth::user();
		$booking = Booking::where('user_id', $user->id)->orderBy('id', 'DESC')->get();
		return view('authors.Booking.list', compact('booking'));
	}

	public function Booking_package($id)
	{
		$user = Auth::user();
		$bookings = Booking::where('user_id', $user->id)->where('package_id', $id)->first();
		if($bookings)
			return view('authors.Booking.edit', compact('bookings'));
		else
			$packageBooking = TourPackage::find($id);
			return view('Frontend.booking_package', compact('packageBooking'));
	}

	public function store(Request $request) {
		$validatedData = $request->validate([
        		'member' => 'required',
    		]);
		$user = Auth::user();
		$details = [
			'title' => 'Your Booking Submit Successfully.',
			'body' => 'Thank you for Booking submit and You will shortly receive a reply to your request with all the requested details.',
		];
		\Mail::to($user->email)->send(new SendMail($details));
		$booking = new Booking;
		$booking->user_id = $request->input('user_id');
		$booking->package_id = $request->input('package_id');
		$booking->pp_cost = $request->input('cost');
		$booking->member = $request->input('member');
		$booking->total_cost = $request->member * $request->cost;
		$booking->save();
		session()->flash('message', 'Booking Successfully! And Wait For The Confirmation Mail.');
		session()->flash('type', 'success');
		return redirect('TourPackage');

	}
	
	public function Edit($id) {
		$bookings = Booking::find($id);
		if ($bookings->status == 1) {
			return redirect('user/Booking-list');
		} else {
			return view('authors.Booking.edit', compact('bookings'));
		}
	}
	
	public function update(Request $request, $id) {
		$validatedData = $request->validate([
			'member' => 'required',
			'cost' => 'required',
		]);
		$booking = Booking::find($id);
		$booking->pp_cost = $request->input('cost');
		$booking->member = $request->input('member');
		$booking->total_cost = $request->member * $request->cost;
		$booking->save();
		session()->flash('message', 'User Booking List Update Successfully.');
		session()->flash('type', 'success');
		return redirect('user/Booking-list');
	}

	public function contact_store(Request $request) {
		$validatedData = $request->validate([
			'fname' => 'required',
			'lname' => 'required',
			'email' => 'required',
			'subject' => 'required',
		]);
		$contact = new Contact;
		$contact->first_name = $request->input('fname');
		$contact->last_name = $request->input('lname');
		$contact->email = $request->input('email');
		$contact->subject = $request->input('subject');
		$contact->message = $request->input('message');
		$contact->save();
		session()->flash('message', 'Your Contact Message Submit Successfully!');
		session()->flash('type', 'success');
		return back();

	}

}
