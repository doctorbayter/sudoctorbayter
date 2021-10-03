<div>
    <x-slot name="recipe">
        {{$recipe->slug}}
    </x-slot>
    <h2>Ingredientes de <b>{{$recipe->name}}</b></h2>
    <hr>
    <div>
        @foreach ($recipe->ingredients->sortBy('created_at') as $ingredient_item)
            <article class="card shadow-sm  bg-light rounded">
                <div class="card-body py-3 border rounded px-6 d-flex justify-content-between align-items-center">
                    @if ($ingredient->id == $ingredient_item->id)
                        <form wire:submit.prevent="update" class="w-100">
                            <input wire:model="ingredient.name" type="text" class="form-control w-100" placeholder="ingrese el nombre del ingrediente">

                            @error('ingredient.name')
                                <small class="fs-5 text-danger">{{$message}}</small>
                            @else
                                <small class="fs-6 text-info">Escriba el nuevo texto y oprima la tecla <b>Enter</b> para guardar el cambio</small>
                            @enderror
                        </form>
                    @else
                            <p class="mb-0 flex-fill">{{$ingredient_item->name}}</p>
                            <div>
                                <i class="fas fa-edit text-center btn btn-success mr-2" wire:click="edit({{$ingredient_item}})"></i>
                                <i class="fas fa-trash-alt text-center btn btn-danger" wire:click="destroy({{$ingredient_item}})"></i>
                            </div>
                    @endif
                </div>
            </article>
        @endforeach
        <div x-data="{open:false}">
            <div class="my-4" >
                <a x-on:click="open = true" x-show="!open" class="btn btn-link" >
                    <i class="far fa-plus-square fs-2 mr-2"></i>
                    <b>Agregar nuevo ingrediente</b>
                </a>
            </div>
            <article x-show="open" class="card shadow-sm bg-light rounded" >
                <div class="card-body ">
                    <p class="lead font-weight-bold">Agregar nuevo ingrediente</p>
                    <div>
                        <input wire:model="ingredient_name" type="text" class="form-control w-100" placeholder="Escriba el nombre de nuevo ingrediente">
                        @error('ingredient_name')
                            <small class="fs-5 text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-start mt-3">
                        <button wire:click="store" class="btn btn-success mr-4">Agregar ingrediente</button>
                        <button class="btn btn-secondary"  x-on:click="open = false">Cancelar</button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
