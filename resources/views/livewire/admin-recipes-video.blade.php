<div>
    <x-slot name="recipe">
        {{$recipe->slug}}
    </x-slot>
    <h2>Video para la receta <b>{{$recipe->name}}</b></h2>
    <hr>
    <div>
        <article class="card shadow-sm  bg-light rounded">
            <div class="card-body border rounded py-2 px-2 d-flex justify-content-arround align-items-top w-full">
                @if ($recipe->video)
                    <div class="w-full flex-auto" style="flex: auto">
                        <form wire:submit.prevent="update" class="w-100">
                            <input wire:model="video.name"  type="text" class="form-control w-100" placeholder="ingrese link del nuevo video">

                            @error('video.name')
                                <small class="fs-5 text-danger">{{$message}}</small>
                            @else
                                <small class="fs-6 text-info">Escriba el nuevo texto y oprima la tecla <b>Enter</b> para guardar el cambio</small>
                            @enderror
                        </form>
                    </div>
                    <div class=" w-16 ml-2" wire:click="destroy()" >
                        <span class="text-center btn btn-danger font-bold"><i class="fas fa-trash-alt mr-2 " ></i> Borrar video</span>

                    </div>
                @else
                    <div class="card-body ">
                        <p class="lead font-weight-bold">Agregar nueva tip</p>
                        <div>
                            <input wire:model="video_name" wire:keydown.enter="store" type="text" class="form-control w-100" placeholder="Escriba el link del video">
                            @error('video_name')
                                <small class="fs-5 text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-start mt-3">
                            <button wire:click="store" class="btn btn-success mr-4">Agregar video</button>
                        </div>
                    </div>
                @endif
            </div>

            @if ($recipe->video)
                <div class=" w-full h-96 mt-4 video text-center">
                    <style>
                        .video iframe{
                            margin: 0 auto;
                            width: auto;
                            height: 300px;
                        }
                    </style>
                    {!! $recipe->video->iframe !!}
                </div>
            @endif

        </article>
    </div>
</div>
