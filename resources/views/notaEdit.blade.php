@extends('headerData')

@section('contenido')
    <table class="table table-hover">
        <tr><th>Alumno</th><th>Assignatura</th><th>Nota</th></tr>
        {!! Form::open(array('url' => '/change', 'method' => 'post')) !!}
        @foreach($alumno as $item)
            <tr><th>{{ $item -> Alumno }}{!! Form::hidden('Alumno', $item -> Alumno) !!}</th>
                <td>{{ $item -> Assignatura }}{!! Form::hidden('Assignatura[]', $item -> Assignatura) !!}</td>
                <td>{!! Form::number('Nota[]', $item -> Nota, array('min' => 0, 'max' => 10)) !!}</td></tr>
        @endforeach
    </table>
    {!! Form::submit('Enviar', array('class' => 'btn btn-default')) !!}
    {!! Form::close() !!}
@endsection