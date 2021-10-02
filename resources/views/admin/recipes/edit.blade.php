@extends('adminlte::page')

@section('title', 'Administrador Doctor Bayter')

@section('content_header')
    <h1>Editar receta</h1>
@stop

@section('content')

    <div class="container-fluid py-8 row">
        <aside class="col-2">
            <div class="list-group">
                 <a href="" class="list-group-item list-group-item-action active">
                    Información
                </a>
                 <a href="" class="list-group-item list-group-item-action">
                    Ingredientes
                </a>
                 <a href="" class="list-group-item list-group-item-action">
                    Preparación
                </a>
            </div>
        </aside>
        <div class="col-10 card">
            <div class="card-body">
                <h2>Información de la receta</h2>
                <hr>
                <div>
                    {!! Form::model($recipe, ['route'=>['admin.recipes.update', $recipe], 'method' => 'PUT']) !!}
                    <div class="mb-4">
                        {!! Form::label('name', 'Nombre de la receta') !!}
                        {!! Form::text('name', null, ['class'=> 'form-control']) !!}
                    </div>
                    <div class="mb-4">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', null, ['class'=> 'form-control']) !!}
                    </div>
                    <div class="mb-4">
                        {!! Form::label('descripcion', 'Descripción adicional') !!}
                        <div><small>* Solo se utiliza para los snacks</small></div>
                        {!! Form::text('descripcion', null, ['class'=> 'form-control']) !!}
                    </div>
                    <div class="row mb-4">
                        <div class="col-3">
                            {!! Form::label('type', 'Tipo preparación') !!}
                            {!! Form::select('type', $types, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-3">
                            {!! Form::label('carbs', 'Carbohidratos') !!}
                            {!! Form::text('carbs', null, ['class'=> 'form-control',  'onkeypress' => 'return (event.keyCode > 47 && event.keyCode < 58 || event.keyCode == 46 || event.keyCode == 44)' ]) !!}
                        </div>
                        <div class="col-3">
                            {!! Form::label('indice', 'Indice glicémico') !!}
                            {!! Form::select('indice', $indices, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col-3">
                            {!! Form::label('time', 'Preparación en minutos') !!}
                            {!! Form::number('time', null, ['class'=> 'form-control']) !!}
                        </div>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script>

//Slug automático
document.getElementById("name").addEventListener('keyup', slugChange);

function slugChange(){
    name = document.getElementById("name").value;
    document.getElementById("slug").value = string_to_slug(name);

}

function string_to_slug (str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();
    // remove accents, swap ñ for n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to   = "aaaaeeeeiiiioooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }
    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
        .replace(/\s+/g, '-') // collapse whitespace and replace by -
        .replace(/-+/g, '-'); // collapse dashes
    return str;
}


//Cambiar , por .
document.getElementById("carbs").addEventListener('keyup', comaChange);

function comaChange(){

    document.getElementById("carbs").value = document.getElementById("carbs").value.replace(/,/g, '.');

}



//CKEDITOR

ClassicEditor
    .create( document.querySelector( '#descripcion' ), {
        toolbar: [ 'heading', '|', 'bold' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Texto normal', class: 'ck-heading_paragraph' },
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
</script>
@stop
