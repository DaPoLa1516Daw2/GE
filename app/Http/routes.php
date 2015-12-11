<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function (){
    return view('index');
});

Route::get('/insert', function (){
    $query = DB::select('SELECT Nombre FROM Curso');
    return view('insert', ['estado' => Input::get('a'), 'cursos' => $query]);
});

Route::get('/notas', function (){
    $query = DB::select('SELECT * FROM Alumno');
    return view('nota', ['alumnos' => $query]);
});

Route::get('/notaEdit', function (){
    $query = DB::select('SELECT Alumno.Nombre AS Alumno, Assignatura.Nombre AS Assignatura, Nota.Nota AS Nota FROM Nota
                        JOIN Alumno ON Alumno.ID = Nota.ID_Alumno
                        JOIN Assignatura ON Assignatura.ID = Nota.ID_Assignatura
                        WHERE Alumno.ID = ?', [Input::get('id')]);
    return view('notaEdit', ['alumno' => $query]);
});

Route::post('/change', 'DbEdit@setNota');
Route::post('/insertDataCurso', 'DbEdit@setCurso');
Route::post('/insertDataAssignatura', 'DbEdit@setAssignatura');
Route::post('/insertDataAlumno', 'DbEdit@setAlumno');

Route::get('/prueba', 'DbGet@verNotas');

Route::get('/cursos', 'DbGet@getCurso');
Route::get('/assignaturas', 'DbGet@getAssignatura');
Route::get('/alumnos', 'DbGet@getAlumno');
