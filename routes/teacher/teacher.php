<?php
	Route::group(['domain'=>'teacher.thesis.manager.dev'], function(){
        Route::get('/','teacher\TeacherAuthenController@redirect_login');
        Route::get('login','teacher\TeacherAuthenController@index')->name('teacher.login');
        Route::post('login','teacher\TeacherAuthenController@login');
        Route::get('protected/resetpassword/{token}','teacher\reset_password@index_reset');
        Route::post('protected/resetpassword/{token}','teacher\reset_password@reset_password');
        Route::get('dat-lai-mat-khau','teacher\reset_password@index');
        Route::post('dat-lai-mat-khau','teacher\reset_password@send_email');

        Route::group(['middleware'=>'teacher'], function(){
            Route::get('dashboard','teacher\HomeController@index')->name('teacher.dashboard');
            Route::get('logout','teacher\TeacherLogoutController@logout');

            Route::post('cap-nhap-thong-tin/cancel', 'teacher\HomeController@index');
            
            include 'teacher_duong.php';
            include 'teacher_hai.php';
            include 'teacher_hung.php';
        });
	});
?>