<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;


class subjectController extends Controller
{
    public function index(){
        $subjects = Subject::latest()->paginate(5);
        //$subjects = Subject::get();
        return view('subjects.view_subject')->with(compact('subjects'));
    }

    public function addSubject(Request $request){

        if($request->isMethod('post')){
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;

            $subject=new Subject();
            $subject->name=$data['name'];
            $subject->save();
            return redirect('/subjects')->with('success','Subject Added Successfully!');
        }

        return view('subjects.add_subject');

    }

    public function editSubject(Request $request,$id=null){
        if($request->isMethod('post')){
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;
            Subject::where(['id'=>$id])->update(['name'=>$data['name']]);
            return redirect('/subjects')->with('success','Subject Updated Successfully!');

        }
        $subjects = Subject::where(['id'=>$id])->first();
        return view('subjects.edit_subject')->with(compact('subjects'));
    }

    public function deleteSubject($id = null){
        if(!empty($id)){
            Subject::where(['id'=>$id])->delete();
            return redirect('/subjects')->with('success','Subject Deteled Successfully!');
        }

    }
}
