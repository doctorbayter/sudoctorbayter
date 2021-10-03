<div>
    <x-slot name="recipe">
        {{$recipe->slug}}
    </x-slot>
    <h2>Tips para la receta <b>{{$recipe->name}}</b></h2>
    <hr>
    <div>
        @foreach ($recipe->tips->sortBy('step') as $tip_item)
            <article class="card shadow-sm  bg-light rounded">
                <div class="card-body border rounded py-2 px-2 d-flex justify-content-between align-items-center">
                    @if ($tip->id == $tip_item->id)
                        <form wire:submit.prevent="update" class="w-100">
                            <input wire:model="tip.name"  type="text" class="form-control w-100" placeholder="ingrese el nombre del tipe">

                            @error('tip.name')
                                <small class="fs-5 text-danger">{{$message}}</small>
                            @else
                                <small class="fs-6 text-info">Escriba el nuevo texto y oprima la tecla <b>Enter</b> para guardar el cambio</small>
                            @enderror
                        </form>
                    @else
                            <p class="mb-0 flex-fill"> <b class="mr-2">{{$tip_item->step}}</b> {{$tip_item->name}}</p>
                            <div>
                                <i class="fas fa-edit text-center btn btn-success mr-2" wire:click="edit({{$tip_item}})"></i>
                                <i class="fas fa-trash-alt text-center btn btn-danger" wire:click="destroy({{$tip_item}})"></i>
                            </div>
                    @endif
                </div>
            </article>
        @endforeach
        <div x-data="{open:false}">
            <div class="my-4" >
                <a x-on:click="open = true" x-show="!open" class="btn btn-link" >
                    <i class="far fa-plus-square fs-2 mr-2"></i>
                    <b>Agregar un nuevo tip</b>
                </a>
            </div>
            <article x-show="open" class="card shadow-sm bg-light rounded" >
                <div class="card-body ">
                    <p class="lead font-weight-bold">Agregar nueva tip</p>
                    <div>
                        <input wire:model="tip_name" wire:keydown.enter="store" type="text" class="form-control w-100" placeholder="Escriba el nombre de nuevo tip">
                        @error('tip_name')
                            <small class="fs-5 text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-start mt-3">
                        <button wire:click="store" class="btn btn-success mr-4">Agregar tip</button>
                        <button class="btn btn-secondary"  x-on:click="open = false">Cancelar</button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>
