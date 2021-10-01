@extends('adminlte::page')

@section('title', 'Administrador Doctor Bayter')

@section('content_header')
    <h1>Asignar rol a usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="h5">Nombre:</h2>
            <p class="form-control">{{$user->name}}</p>

            <h2 class="h5">Lista de roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method'=> 'PUT']) !!}

            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-2']) !!}
                        {{$role->name}}
                    </label>
                </div>
            @endforeach

            {!! Form::submit('Asignar rol', ['class'=>'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
