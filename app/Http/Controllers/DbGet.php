<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 2/12/15
 * Time: 17:52
 */

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class DbGet extends Controller
{
    public function getCurso()
    {
        $query = DB::select('SELECT * FROM Curso');
        return view('tablaDatos', ['cursos' => $query, 'estado' => 1]);
    }

    public function getAssignatura()
    {
        $query = DB::select('SELECT Assignatura.ID AS "ID", Assignatura.Nombre AS "Nombre", Curso.Nombre AS "Curso"
                              FROM Assignatura JOIN Curso ON Assignatura.ID_Curso = Curso.ID');
        return view('tablaDatos', ['assignaturas' => $query, 'estado' => 2]);
    }

    public function getAlumno()
    {
        $query = DB::select('SELECT * FROM Alumno');
        return view('tablaDatos', ['alumnos' => $query, 'estado' => 3]);
    }

}