<?php
	//Hiện 1 bảng các sinh viên.
    //phía trên có 1 select cho phép lọc những sinh viên
    //1: đang chờ giảng viên duyệt đề tài (có nút duyệt)
    //2: đã được giảng viên duyệt đề tài
    Route::get('quan-ly-sinh-vien','teacher\student_manager@index');
    //biến id là id của đề tài mà sinh viên gửi 
    Route::post('teacher\student_manager\accept\{id}','teacher\student_manager@accept');
?>