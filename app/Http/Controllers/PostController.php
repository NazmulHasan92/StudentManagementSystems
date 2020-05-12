<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
     public function Write(){
     	$subject = DB::table('subjects')->get();
    	return view('post.writepost',compact('subject'));
    }

    public function Stores(Request $request){

    	 $validatedData = $request->validate([
               'title' => 'required|max:120|',
                'details' => 'required',
                'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
               ]);

         $data = array();
         $data['title'] = $request->title;
         $data['subject_id'] = $request->subject_id;
         $data['details'] = $request->details;
         $image = $request->file('image');

         if ($image) {
         	     $image_name = hexdec(uniqid());
         	     $ext = strtolower($image->getClientOriginalExtension());
         	     $image_full_name = $image_name.'.'.$ext;
         	     $upload_path = 'public/frontend/image/';
         	     $image_url = $upload_path.$image_full_name;
         	     $success = $image->move($upload_path,$image_full_name);
         	     $data['image']=$image_url;
         	     DB::table('posts')->insert($data);
         	     $notification = array(
          		         'message'=>'Successfully Post Insert',
             	         'alert-type'=>'success'
                 	    );
    	             return Redirect()->back()->with($notification); 	
                }else{
                	DB::table('posts')->insert($data);
                	$notification = array(
          		         'message'=>'Successfully Post Insert',
             	         'alert-type'=>'success'
                 	    );
    	             return Redirect()->back()->with($notification);
                }       
    }

      public function AllPost(){

          //$post = DB::table('posts')->get();
          
      	  $post = DB::table('posts')
      	         ->join('subjects','posts.subject_id','subjects.id')
      	         ->select('posts.*', 'subjects.name')
      	         ->get();
      	        return view('post.allpost', compact('post'));
      } 

      public function ViewPost($id){

      	$post = DB::table('posts')
      	         ->join('subjects','posts.subject_id','subjects.id')
      	         ->select('posts.*', 'subjects.name')
      	         ->where('posts.id' ,$id)
      	         ->first();
      	         return view('post.viewpost', compact('post'));
          }

       public function DeletePost($id){
        $post = DB::table('posts')->where('id',$id)->first();
        $image = $post->image;
        $deleted = DB::table('posts')->where('id',$id)->delete();
            if($deleted){
            	unlink($image);
                $notification = array(
          		         'message'=>'Successfully Post Delete !',
             	         'alert-type'=>'success'
                 	    );
    	             return Redirect()->back()->with($notification);
            }else{
               $notification = array(
          		         'message'=>'Something Went Worng',
             	         'alert-type'=>'error'
                 	    );
    	             return Redirect()->back()->with($notification);
            }



          }

      public function EditPost($id)
      {
          $subject = DB::table('subjects')->get();
          $post = DB::table('posts')->where('id',$id)->first();

          return view('post.editpost', compact('subject','post'));
      } 

      public function UpdatePost(Request $request, $id)
      {
          $validatedData = $request->validate([
               'title' => 'required|max:120|',
                'details' => 'required',
                'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
               ]);

         $data = array();
         $data['title'] = $request->title;
         $data['subject_id'] = $request->subject_id;
         $data['details'] = $request->details;
         $image = $request->file('image');

         if ($image) {
         	     $image_name = hexdec(uniqid());
         	     $ext = strtolower($image->getClientOriginalExtension());
         	     $image_full_name = $image_name.'.'.$ext;
         	     $upload_path = 'public/frontend/image/';
         	     $image_url = $upload_path.$image_full_name;
         	     $success = $image->move($upload_path,$image_full_name);
         	     $data['image']=$image_url;
         	     unlink($request->old_image);
         	     DB::table('posts')->where('id',$id)->update($data);
         	     $notification = array(
          		         'message'=>'Successfully Post Updated',
             	         'alert-type'=>'success'
                 	    );
    	             return Redirect()->route('allposts')->with($notification); 	
                }else{
                	$data['image']=$request->old_image;
                	DB::table('posts')->where('id',$id)->update($data);
                	$notification = array(
          		         'message'=>'Successfully Post Updated',
             	         'alert-type'=>'success'
                 	    );
    	             return Redirect()->route('allposts')->with($notification);
                }       
      }  

    }

   

