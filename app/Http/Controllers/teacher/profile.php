<?php

namespace App\Http\Controllers\teacher;

use App\Faculty;
use App\Teacher;
use App\Department;
use App\ResearchArea;
use App\ResearchAreaHasTeacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class profile extends Controller
{
	public function index()
	{
		//lấy ra giảng viên
        $id = (Auth::guard('teachers')->id());
        $teacher = Teacher::where('id', $id)->first();

        //lấy ra bộ môn, khoa của GV
        $deparment = Department::where('id', $teacher->department_id)->first();
        $faculty = Faculty::where('id', $deparment->faculty_id)->first();
        $list_department = Department::where('faculty_id',$faculty->id)->get()->toArray();

        if($faculty->teacher_jean_id == $id){
        	$teacher->chucvu = 'Trưởng khoa';
        }
        else if($teacher->associate_dean_faculty_id != null){
        	$teacher->chucvu = 'Phó khoa';
        }
        else {
        	$teacher->chucvu = 'Giảng Viên';
        }

        $list_research_area = $this->list_research_area();
        return view('teacher.profile')->with(['user'=>$teacher,'list_department'=>$list_department,'list_research_area'=>$list_research_area]);
	}

    // private function getOutput($node, &$output) 
    // {
    //     $output[$node->id] = ResearchArea::where('id',$node->id)->first();
    //     //them $node vào mảng
    //     if(!$node->isLeaf()){
    //         $children = $node->children()->get();
    //         foreach($children as $item){
    //             $this->getOutput($item, $output);
    //         }
    //     }
    // }

    // public function list_research_area()
    // {
    //     $final = array();
    //     $this->getOutput(ResearchArea::root(),$final);
    //     return $final;
    // }
    private function getOutput($node, &$output) 
    {
        $output[$node->id] = ResearchArea::where('id',$node->id)->first();
        //them $node vào mảng
        if(!$node->isLeaf()){
            $children = $node->children()->get();
            foreach($children as $item){
                $this->getOutput($item, $output);
            }
        }
    }

    public function list_research_area()
    {
        $final = array();
        $this->getOutput(ResearchArea::root(),$final);
        return $final;
    }
}
