<?php
	Route::get('cap-nhat-sinh-vien','faculty\update_accept_student@index');
    // Route post dùng ajax xử lý nhé
    // đối với tab excel
    Route::post('update_accept_student/excel','faculty\update_accept_student@excel');
    // đối với tab form
    Route::post('update_accept_student/form','faculty\update_accept_student@form');

    //Route mở đăng ký đề tài
    Route::get('dot-dang-ky-de-tai','faculty\open_subject_thesis@index');
    Route::post('faculty\open_subject_thesis\new','faculty\open_subject_thesis@new');
    Route::post('faculty\open_subject_thesis\open\{id}','faculty\open_subject_thesis@open');
    Route::post('faculty\open_subject_thesis\close\{id}','faculty\open_subject_thesis@close');
    Route::post('faculty\open_subject_thesis\send_notice','faculty\open_subject_thesis@send_notice');
?>