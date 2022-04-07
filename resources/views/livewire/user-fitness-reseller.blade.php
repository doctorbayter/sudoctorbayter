<div class="bg-gradient-to-b min-h-screen from-gray-700 to-gray-900">

    <section class="grid grid-cols-6">
        <div class="col-span-6 order-first md:col-span-2">
            <img class="md:hidden" src="{{asset('img/billboards/total_fitness.jpg')}}" alt="">
            <img class="hidden md:inline-block sticky top-0 " src="{{asset('img/billboards/total_fitness_lg.jpg')}}" alt="">
        </div>
        <div class="col-span-6 md:col-span-4">
            <div class="px-6 md:px-12 py-8 md:py-16">
                <header class="text-center md:text-left mb-8 md:mb-10">
                    <h2 class="title font-bold text-xl md:text-5xl">Listado de clientes referidos</h2>
                </header>
                <section class="rounded-xl">
                   <article>

                    <div class="">
                        <style>

                            .table {
                            border-spacing: 0 15px;
                          }

                          i {
                            font-size: 1rem !important;
                          }

                          .table tr {
                            border-radius: 20px;
                          }

                          tr td:nth-child(n + 6),
                          tr th:nth-child(n + 6) {
                            border-radius: 0 0.625rem 0.625rem 0;
                          }

                          tr td:nth-child(1),
                          tr th:nth-child(1) {
                            border-radius: 0.625rem 0 0 0.625rem;
                          }

                        </style>


                        <!-- component -->
                        <link
                          href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
                          rel="stylesheet"
                        />

                        <div class="flex items-center bg-white rounded-xl">
                            <div class="w-full p-8">
                              <div class="overflow-auto lg:overflow-visible">
                                <div class="flex w-full justify-center items-center border-b-2 border-fuchsia-900 pb-4">
                                  <h2 class="text-2xl text-gray-500 font-bold">Buscar clientes</h2>
                                  <div class="text-center flex-auto">
                                    <input
                                      wire:keydown="clear_page" wire:model="search"
                                      type="text"
                                      name="name"
                                      placeholder="Escribe un nombre o correo..."
                                      class="
                                        w-full
                                        py-2
                                        ml-2
                                        border-gray-400
                                        rounded-xl
                                        outline-none
                                        focus:border-yellow-400
                                      "
                                    />
                                  </div>
                                  <div class="ml-6 text-center">
                                      <a href="{{route('plan.fitness.create')}}" class="bg-yellow-500 text-gray-50  py-2 px-4 rounded-full font-bold hover:bg-gray-900 hover:text-yellow-500">Crear cliente</a>
                                  </div>
                                </div>
                                <table class="w-full table text-gray-400 border-separate space-y-6 text-sm">
                                @if ($users->count())
                                  <thead class="bg-yellow-400 text-white text-left">
                                    <tr>
                                      <th class="p-3">ID</th>
                                      <th class="p-3 text-left">Nombre</th>
                                      <th class="p-3 text-left">Correo electrónico</th>
                                      <th class="p-3 text-left">Fecha de compra</th>

                                      <th class="p-3 text-left">Status</th>

                                    </tr>
                                  </thead>
                                  <tbody>

                                    @foreach ($users as $user)
                                        <tr class="bg-yellow-50 lg:text-black">
                                            <td class="p-3 font-medium capitalize">{{$user->id}}</td>
                                            <td class="p-3">{{$user->name}}</td>
                                            <td class="p-3">{{$user->email}}</td>
                                            <td class="p-3 uppercase">{{$user->subscription->created_at->format('d - M - Y')}}</td>
                                            <td class="p-3">
                                            <span class="bg-gray-900 text-gray-50 rounded-full px-2">ACTIVO</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                  </tbody>
                                @else
                                    <thead class="bg-yellow-500 text-white text-left">
                                      <p class="mt-6 font-bold">No hay resultados para tu búsqueda...</p>
                                    </thead>
                                @endif
                                </table>
                                <div>
                                    {{$users->links()}}
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>
                   </article>
                </section>

            </div>
        </div>
    </section>

@push('style')
    <style>
        .title{
            color: #d29c46 !important;
        }
    </style>
@endpush
</div>
