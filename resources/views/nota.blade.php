@extends('headerData')

@section('contenido')
    <table class="table table-hover">
        <tr><th>DNI</th><th>Nombre</th><th>Apellido</th></tr>
        @foreach($alumnos as $item)
            <tr><th><a href="/notaEdit?id={{$item -> ID}}">{{ $item -> DNI }}</a></th>
                <td><a href="/notaEdit?id={{$item -> ID}}">{{ $item -> Nombre }}</a></td>
                <td><a href="/notaEdit?id={{$item -> ID}}">{{ $item -> Apellido }}</a></td></tr>
        @endforeach
    </table>
@endsection