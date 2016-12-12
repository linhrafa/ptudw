<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use App\Mail\TeacherRegister;
use App\ResearchArea;
include_once 'admin.php';
include_once 'faculty/faculty.php';
include_once 'teacher/teacher.php';
include_once 'student/student.php';
Route::post('app/get_captcha',function(){
	return json_encode(Captcha::src());
});
Route::get('protected/active/{token}','auth\active_account@index');
Route::get('make_area_research',function(){
	$root = ResearchArea::create(['name'=>'area_researchs']);

	$child1 = $root->children()->create(['name'=>'General and reference']);
		$child1_1 = $child1->children()->create(['name'=>'Document types']);
			$child1_1->children()->create(['name'=>'Surveys and overviews']);
			$child1_1->children()->create(['name'=>'Reference works']);
			$child1_1->children()->create(['name'=>'General conference proceedings']);
			$child1_1->children()->create(['name'=>'Biographies']);
			$child1_1->children()->create(['name'=>'General literature']);
			$child1_1->children()->create(['name'=>'Computing standards, RFCs and guidelines']);
		$child1_2 = $child1->children()->create(['name'=>'Cross-computing tools and techniques']);
			$child1_2_1 = $child1_2->children()->create(['name'=>'Reliability']);
			$child1_2_2 = $child1_2->children()->create(['name'=>'Empirical studies']);
			$child1_2_2 = $child1_2->children()->create(['name'=>'Measurement']);
			$child1_2_2 = $child1_2->children()->create(['name'=>'Metrics']);
			
	$child2 = $root->children()->create(['name'=>'Hardware']);
		$child2_1 = $child2->children()->create(['name'=>'Printed circuit boards']);
			$child2_1_1 = $child2_1->children()->create(['name'=>'Electromagnetic interference and compatibility']);
			$child2_1_2 = $child2_1->children()->create(['name'=>'PCB design and layout']);
		$child2_2 = $child2->children()->create(['name'=>'Communication hardware, interfaces and storage']);
			$child2_2_1 = $child2_2->children()->create(['name'=>'Signal processing systems']);
			$child2_2_2 = $child2_2->children()->create(['name'=>'Sensors and actuators']);
			$child2_2_2 = $child2_2->children()->create(['name'=>'Buses and high-speed links']);
			$child2_2_2 = $child2_2->children()->create(['name'=>'Displays and imagers']);


	$child3 = $root->children()->create(['name'=>'Computer systems organization']);
		$child3_1 = $child3->children()->create(['name'=>'Architectures']);
			$child3_1_1 = $child3_1->children()->create(['name'=>'Serial architectures']);
			$child3_1_2 = $child3_1->children()->create(['name'=>'Parallel architectures']);
			$child3_1_2 = $child3_1->children()->create(['name'=>'Distributed architectures']);
		$child3_2 = $child3->children()->create(['name'=>'Embedded and cyber-physical systems']);
			$child3_2_1 = $child3_2->children()->create(['name'=>'Sensor networks']);
			$child3_2_2 = $child3_2->children()->create(['name'=>'Robotics']);
			$child3_2_2 = $child3_2->children()->create(['name'=>'Sensors and actuators']);
			

	$child4 = $root->children()->create(['name'=>'Networks']);
		$child4_1 = $child4->children()->create(['name'=>'Network architectures']);
			$child4_1_1 = $child4_1->children()->create(['name'=>'Network design principles']);
			$child4_1_2 = $child4_1->children()->create(['name'=>'Programming interfaces']);
		$child4_2 = $child4->children()->create(['name'=>'Network protocols']);
			$child4_2_1 = $child4_2->children()->create(['name'=>'Network protocol design']);
			$child4_2_2 = $child4_2->children()->create(['name'=>'Protocol correctness']);

});