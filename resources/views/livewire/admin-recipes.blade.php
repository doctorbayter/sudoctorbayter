<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="clear_page" wire:model="search" type="text" class="form-control w-100" placeholder="Buscador de recetas">
        </div>
        @if ($recipes->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td>{{$recipe->id}}</td>
                                <td>{{$recipe->name}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('admin.recipes.edit', $recipe)}}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$recipes->links()}}
            </div>
        @else
            <div class="card-body">
                <b>No Existen recetas que conincidan con tu búsqueda {{$search}}</b>
            </div>
        @endif
    </div>
</div>
