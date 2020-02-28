<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','FrontendController@main')->name('main');

Route::get('studentregister','FrontendController@studentRegister')->name('student.register');

Route::get('allcourses','FrontendController@allCourses')->name('allcourses');

Route::get('detailcourse/{id}','FrontendController@detailCourse')->name('detailcourse');

Route::group([
	'middleware'=>'auth',
	'prefix' => 'backend',


], function(){

	Route::get('dashboard','BackendController@dashboard');

	// Route::get('/about', function(){
	// 	return view('about');
	// })->name('about');

	// Route::get('/contact',function(){
	// 	return view('contact');
	// })->name('contact');

	// Route::get('/backend',function(){
	// 	return view('backend.dashboard');
	// });

	Route::resource('courses','CourseController');

	// Route::get('/about', function(){
	// 	return view('about');
	// })->name('about');

	// Route::get('/contact',function(){
	// 	return view('contact');
	// })->name('contact');

	// Route::get('/backend',function(){
	// 	return view('backend.dashboard');
	// });


	// 7 methods 
	  	// -> index(getting data) -> get (courses)
		// -> show(detail view) -> get (courses/1)

	  	// -> create (data insert form) -> get(course/create)
		// ->store (data store) -> post 
	  	// -> edit (data edit form) -> get(course/1/edit)
	  	// -> update(data update) -> put 
	  	// -> destory (data delete)-> delete

	Route::resource('subjects','SubjectController');
	Route::resource('degrees','DegreeController');
	Route::resource('batches','BatchController');

	Route::resource('trainers','TrainerController');
	Route::resource('mentors','MentorController');
	Route::resource('groups','GroupController');
});

Route::resource('students','StudentController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addquizzes','BackendController@addquizzes')->middleware('role:Trainer');
Route::get('/grades','BackendController@grades')->middleware('role:Mentor');
