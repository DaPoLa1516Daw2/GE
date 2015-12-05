@extends('headerData')

@section('contenido')
    @if($estado == 1)
    <table class="table table-hover">
        <tr><th>#</th><th>Nombre</th></tr>
        @foreach($cursos as $item)
            <tr><th>{{$item -> ID}}</th><td>{{$item -> Nombre}}</td></tr>
        @endforeach
    </table>
    @elseif($estado == 2)
        <table class="table table-hover">
            <tr><th>#</th><th>Nombre</th><th>Curso</th></tr>
            @foreach($assignaturas as $item)
                <tr><th>{{$item -> ID}}</th><td>{{$item -> Nombre}}</td><td>{{$item -> Curso}}</td></tr>
            @endforeach
        </table>
    @elseif($estado == 3)
        <table class="table table-hover">
            <tr><th>#</th><th>DNI</th><th>Nombre</th><th>Apellido</th></tr>
            @foreach($alumnos as $item)
                <tr><th>{{$item -> ID}}</th><td>{{$item -> DNI}}</td><td>{{$item -> Nombre}}</td><td>{{$item -> Apellido}}</td></tr>
            @endforeach
        </table>
    @else
    @endif
@endsection