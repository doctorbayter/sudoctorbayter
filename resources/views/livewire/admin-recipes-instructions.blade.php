<div>
    <x-slot name="recipe">
        {{$recipe->slug}}
    </x-slot>
    <h2>Instructiones de <b>{{$recipe->name}}</b></h2>
    <hr>

    <div id="simpleList" class="list-group">
        <header class="mb-4 fs-6 text-info">
            Para re ordenar la lista  debes arrastar el item de la lista hasta la posicion deseada
        </header>
        @foreach ($recipe->instructions->sortBy('step') as $instruction_item)
            <article class="card shadow-sm  bg-light rounded list-group-item" style="cursor: grab" data-step="{{$instruction_item->id}}">
                <div class="card-body py-0 px-0 d-flex justify-content-between align-items-center">
                    @if ($instruction->id == $instruction_item->id)
                        <form wire:submit.prevent="update" class="w-100">
                            <input wire:model="instruction.name"  type="text" class="form-control w-100" placeholder="ingrese el nombre del instructione">

                            @error('instruction.name')
                                <small class="fs-5 text-danger">{{$message}}</small>
                            @else
                                <small class="fs-6 text-info">Escriba el nuevo texto y oprima la tecla <b>Enter</b> para guardar el cambio</small>
                            @enderror
                        </form>
                    @else
                            <p class="mb-0 flex-fill"> <b class="mr-2">{{$instruction_item->step}}</b> {{$instruction_item->name}}</p>
                            <div>
                                <i class="fas fa-edit text-center btn btn-success mr-2" wire:click="edit({{$instruction_item}})"></i>
                                <i class="fas fa-trash-alt text-center btn btn-danger" wire:click="destroy({{$instruction_item}})"></i>
                            </div>
                    @endif
                </div>
            </article>
        @endforeach
        <div x-data="{open:false}">
            <div class="my-4" >
                <a x-on:click="open = true" x-show="!open" class="btn btn-link" >
                    <i class="far fa-plus-square fs-2 mr-2"></i>
                    <b>Agregar nueva instrucción</b>
                </a>
            </div>
            <article x-show="open" class="card shadow-sm bg-light rounded" >
                <div class="card-body ">
                    <p class="lead font-weight-bold">Agregar nueva instrucción</p>
                    <div>
                        <input wire:model="instruction_name" wire:keydown.enter="store" type="text" class="form-control w-100" placeholder="Escriba el nombre de nuevo instructione">
                        @error('instruction_name')
                            <small class="fs-5 text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-start mt-3">
                        <button wire:click="store" class="btn btn-success mr-4">Agregar instrucción</button>
                        <button class="btn btn-secondary"  x-on:click="open = false">Cancelar</button>
                    </div>
                </div>
            </article>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        // Simple list
        Sortable.create(simpleList, {
            onEnd: function (/**Event*/evt) {
            var itemEl = evt.item;  // dragged HTMLElement
            evt.to;    // target list
            evt.from;  // previous list
            evt.oldIndex;  // element's old index within old parent
            evt.newIndex;  // element's new index within new parent
            evt.oldDraggableIndex; // element's old index within old parent, only counting draggable elements
            evt.newDraggableIndex; // element's new index within new parent, only counting draggable elements
            evt.clone // the clone element
            evt.pullMode;  // when item is in another sortable: `"clone"` if cloning, `true` if moving
            Livewire.emit('dragged', evt.item.dataset.step, evt.oldIndex, evt.newIndex );
        },
        });
    </script>
</div>
