@extends('adminlte::page')

@section('title', 'Administrador Doctor Bayter')

@section('content_header')
    <h1>Editar rol existente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-boy m-4">
            {!! Form::model($role, ['route'=> ['admin.roles.update', $role], 'method' => 'PUT' ]) !!}

                @include('admin.roles.partials.form')

                {!! Form::submit('Editar rol', ['class'=>'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
