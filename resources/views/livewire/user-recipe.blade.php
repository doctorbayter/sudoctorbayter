<section x-data="{ openMenu: false }" >
    <div class="flex">
        <x-menu :userPlan="$user_plan" />
            <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="bg-white  ml-auto">
            <header class="shadow-lg relative">

                <div class="w-10/12 mx-auto py-10 relative z-10">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Receta de</h3>
                    <h2 class=" font-bold text-3xl md:text-6xl">{{$recipe->name}}</h2>
                    <div class="flex text-xs items-center">
                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">{{$recipe->carbs}}g Carbs.</p>
                        <p class="text-gray-50 ml-2 flex items-center">
                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                            <span>1 persona</span>
                        </p>
                        <p class="text-gray-50 ml-2 flex items-center">
                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                            <span>{{$recipe->time}} minutos</span>
                        </p>
                    </div>
                </div>
                <div class="absolute w-full h-full bg-fixed bg-cover bg-center top-0 left-0 opacity-40" style="background-image: url(@if (Storage::exists($recipe->image->url)) {{Storage::url($recipe->image->url)}} @else {{asset('img/'.$recipe->image->url)}} @endif)"></div>
            </header>
            <aside class="w-10/12 mx-auto mt-10">
                <a href="{{ url()->previous() }}" class="text-red-700 font-bold text-lg px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg"> <i class="fas fa-chevron-left mr-2"></i> Volver al menú</a>
            </aside>
              <div class="w-10/12 mx-auto my-10">
                <div class="flex__ flex-col space-y-4 min-w-screen py-16 animated fadeIn faster  justify-center items-center outline-none focus:outline-none bg-gray-900 hidden">
                    <div class="flex flex-col p-8 bg-white shadow-md hover:shodow-lg rounded-2xl">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="hidden md:block w-16 h-16 rounded-2xl p-3 border border-yellow-100 text-yellow-400 bg-yellow-50" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="flex flex-col ml-3">
                                    <div class=" leading-none font-bold text-red-700">¡Aviso Importante!</div>
                                    <p class="text-sm text-gray-600 leading-none mt-1">Actualmente estamos actualizando todas las  recetas de las 4 fases del <b>Metodo DKP.</b></p>
                                    <p class="text-sm text-gray-600 leading-none mt-1">Es posible que las fotografías de algunas recetas no coincidan con la descripción de los ingredientes y/o preparación.</p>
                                    <p class="text-sm text-gray-600 leading-none mt-1">En cuanto las recetas esten actualizadas en su totalidad les daremos aviso. Por lo pronto <b>debemos guiarnos exclusivamente por la lista de ingredientes y preparación de cada receta y no por la foto.</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <section class="mt-16">
                        <div class="flex flex-col xl:flex-row">
                            <div class=" w-full xl:w-4/12">
                                <figure class="rounded-t-xl overflow-hidden">

                                    @if (Storage::exists($recipe->image->url))
                                        <img src="{{Storage::url($recipe->image->url)}}?v={{ time() }}" alt="" class=" w-full object-cover">
                                    @else
                                        <img src="{{asset('img/'.$recipe->image->url)}}?v={{ time() }}" alt="" class=" w-full object-cover">
                                    @endif

                                </figure>

                                <div class=" bg-gray-200 rounded-b-xl px-4 py-8">
                                    <h3 class="text-3xl md:text-4xl text-gray-900 font-bold">Ingredientes</h3>
                                    <ul class="mt-6 text-sm text-gray-600">
                                        @foreach ($recipe->ingredients->sortBy('created_at') as $ingredient)
                                            <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>{{$ingredient->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="xl:ml-16 mt-12 md:mt-0 flex-1">
                                <h3 class="text-4xl font-bold text-red-700">Preparación</h3>
                                <ul class=" divide-y mt-8">
                                    @foreach ($recipe->instructions->sortBy('step') as $instruction)
                                    <li class="flex pb-6 pt-4">
                                        <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">{{$instruction->step}}</span>
                                        <p>{{$instruction->name}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                                @if ($recipe->tips->count() > 0)
                                    <div class="mt-12">
                                        <h2 class="text-4xl font-bold mb-4 text-red-700">
                                            ¡Tips!
                                        </h2>
                                        <div class="text-gray-600">
                                            @foreach ($recipe->tips as $tip)
                                                <p class="mb-4"> <i class="fas fa-check mr-2"></i> {{$tip->name}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if ($recipe->video)
                                    <div class="mt-12">                                     
                                        <div style="">
                                            {!! $recipe->video->iframe !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>
                   <hr class="my-12">
              </div>
          </div>
    </div>
    @push('scripts')
        <script src="https://player.vimeo.com/api/player.js"></script>
    @endpush
</section>
