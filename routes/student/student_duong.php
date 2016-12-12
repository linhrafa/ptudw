<?php
	Route::get('thong-tin-de-tai','student\thesis_manager@index');
	/*
	Sinh viên chỉ được update dữ liệu đề tài (teacher, thesis_description)
	chỉ khi đề tài bị từ chối.
	*/
	Route::post('student\thesis_manager\update','student\thesis_manager@update');
?>