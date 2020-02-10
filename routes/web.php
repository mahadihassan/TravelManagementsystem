<?php

Auth::routes();

//Frontend Route File.
Route::get('', 'ViewController@view');
Route::get('/about', 'ViewController@about')->name('about');
Route::get('/blog', 'ViewController@blog')->name('blog');
Route::get('/contact', 'ViewController@contact')->name('contact');
Route::get('/TourPackage', 'ViewController@TourPackage')->name('TourPackage');
Route::get('/Division/package/{id}', 'ViewController@category')->name('category');
Route::get('/package/details/{id}', 'ViewController@Details')->name('package-details');

//User DashboardController 
Route::get('/user/Booking-list/', 'UserDashboardController@index')->name('user/Booking-list');
Route::get('/user/Booking-edit/{id}', 'UserDashboardController@Edit')->name('user/Booking-edit');
Route::put('/user/Booking-update/{id}', 'UserDashboardController@update')->name('user/Booking-update');
Route::post('/booking-store', 'UserDashboardController@store')->name('booking-store');
Route::post('/contact-store/', 'UserDashboardController@contact_store')->name('contact-store');
Route::get('/package/booking/{id}', 'UserDashboardController@Booking_package')->name('package-booking');

//Backend Admin Route File.
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	//User Table Route File
	Route::get('/user', 'DashboardController@User')->name('user');
	Route::get('/user-edit/{id}', 'DashboardController@Edit')->name('user-edit');
	Route::put('/user-store/{id}', 'DashboardController@update')->name('user-store');
	Route::delete('/user-delete/{id}', 'DashboardController@delete')->name('user-delete');
	Route::get('/user-role', 'DashboardController@UserRole')->name('user-role');
	Route::get('/contact/message', 'DashboardController@Contact')->name('contact-message');
	Route::delete('/contact/delete/{id}', 'DashboardController@Contactdestroy')->name('contact-delete');

	Route::resource('TourPackageClass', 'TourPackageController');
	Route::resource('Booking', 'BookingController');
	Route::resource('Slider', 'SliderController');
	Route::resource('Social', 'SocialController');
	Route::resource('Category', 'CategoryController');
});

//Backend Author Route File.
Route::group(['as' => 'author.', 'prefix' => 'author', 'namespace' => 'Author'], function () {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::get('send-mail', 'MailSendController@mailsend');
