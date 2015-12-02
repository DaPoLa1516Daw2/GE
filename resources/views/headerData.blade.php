@extends('indexplantilla')

@section('headerData')
    {Añadir metas, js, css y favicon.}
    <meta name="application-name" content="GE"/>
    <meta name="description" content="Visionado de notas con PHP(Laravel), MySQL, ImageMagick."/>
    <meta name="author" content="Oscar Viciana y David Postigo">
    <link rel="icon" href="{{ URL::asset('/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ URL::asset('/CSS/style.css') }}" type="text/css">
@endsection

@section('cabe')
    <h1>Gestor Escolar</h1>
@endsection

@section('pie')
    <footer>
        M07UF03 | David Postigo | Oscar Viciana | GE
    </footer>
@endsection