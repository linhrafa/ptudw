<?php
	Route::post('faculty/new_teacher_form','faculty\new_teacher@new_teacher_form');
	Route::post('faculty/new_student_form','faculty\new_student@new_student_form');
	Route::get('doi-mat-khau','faculty\ChangePassword@index');
?>