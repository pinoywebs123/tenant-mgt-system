<?php



Route::get('/', function () {
	//return view('welcome');
    return redirect()->route('login');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/loginCheck','AuthController@loginCheck')->name('loginCheck');

Route::group(['prefix'=> 'admin', 'namespace'=> 'Admin'], function(){

	Route::get('/home', [
		'as'=> 'admin_home',
		'uses'=> 'AdminController@home'
	]);

	Route::get('/home-bedspacer', [
		'as'=> 'admin_home_bedspacer',
		'uses'=> 'AdminController@admin_home_bedspacer'
	]);

	Route::get('/logout', [
		'as'=> 'admin_logout',
		'uses'=> 'AdminController@admin_logout'
	]);

	Route::get('/rooms', [
		'as'=> 'admin_rooms',
		'uses'=> 'RoomController@admin_rooms'
	]);
		Route::post('rooms', [
			'as'=> 'admin_rooms_check',
			'uses'=> 'RoomController@admin_rooms_check'
		]);

		Route::post('/getRoom', [
			'as'=> 'admin_get_room',
			'uses'=> 'RoomController@admin_get_room'
		]);
		Route::post('/room_update', [
			'as'=> 'admin_room_update',
			'uses'=> 'RoomController@admin_room_update'
		]);

	Route::get('/rooms-bedspacer', [
		'as'=> 'admin_rooms_bedspacer',
		'uses'=> 'BedspacerController@admin_rooms_bedspacer'
	]);
		Route::post('rooms-bedspacer', [
			'as'=> 'admin_rooms_bedspacer_check',
			'uses'=> 'BedspacerController@admin_rooms_bedspacer_check'
		]);

		Route::post('/getBedspace', [
			'as'=> 'admin_get_bedspace',
			'uses'=> 'BedspacerController@admin_get_bedspace'
		]);
		Route::post('/room-bedspacer_update', [
			'as'=> 'admin_bedspace_update',
			'uses'=> 'BedspacerController@admin_bedspace_update'
		]);

	

	Route::get('/room-rent/{id}', [
		'as'=> 'room_rent',
		'uses'=> 'RoomRentController@room_rent'
	]);
		Route::post('/room-rent/{id}', [
			'as'=> 'room_rent_check',
			'uses'=> 'RoomRentController@room_rent_check'
		]);

		Route::get('/room-view/{id}', [
			'as'=> 'room_view',
			'uses'=> 'RoomRentController@room_view'
		]);	

		Route::get('/room-finished/{id}', [
			'as'=> 'room_finished',
			'uses'=> 'RoomRentController@room_finished'
		]);	

	Route::get('/bed-spacer-rent/{id}', [
		'as'=> 'bedspacer_rent',
		'uses'=> 'BedSpacerRentContrller@bedspacer_rent'
	]);		
		Route::post('/bed-spacer-rent-check/{id}', [
		'as'=> 'bedspacer_rent_check',
		'uses'=> 'BedSpacerRentContrller@bedspacer_rent_check'
		]);	

		Route::get('/bed-spacer-view/{id}', [
		'as'=> 'bedspacer_view',
		'uses'=> 'BedSpacerRentContrller@bedspacer_view'
		]);	

		Route::get('/bed-spacer-finished/{id}', [
		'as'=> 'bedspacer_finished',
		'uses'=> 'BedSpacerRentContrller@bedspacer_finished'
		]);	

	Route::get('/room-reports', [
		'as'=> 'admin_reports',
		'uses'=> 'ReportController@admin_reports'
	]);

	Route::get('/bedspace-reports', [
		'as'=> 'admin_reports_bedspace',
		'uses'=> 'ReportController@admin_reports_bedspace'
	]);			

});
