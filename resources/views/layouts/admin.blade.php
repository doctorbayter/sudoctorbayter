@extends('adminlte::page')

@section('title', 'Administrador Doctor Bayter')

@section('content_header')
    <h1>Editar receta</h1>
@stop

@section('content')

    <div class="container-fluid py-8 row">
        <aside class="col-2">
            <div class="list-group">
                <a href="{{route('admin.recipes.edit', $recipe)}}" class="list-group-item list-group-item-action @routeIs('admin.recipes.edit', $recipe) active @endif ">
                   Información
               </a>
                <a href="{{route('admin.recipes.ingredients', $recipe)}}" class="list-group-item list-group-item-action @routeIs('admin.recipes.ingredients', $recipe) active @endif">
                   Ingredientes
               </a>
                <a href="{{route('admin.recipes.instructions', $recipe)}}" class="list-group-item list-group-item-action @routeIs('admin.recipes.instructions', $recipe) active @endif">
                   Preparación
               </a>
            </div>
        </aside>
        <div class="col-10 card">
            <main class="card-body">
                {{$slot}}
            </main>
        </div>
    </div>

@stop

@section('css')

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
@stop
