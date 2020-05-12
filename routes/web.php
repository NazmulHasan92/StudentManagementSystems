<?php

Route::get('/', 'SecondController@index');

Route::get('/about', 'FirstController@About')->name('about');

Route::get(md5('/blog'), 'FirstController@Blog')->name('blog');

Route::get('/contactus', 'FirstController@Contact')->name('contact');

//Subject Router------->

Route::get('/addsubject', 'FirstController@Add')->name('addsubject');
Route::get('/allsubjects', 'FirstController@All')->name('allsubjects');
Route::post('/storesubject', 'FirstController@Store')->name('store');
Route::get('/view/subject/{id}', 'FirstController@View');
Route::get('/delete/subject/{id}', 'FirstController@Delete');
Route::get('/edit/subject/{id}', 'FirstController@Edit');
Route::post('/update/subject/{id}', 'FirstController@Update');

//Post Controller Here--------->

Route::get('/writepost', 'PostController@Write')->name('writepost');
Route::post('/storepost', 'PostController@Stores')->name('stores');
Route::get('/post', 'PostController@AllPost')->name('allposts');
Route::get('/view/post/{id}', 'PostController@ViewPost');
Route::get('/delete/post/{id}', 'PostController@DeletePost');
Route::get('/edit/post/{id}', 'PostController@EditPost');
Route::post('/update/post/{id}', 'PostController@UpdatePost');

//Student Router --------------->

Route::get('/student', 'StudentController@Student')->name('student');
Route::post('/storestudent', 'StudentController@Stores')->name('storestudent');
Route::get('/all/student', 'StudentController@AllStudent')->name('allstudent');
Route::get('/view/student/{id}', 'StudentController@Show');
Route::get('/delete/student/{id}', 'StudentController@Destroy');
Route::get('/edit/student/{id}', 'StudentController@Edit');
Route::post('update/student/{id}', 'StudentController@Update');


//Middleware------->
// Route::get('/contact', function(){
// 	return view('pages.contact');
// })->middleware('age');
// 
//Router -------->
//
//  Route::get('home',function(){
// 	echo 'This Is Home Page';
// });
