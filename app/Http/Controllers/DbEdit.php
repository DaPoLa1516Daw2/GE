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
        if(count($peticion -> input('Nombre')) == 1) {
            $query = DB::insert('INSERT INTO Curso(ID, Nombre) VALUES (NULL,?)', [$peticion->input('Nombre')[0]]);
            if (!$query) {
                return view('error');
            } else {
                return view('success');
            }
        } else {
            DB::beginTransaction();
            for($i = 0; $i < count($peticion -> input('Nombre')); $i++)
            {
                DB::insert('INSERT INTO Curso(ID, Nombre) VALUES (NULL,?)', [$peticion->input('Nombre')[$i]]);
            }
            DB::commit();
            return view('success');
        }
    }

    public function setAssignatura(Request $peticion)
    {
        if(count($peticion -> input('Nombre')) == 1)
        {
            $query = DB::insert('INSERT INTO Assignatura(ID, Nombre, ID_Curso) VALUES (NULL,?,(SELECT ID FROM Curso WHERE Nombre = ?))',
                [$peticion->input('Nombre')[0], $peticion->input('Curso')]);
            if (!$query) {
                return view('error');
            } else {
                return view('success');
            }
        } else {
            DB::beginTransaction();
            for($i = 0; $i < count($peticion -> input('Nombre')); $i++)
            {
                DB::insert('INSERT INTO Assignatura(ID, Nombre, ID_Curso) VALUES (NULL,?,(SELECT ID FROM Curso WHERE Nombre = ?))',
                    [$peticion->input('Nombre')[$i], $peticion->input('Curso')]);
            }
            DB::commit();
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
        DB::insert('INSERT INTO Alumno(ID, Nombre, Apellido, DNI) VALUES (NULL, ?, ?, ?)', [$peticion->input('Nombre'), $peticion->input('Apellido'), $peticion->input('DNI')]);
        $ID_alumno = DB::select('SELECT ID FROM Alumno WHERE DNI = ?', [$peticion->input('DNI')]);
        foreach ($Assignaturas as $Assignatura) {
            DB::insert('INSERT INTO Nota(ID_Assignatura, ID_Alumno, Nota) VALUES (?,?, NULL)', [$Assignatura->ID, $ID_alumno[0]->ID]);
        }
        DB::commit();

        return view('success');
    }

    public function setNota(Request $peticion)
    {
        $items = array(
            $peticion -> input('Alumno'),
            $peticion -> input('Assignatura'),
            $peticion -> input('Nota')
        );
        DB::beginTransaction();
        for($i = 0; $i < count($items[1]); $i++)
        {
            DB::update('UPDATE Nota SET Nota = ? WHERE ID_Assignatura =
                      (SELECT ID FROM Assignatura WHERE Nombre = ?) AND ID_Alumno =
                      (SELECT ID FROM Alumno WHERE Nombre = ?)', [$items[2][$i],$items[1][$i],$items[0]]);
        }
        DB::commit();
        return view('success');
    }
}