<?php
	Route::group(['domain'=>'thesis.manager.dev'], function(){
        Route::get('/','student\StudentAuthenController@redirect_login');
        Route::get('login','student\StudentAuthenController@index')->name('student.login');
        Route::post('login','student\StudentAuthenController@login');
        Route::get('protected/resetpassword/{token}','student\reset_password@index_reset');
        Route::post('protected/resetpassword/{token}','student\reset_password@reset_password');
        Route::get('dat-lai-mat-khau','student\reset_password@index');
        Route::post('dat-lai-mat-khau','student\reset_password@send_email');
        Route::group(['middleware'=>'student'], function() {
            Route::get('dashboard', 'student\HomeController@index')->name('student.dashboard');
            Route::get('logout', 'student\StudentLogoutController@logout');
            include 'student_duong.php';
            include 'student_hai.php';
            include 'student_hung.php';
        });
	});
?>