<?php

namespace App\Http\Controllers\faculty;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Faculty;
use Validator;
class Profile extends Controller
{
    public function index()
    {
    	return view('faculty.profile')->with(['user'=>Auth::guard('faculties')->user()]);
    }

    public function update_profile(Request $request)
    {
    	$errors = [];
        $rules = [
            'description' => 'string|max:45',

        ];
        $messages = [
            'description.string' => 'Chỉ được chứa chữ, số, dấu -, dấu _ !',
            'description.max' => 'Chỉ được chứa 45 kí tự !',
        ];
        
        $validator = Validator::make([
                'description' => $request->description,
            ],$rules,$messages);

        if($validator->fails()){
        	$errors[] = $validator->errors()->first('description');
        	$return = ['errors' => $errors];
        	return json_encode($return);
        }
        else {
        	if(Faculty::where('id', Auth::guard('faculties')->user()->id)->update(['description'=>$request->description])){
        		$return = [];
        		return json_encode($return);
        	}
        }
    }
}
