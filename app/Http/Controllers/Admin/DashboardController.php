<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use App\User;

class DashboardController extends Controller {

	public function __construct() {
		$this->middleware('admin');
		$this->middleware('auth');
	}

	public function index() {
		return view('admin.home');
	}

	public function User() {
		$user=User::paginate(5);
		/*$user = DB::table('users')->join('roles', 'users.user_role', '=', 'roles.id')
			->select('users.*', 'roles.slug')
			->paginate(5);*/
		return view('admin.User.list', compact('user'));
	}

	public function edit($id) {
		$users = User::find($id);
		return view('admin.User.edit', compact('users'));
	}

	public function update(Request $request, $id) {
		$validateData = $request->validate([
			'name' => 'required',
			'email' => 'required',
			'nid' => 'required',
			'number' => 'required',
			'address' => 'required',
		]);
		$user = User::find($id);
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->nid = $request->input('nid');
		$user->number = $request->input('number');
		$user->address = $request->input('address');
		$user->save();
		session()->flash('message', 'User Update Successfully.');
		session()->flash('type', 'success');
		return redirect('/admin/user');
	}
	public function UserRole() {
		$role = Role::all();
		return view('admin.Role.list', compact('role'));
	}
	/*

		public function destroy($id) {
			$delete = Booking::where('id', $id)->first();
			$delete->delete();
			return back();

	*/

	public function delete($id) {
		$users = User::find($id);
		$users->delete();
		session()->flash('message', 'User Account Delete Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/user');
	}

//User Contact Method
	public function Contact() {
		$contact = Contact::orderBy('id', 'DESC')->paginate(5);
		return view('admin.UserContact.contact', compact('contact'));
	}

	public function Contactdestroy($id) {
		$contact = Contact::find($id);
		$contact->delete();
		session()->flash('message', 'Contact Message Delete Successfully.');
		session()->flash('type', 'success');
		return redirect('admin/contact/message');

	}
}
