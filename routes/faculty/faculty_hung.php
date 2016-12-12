<?php
	//Route mở đăng ký bảo vệ
	//hiện 1 form nhập thông tin cần thông báo. sau đó gửi qua email cho từng sinh viên
    Route::get('dot-dang-ky-de-tai','faculty\open_thesis@index');
    Route::post('faculty\open_thesis','faculty\open_thesis@send_messenger');

    //Hiện ra view 1 danh sách các sinh viên
    //có 1 select với n lựa chọn để lọc sinh viên theo từng select
    //1: tất cả
    //2: sinh viên đủ dkien làm đề tài
    //3: vân vân tự nghĩ đi :v
    Route::get('quan-ly-sinh-vien','faculty\student_manager@index');
    //id là id của sinh viên được đánh dấu xác nhận đã gửi hồ sơ giấy
    Route::post('faculty\student_manager\accept_thesis\{id}','faculty\student_manager@accept_thesis');

    //id là id của sinh viên được đánh dấu xác nhận là hồ sơ đã gửi khớp với thông tin trong hệ thống
    Route::post('faculty\student_manager\match_thesis\{id}','faculty\student_manager@match_thesis');
    // xuất ra excel
    Route::post('faculty\student_manager\export_excel','faculty\student_manager@export_excel');
?>