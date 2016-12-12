<?php
	Route::group(['domain'=>'faculty.thesis.manager.dev'], function(){
		Route::get('/','faculty\FacultyAuthenController@redirect_login');
		Route::get('login','faculty\FacultyAuthenController@index')->name('faculty.login');
		Route::post('login','faculty\FacultyAuthenController@login');
		Route::get('protected/resetpassword/{token}','faculty\reset_password@index_reset');
		Route::post('protected/resetpassword/{token}','faculty\reset_password@reset_password');
		Route::get('dat-lai-mat-khau','faculty\reset_password@index');
		Route::post('dat-lai-mat-khau','faculty\reset_password@send_email');
		
		Route::group(['middleware'=>'faculty'], function(){
			Route::get('dashboard','faculty\HomeController@index')->name('faculty.dashboard');
			Route::get('logout','faculty\FacultyLogoutController@logout');
			Route::get('them-giang-vien','faculty\new_teacher@index');
			Route::post('them-giang-vien','faculty\new_teacher@redirect_controller');
			Route::post('ajax/them-giang-vien','faculty\new_teacher@ajax_new_teacher');
			Route::get('trang-ca-nhan','faculty\Profile@index');
			Route::post('update_profile','faculty\Profile@update_profile');
            Route::get('them-sinh-vien','faculty\new_student@index');
            Route::post('them-sinh-vien','faculty\new_student@redirect_controller');
            Route::post('ajax/them-sinh-vien','faculty\new_student@ajax_new_student');
            include 'faculty_duong.php';
            include 'faculty_hung.php';
            include 'faculty_hai.php';
            include 'faculty_linh.php';
		});
	});
?>