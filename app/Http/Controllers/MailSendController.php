<?php

namespace App\Http\Controllers;
use Mail;
use \App\Mail\SendMail;

class MailSendController extends Controller {
	public function mailsend() {
		$details = [
			'title' => 'Title: Mail from Real Programmer',
			'body' => 'Body: This is for testing email using smtp',
		];

		\Mail::to('mahadi.web.86@gmail.com')->send(new SendMail($details));
		return view('Email.body');
	}
}
