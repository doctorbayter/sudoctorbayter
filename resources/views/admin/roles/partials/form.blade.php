<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control ' .($errors->has('name') ? 'is-invalid' : '') , 'placeholder'=>'Escriba el nombre del rol']) !!}
    @error('name')
        <span class="invalid-feedback">
            <b>{{$message}}</b>
        </span>
    @enderror
</div>
<strong>Persmisos:</strong>
@error('permissions')
    <div>
        <small class="text-danger">
            <b>{{$message}}</b>
        </small>
    </div>
@enderror
@foreach ($permissions as $permission)
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-2']) !!}
            {{$permission->name}}
        </label>
    </div>
@endforeach
