<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
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

/*Route::get('/', function () {
    return view('Dana Ashimova');
});*/

/*Route::get('/100', function () {
    return "100";
});

Route::get('user/{name?}',function($name="Dana"){
	return $name;
});

Route::get('/post/{id}', function ($id) {
    return "My id number is ". $id;
});

Route::get('login/{name}/{password?}', function ($name,$password) {
    return "Username is ".$name." password is ".$password;
})->where(['password'=>'[a-zA-Z0-9]+']);
*/





Route::get('/insert', function () {
	DB::insert("insert into Students(name,date_of_birth,GPA,Advisor)values('Dana','2001-08-29','4.0','Marzhan')");

});
Route::get('/insert2', function () {
	$student = new Student();
	$student->name='Ainur'; 
	$student->date_of_birth='2001-10-29'; 
	$student->GPA='4.0'; 
	$student->Advisor='Kairat'; 
	$student->save(); 

});

Route::get('/select', function () {
	$result=DB::select('select*from students where id=?',[1]);
	foreach ($result as $students) {
		echo "Name is ".$students->name;
		echo "<br>";
		echo "Date of birth is ".$students->date_of_birth;
		echo "<br>";
		echo "GPA is ".$students->GPA;
		echo "<br>";
		echo "Advisor is ".$students->advisor;
	}

});	

Route::get('/read', function () {
	$students=Student::all();
	foreach ($students as $student) {
		echo "Name is ".$student->name;
		echo "<br>";
		echo "Date of birth is ".$student->date_of_birth;
		echo "<br>";
		echo "GPA is ".$student->GPA;
		echo "<br>";
		echo "Advisor is ".$student->advisor;
	}

});	
Route::get('/find', function () {
	$students=Student::find(1);
	return $students->name; 
	/*$students=Student::where('id',1)->first();
	return $students;*/
	/*$students=Student::where('id',1)->value('name');
	return $students;*/
	});



Route::get('/delete', function () {
	$deleted=DB::delete('delete from students where id=?',[2]);
	return $deleted;
	});

Route::get('/delete2', function () {
	$student=Student::find(1);
	$student->delete();
	});


Route::get('/update', function () {
	$updated=DB::update('update students set GPA="3.9" where id=?',[2]);
	return $updated;
	});

Route::get('/update2', function () {
	    $student=Student::find(2);
		$student->name='Damir';
		$student->date_of_birth='2001-01-05';
		$student->GPA='2.5';
		$student->advisor='Kate';
        $student->save();
});