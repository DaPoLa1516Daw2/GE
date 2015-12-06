@extends('headerData')

@section('contenido')
    @if($estado == 1)
        <script src="{{ URL::asset('/js/IterativeCurso.js') }}"></script>
        {!! Form::open(array('url' => '/insertDataCurso', 'method' => 'post')) !!}
        <div class="form-group">
            {!! Form::label('Nombre', 'Nombre', array('class' => 'col-sm-offset-2 col-sm-2 control-label')) !!}
            <div class="col-sm-5 ">
                {!! Form::text('Nombre[]', 'Nombre Curso', array('class' => 'form-control')) !!}
            </div>
        </div>
        <span class="glyphicon glyphicon-plus" aria-hidden="true" id="add"></span>
        <div id="iterativeAssignatura"></div>
        <div class="form-group">
            <div class="col-sm-offset-8 col-sm-4">
                {!! Form::submit('Enviar', array('class' => 'btn btn-default')) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @elseif($estado == 2)
        <script src="{{ URL::asset('/js/IterativeAssignatura.js') }}"></script>
        {!! Form::open(array('url' => '/insertDataAssignatura', 'method' => 'post')) !!}
        <div class="form-group">
            {!! Form::label('Curso', 'Curso', array('class' => 'col-sm-offset-2 col-sm-2 control-label')) !!}
            <div class="col-sm-5 ">
                <select id="Curso" name="Curso" class="form-control">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso -> Nombre }}">{{ $curso -> Nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Nombre', 'Nombre', array('class' => 'col-sm-offset-2 col-sm-2 control-label')) !!}
            <div class="col-sm-5">
                {!! Form::text('Nombre[]', 'Nombre Assignatura', array('class' => 'form-control')) !!}
            </div>
        </div>
        <span class="glyphicon glyphicon-plus" aria-hidden="true" id="add"></span>
        <div id="iterativeAssignatura"></div>
        <div class="form-group">
            <div class="col-sm-offset-8 col-sm-4">
                {!! Form::submit('Enviar', array('class' => 'btn btn-default')) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @elseif($estado == 3)
        {!! Form::open(array('url' => '/insertDataAlumno', 'method' => 'post')) !!}
        <div class="form-group">
            {!! Form::label('Curso', 'Curso', array('class' => 'col-sm-offset-2 col-sm-2 control-label')) !!}
            <div class="col-sm-5 ">
                <select id="Curso" name="Curso" class="form-control">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso -> Nombre }}">{{ $curso -> Nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('DNI', 'DNI', array('class' => 'col-sm-offset-2 col-sm-2 control-label')) !!}
            <div class="col-sm-5 ">
                {!! Form::text('DNI', '99999999Q', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Nombre', 'Nombre', array('class' => 'col-sm-offset-2 col-sm-2 control-label')) !!}
            <div class="col-sm-5 ">
                {!! Form::text('Nombre', 'Nombre Alumno', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('Apellido', 'Apellido', array('class' => 'col-sm-offset-2 col-sm-2 control-label')) !!}
            <div class="col-sm-5 ">
                {!! Form::text('Apellido', 'Apellido Alumno', array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-8 col-sm-4">
                {!! Form::submit('Enviar', array('class' => 'btn btn-default')) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @else
    @endif
@endsection