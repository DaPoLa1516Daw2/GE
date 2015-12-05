<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 5/12/15
 * Time: 12:50
 */

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DbEdit extends Controller
{
    public function setCurso(Request $peticion)
    {
        $query = DB::insert('INSERT INTO Curso(ID, Nombre) VALUES (NULL,?)',[$peticion -> input('Nombre')]);
        if(!$query)
        {
            return view('error');
        }else
        {
            return view('success');
        }
    }

    public function setAssignatura(Request $peticion)
    {
        $query = DB::insert('INSERT INTO Assignatura(ID, Nombre, ID_Curso) VALUES (NULL,?,(SELECT ID FROM Curso WHERE Nombre = ?))', [$peticion -> input('Nombre'),$peticion -> input('Curso')]);
        if(!$query)
        {
            return view('error');
        }else
        {
            return view('success');
        }
    }

    public function setAlumno(Request $peticion)
    {
        $Assignaturas = DB::select('SELECT ID FROM Assignatura WHERE ID_Curso = (SELECT ID FROM Curso WHERE Nombre = ?)', [$peticion -> input('Curso')]);
        if(!$Assignaturas)
        {
            return view('error');
        }
        DB::beginTransaction();
        $Alumno = DB::insert('INSERT INTO Alumno(ID, Nombre, Apellido, DNI) VALUES (NULL , ?, ?,?)', [$peticion->input('Nombre'), $peticion->input('Apellido'), $peticion->input('DNI')]);
        $ID_alumno = DB::select('SELECT ID FROM Alumno WHERE DNI = ?', [$peticion->input('DNI')]);
        foreach ($Assignaturas as $Assignatura) {
            DB::insert('INSERT INTO Nota(ID_Assignatura, ID_Alumno, Nota) VALUES (?,?, NULL)', [$Assignatura->ID, $ID_alumno[0]->ID]);
        }
        DB::commit();

        return view('success');
    }
}