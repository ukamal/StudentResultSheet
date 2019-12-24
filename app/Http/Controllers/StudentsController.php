<?php

namespace App\Http\Controllers;

use App\Result;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class studentsController extends Controller
{
    public function index(){
        $students = Student::paginate(5);

        return view('students.index')->with(compact('students'));
    }
    public function create(Request $request){

        if($request->isMethod('post')){
            $validation = Validator::make($request->all(), [
               'roll' =>  Rule::unique('students')->where(function ($student) use ($request) {
                   return $student->where('class', $request->class)
                        ->where('roll', $request->roll);
               })
            ]);

           if ($validation->fails()) {
               return back()->with('error', 'Student already enrolled on this class');
           }

            $data= $request->all();
            //echo "<pre>"; print_r($data); die;

            $student=new Student();
            $student->name=$data['name'];
            $student->class=$data['class'];
            $student->roll=$data['roll'];
            $student->save();

            return redirect('/students')->with('success','Student Added Successfully!');
        }

        return view('students.addStudents');

    }

    public function editStudent(Request $request,$id=null){
        if($request->isMethod('post')){
            $validation = Validator::make($request->all(), [
                'roll' =>  Rule::unique('students')->where(function ($student) use ($request) {
                    return $student->where('class', $request->class)
                        ->where('roll', $request->roll);
                })
            ]);

            if ($validation->fails()) {
                return back()->with('error', 'Student already enrolled on this class');
            }
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;
            Student::where(['id'=>$id])->update(['name'=>$data['name'],'class'=>$data['class'],'roll'=>$data['roll']]);
            return redirect('/students')->with('success','Student Updated Successfully!');

        }
        $students=Student::where(['id'=>$id])->first();
        return view('students.edit')->with(compact('students'));
    }

    public function deleteStudent(int $id){
        $student = Student::find($id);

        $student->results()->delete();

        $student->delete();

        return redirect('/students')->with('success','Student Deteled Successfully!');


    }

    ///Result
    public function addResult(int $studentId, Request $request){
        $subjects = Subject::all();
        $student = Student::find($studentId);

        if($request->isMethod('post')){
            $data=$request->all();

            $result = new Result();
            $result->student_id = $studentId;
            $result->subject_id = $data['subject_id'];
            $result->marks = $data['marks'];
            $result->save();

            return redirect('/students')->with('success','Result Added Successfully!');
        }

        return view('result.add_result', compact('subjects', 'student'));
    }

    public function viewResult(int $studnetId){

        $student = Student::where('id', $studnetId)
                    ->with('results.subject')
                    ->first();

        return view('result.view_result', compact('student'));
    }

}
