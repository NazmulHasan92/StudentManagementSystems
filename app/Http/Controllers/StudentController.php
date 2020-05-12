<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function Student(){
    	return view('student.create');
    }

    public function Stores(Request $request)
    {
        $validatedData = $request->validate([
               'name' => 'required|max:20|min:5',
               'email' => 'required|unique:students',
               'phone' => 'required|unique:students|max:15|min:10',
               ]); 

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
       // return response()->json($student);
        $notification = array(
          		         'message'=>'Successfully Information Insert',
             	         'alert-type'=>'success'
                 	    );
    	             return Redirect()->back()->with($notification);

    }

    public function AllStudent(){
    	$student = Student::all();
    	return view('student.all_student', compact('student'));
    }

    public function Show($id)
    {
    	//DB::table('students')->where('id',$id)->first();
    	 $student = Student::findorfail($id);
    	 return view('student.viewstudent', compact('student'));
    }



    public function Edit($id)
    {
       $student = Student::findorfail($id);
       return view('student.editstudent', compact('student'));
    }

    public function Update(Request $request,$id)
    {
        $student = Student::findorfail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
       
        $notification = array(
          		         'message'=>'Successfully Updated',
             	         'alert-type'=>'info'
                 	    );
    	             return Redirect()->route('allstudent')->with($notification);


    }

    public function Destroy($id)
         {
    	      $student = Student::findorfail($id);
    	      $student->delete();
    	      //DB::table('students')->where('id',$id)->delete();
    	      $notification = array(
              		         'message'=>'Successfully Deleted',
             	         'alert-type'=>'success'
                 	    );
    	             return Redirect()->back()->with($notification);
         }
}
