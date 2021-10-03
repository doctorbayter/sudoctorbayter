<div>
    <h2>Información de la receta</h2>
    <hr>
    <div>
        {!! Form::model($recipe, ['route'=>['admin.recipes.update', $recipe], 'method' => 'PUT', 'files'=>true]) !!}
        <div class="mb-4">
            {!! Form::label('name', 'Nombre de la receta') !!}

            {!! Form::text('name', null, ['class'=>'form-control ' .($errors->has('name') ? 'is-invalid' : '')]) !!}
            @error('name')
                <div class=""> <small class="text-danger font-weight-bold">{{$message}}</small></div>
            @enderror
        </div>
        <div class="mb-4">
            {!! Form::label('slug', 'Slug') !!}

            {!! Form::text('slug', null, ['class'=>'form-control ' .($errors->has('slug') ? 'is-invalid' : '')]) !!}
            @error('slug')
                <div class=""> <small class="text-danger font-weight-bold">{{$message}}</small></div>
            @enderror

        </div>
        <div class="mb-4">
            {!! Form::label('descripcion', 'Descripción adicional') !!}
            <div><small>* Solo se utiliza para los snacks</small></div>
            {!! Form::textarea('descripcion', null, ['class'=>'form-control']) !!}
        </div>
        <div class="row mb-4">
            <div class="col-3">
                {!! Form::label('type', 'Tipo preparación') !!}

                {!! Form::select('type', $types, null, ['class'=>'form-control ' .($errors->has('type') ? 'is-invalid' : '')]) !!}
                @error('type')
                    <div class=""> <small class="text-danger font-weight-bold">{{$message}}</small></div>
                @enderror
            </div>
            <div class="col-3">
                {!! Form::label('carbs', 'Carbohidratos') !!}

                {!! Form::text('carbs', null, ['class'=>'form-control ' .($errors->has('carbs') ? 'is-invalid' : ''),  'onkeypress' => 'return (event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46 || event.keyCode == 44)' ]) !!}
                @error('carbs')
                <div class=""> <small class="text-danger font-weight-bold">{{$message}}</small></div>
                @enderror
            </div>
            <div class="col-3">
                {!! Form::label('indice', 'Indice glicémico') !!}

                {!! Form::select('indice', $indices, null, ['class'=>'form-control ' .($errors->has('indice') ? 'is-invalid' : '')]) !!}
                @error('indice')
                    <div class=""> <small class="text-danger font-weight-bold">{{$message}}</small></div>
                @enderror
            </div>
            <div class="col-3">
                {!! Form::label('time', 'Preparación en minutos') !!}

                {!! Form::number('time', null, ['class'=>'form-control ' .($errors->has('time') ? 'is-invalid' : '')]) !!}
                @error('time')
                    <div class=""> <small class="text-danger font-weight-bold">{{$message}}</small></div>
                @enderror
            </div>
        </div>
        <div>
            <h2>Foto de la receta</h2>
            <div class="row">
                <figure class="col-5">
                    <img id="picture" src="@if (Storage::exists($recipe->image->url)) {{Storage::url($recipe->image->url)}} @else {{asset('img/'.$recipe->image->url)}} @endif" alt="" class="w-100">
                </figure>
                <div class="col-7">
                    <p> <b class="text-red"> <i class="fas fa-exclamation-triangle mr-1"></i> Importante:</b> La foto de la receta debe ser una imagen en formato <b>JPG</b> o <b>PNG</b> con medidas de <b>500px de ancho por 275px de alto</b>.</p>
                    {!! Form::file('image', ['class'=> 'form-control-file border w-100 py-3 px-2' , 'id'=>'image', 'accept'=> 'image/*' ]) !!}
                    @error('image')
                        <div class=""> <small class="text-danger font-weight-bold">{{$message}}</small></div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="">
            {!! Form::submit('Actualizar receta', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>
