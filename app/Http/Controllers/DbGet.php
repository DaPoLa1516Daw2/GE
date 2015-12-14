<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 2/12/15
 * Time: 17:52
 */

namespace App\Http\Controllers;

use DB;
use Imagick;
use ImagickDraw;
use App\Http\Controllers\Controller;

/**
 * Clase encargada de hacer las periciones a la base de datos
 * Class DbGet
 * @package App\Http\Controllers
 */
class DbGet extends Controller
{
    /**
     * funcion encargada de obtener los cursos
     * @return mixed
     */
    public function getCurso()
    {
        $query = DB::select('SELECT * FROM Curso');
        return view('tablaDatos', ['cursos' => $query, 'estado' => 1]);
    }

    /**
     * funcion encargada de obtener las asignaturas
     * @return mixed
     */
    public function getAssignatura()
    {
        $query = DB::select('SELECT Assignatura.ID AS "ID", Assignatura.Nombre AS "Nombre", Curso.Nombre AS "Curso"
                              FROM Assignatura JOIN Curso ON Assignatura.ID_Curso = Curso.ID');
        return view('tablaDatos', ['assignaturas' => $query, 'estado' => 2]);
    }

    /**
     * funcion encargada de obtener los alumnos
     * @return mixed
     */
    public function getAlumno()
    {
        $query = DB::select('SELECT * FROM Alumno');
        return view('tablaDatos', ['alumnos' => $query, 'estado' => 3]);
    }

    /**
     * funcion encargada de recuperar las notas
     * @return mixed
     */
    public function verNotas()
    {
        $values = array();
        $consulta = DB::select('SELECT Assignatura.Nombre AS Referencia, Nota.Nota as Valor FROM Nota
                                JOIN Assignatura ON Assignatura.ID = Nota.ID_Assignatura
                                JOIN Alumno ON Alumno.ID = Nota.ID_Alumno WHERE Alumno.Nombre = "Oscar"');
        for($i = 0; $i < count($consulta); $i ++){
            $values[$i] = array($consulta[$i] -> Referencia, (int)$consulta[$i] -> Valor);
        }

        $this->genGrafica($values,10);
        return view('grafico');
    }

    public function aprobado(){


        $consulta_Aprovado = DB::select('SELECT  "Aprovado" AS Referencia, count(*) as Valor from nota
                                JOIN assignatura ON assignatura.ID = nota.ID_assignatura
                                WHERE nota >= 5 and ID_Curso = (
                                select id from curso where nombre = "DAW")
                                ');
        $consulta_Suspendido = DB::select('SELECT  "Suspendido" AS Referencia, count(*) as Valor from nota
                                JOIN assignatura ON assignatura.ID = nota.ID_assignatura
                                WHERE nota < 5 and ID_Curso = (
                                select id from curso where nombre = "DAW")
                                ');

        $values[0] = array($consulta_Aprovado -> Referencia, (int)$consulta_Aprovado -> Valor);
        $values[1] = array($consulta_Suspendido -> Referencia, (int)$consulta_Suspendido -> Valor);

        $this->genGrafica($values,10);
        return view('grafico');

    }




    /**
     * Funcion encargada de generar las graficas
     * @param $values los datos de la consulta SQL
     * @param $max el valor maximo de la consulta
     */
    public function genGrafica($values, $max)
    {
        $secion = 800/count($values);
        $x = array(0,$secion);
        $colorMemoria = '';
        $color = '';

        //Genera el grafico
        $draw = new ImagickDraw();
        $draw -> setStrokeColor('black');
        $draw -> setStrokeWidth(2);
        for ($z = 0; $z < count($values); $z++) {
            while(1) {
                $color = '#';
                $color .= dechex(rand(0, 255));
                $color .= dechex(rand(0, 255));
                $color .= dechex(rand(0, 255));
                while (strlen($color) != 7) {
                    $color .= '0';
                }
                if (strpos($colorMemoria, $color) === false) {
                    $colorMemoria .= $color;
                    break;
                }
            }
            $draw -> setFillColor($color);
            $values[$z][2] = $color;
            $y = ((($values[$z][1] * 100) / $max) * 500) / 100;
            $draw->rectangle($x[0], 500 - $y, $x[1], 500);
            $x[0] = $x[1];
            $x[1] += $secion;
        }

        $imagick = new Imagick();
        $imagick -> newImage(800, 500, 'white');
        $imagick -> setImageFormat("png");
        $imagick -> drawImage($draw);
        $imagick -> writeImage('img/Grafico.png');
        $imagick -> destroy();

        //Genera leyenda
        $posInit = array(20,count($values)*40);
        $draw = new ImagickDraw();
        $draw -> setStrokeColor('black');
        $draw -> setStrokeWidth(1);
        for($z = 0; $z<count($values); $z++) {
            $draw -> setFillColor($values[$z][2]);
            $draw -> rectangle($posInit[0],$posInit[1]-20,$posInit[0]-20,$posInit[1]);
            $posInit[0] = 30;
            $draw -> setFontSize(20);
            $draw -> setFillColor('black');
            $draw -> annotation($posInit[0],$posInit[1],$values[$z][0].' : '.$values[$z][1]);
            $posInit[1] = (count($values)-$z-1)*40;
            $posInit[0] = 20;
        }

        $imagick = new Imagick();
        $imagick -> newImage(400, 20+count($values)*40, 'white');
        $imagick -> setImageFormat("png");
        $imagick -> drawImage($draw);
        $imagick -> writeImage('img/Leyenda.png');
        $imagick -> destroy();

    }
}