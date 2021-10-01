@extends('adminlte::page')

@section('title', 'Administrador Doctor Bayter')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-boy m-4">
            {!! Form::open(['route'=>'admin.roles.store']) !!}

                @include('admin.roles.partials.form')

                {!! Form::submit('Crear nuevo rol', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
