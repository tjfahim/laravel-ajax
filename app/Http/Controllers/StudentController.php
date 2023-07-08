<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }
    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $student = new Student();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->save();

            return response()->json([
                'status' => 200,
                'message' => 'Added student',
            ]);
        }
    }
}
