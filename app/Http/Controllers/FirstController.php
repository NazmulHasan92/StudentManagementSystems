<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FirstController extends Controller
{
    Public function About(){

    	return view('pages.about');
    }

    public function Blog(){
    	return view('pages.blog');
    }

    public function Contact(){
    	return view('pages.contact');
    }

   public function Add(){
    	return view('post.add_subject');
    }

    public function Store(Request $request)
    {     

    	    $validatedData = $request->validate([
               'name' => 'required|unique:subjects|max:25|min:4',
                'slug' => 'required|unique:subjects|max:25|min:4',
               ]); 

           $data = array();
           $data['name'] = $request->name;
           $data['slug'] = $request->slug;
           $subject = DB::table('subjects')->insert($data);
          //return response()->json($data);
          //
          if ($subject) {
          	$notification = array(
          		'message'=>'Successfully Subject Add',
             	'alert-type'=>'success'
          	);
          	return Redirect()->route('allsubjects')->with($notification);
          }else{
            $notification = array(
          		'message'=>'Something Went Worng!',
             	'alert-type'=>'error'
          	);
          	return Redirect()->back()->with($notification);
          }
    }

    public function All()
    {
        $subject = DB::table('subjects')->get();

        return view('post.all_subjects', compact('subject'));
    }

    public function View($id)
    {
    	$view = DB::table('subjects')->where('id',$id)->first();
    	return view('post.view')->with('sub',$view);
    }

    public function Delete($id)
    {
    	$delete = DB::table('subjects')->where('id',$id)->delete();
    	$notification = array(
          		'message'=>'Successfully Subject Deleted',
             	'alert-type'=>'success'
          	);
    	  return Redirect()->back()->with($notification);
    }

    public function Edit($id)
    {   
    	$subject = DB::table('subjects')->where('id',$id)->first();
    	return view('post.edit', compact('subject'));
    }

    public function Update(Request $request,$id)
    {
    	$validatedData = $request->validate([
               'name' => 'required|max:25|min:4',
               'slug' => 'required|max:25|min:4',
               ]); 

           $data = array();
           $data['name'] = $request->name;
           $data['slug'] = $request->slug;
           $subject = DB::table('subjects')->where('id',$id)->update($data);
          //return response()->json($data);
          //
          if ($subject) {
          	$notification = array(
          		'message'=>'Successfully Subject Updated',
             	'alert-type'=>'success'
          	);
          	return Redirect()->route('allsubjects')->with($notification);
          }else{
            $notification = array(
          		'message'=>'Nothind To Updated!',
             	'alert-type'=>'error'
          	);
          	return Redirect()->route('allsubjects')->with($notification);
          }
    }

}
