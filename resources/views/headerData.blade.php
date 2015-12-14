@extends('indexplantilla')

@section('headerData')
    <!--Añadir metas, js, css y favicon.-->
    <meta name="application-name" content="GE"/>
    <meta name="description" content="Visionado de notas con PHP(Laravel), MySQL, ImageMagick."/>
    <meta name="author" content="Oscar Viciana y David Postigo">
    <link rel="icon" href="{{ URL::asset('/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ URL::asset('/CSS/style.css') }}" type="text/css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection

@section('cabe')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">GE</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Añadir <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/insert?a=1">Curso/s</a></li>
                            <li><a href="/insert?a=2">Assignatura/s</a></li>
                            <li><a href="/insert?a=3">Alumno</a></li>
                            <li><a href="/notas">Notas</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Ver datos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/cursos">Cursos</a></li>
                            <li><a href="/assignaturas">Assignaturas</a></li>
                            <li><a href="/alumnos">Alumnos</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/aprovado">Aprovados por curso</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

@endsection

@section('pie')
    <footer class="row">
        <div class="col-sm-12" style="text-align: center;"><b>M07UF03 | David Postigo | Oscar Viciana | GE</b></div>
    </footer>
@endsection