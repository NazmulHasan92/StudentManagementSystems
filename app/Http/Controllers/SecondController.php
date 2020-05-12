<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SecondController extends Controller
{
    public function index()
    {  
    	$post = DB::table('posts')
      	         ->join('subjects','posts.subject_id','subjects.id')
      	         ->select('posts.*', 'subjects.name', 'subjects.slug')
      	         ->paginate(3);
    	return view('pages.index', compact('post'));
    }
}
