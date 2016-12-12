<?php
	Route::group(['domain'=>'admin.thesis.manager.dev'], function(){
		Route::get('/','admin\AdminAuthenController@redirect_login');
		Route::get('login','admin\AdminAuthenController@index')->name('admin.login');
		Route::post('login','admin\AdminAuthenController@login');
		Route::get('protected/resetpassword/{token}','admin\reset_password@index_reset');
		Route::post('protected/resetpassword/{token}','admin\reset_password@reset_password');
		Route::get('dat-lai-mat-khau','admin\reset_password@index');
		Route::post('dat-lai-mat-khau','admin\reset_password@send_email');

		Route::group(['middleware'=>'admin'], function(){
			Route::get('dashboard','admin\HomeController@index')->name('admin.dashboard');
			Route::get('logout','admin\AdminLogoutController@logout');
			Route::get('them-khoa','admin\NewFaculty@index')->name('admin.new_faculty');
			Route::post('them-khoa','admin\NewFaculty@new_faculty');
		});
	});
?>