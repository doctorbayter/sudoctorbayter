<div x-data="{ openMenu: false }" >
    <div class="flex">
        @can('enrolled', auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->first())
            <x-menu :userPlan="$user_plan" />
            <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="w-11/12 bg-white">

                <section class="bg-gradient-to-t from-gray-100 " style="height: 100%">
                    <div class="w-10/12 sm:w-7/12 mx-auto py-10 ">

                        <section class="mb-4">
                            <header class="">
                                <p class="mb-8">¡Hola <b>{{auth()->user()->name}}</b>! Te damos la bienvenida</p>
                                <div class="text-center flex flex-col items-center sm:flex-row bg-gradient-to-t from-gray-400 to-gray-100 pt-8 sm:pt-0 overflow-hidden rounded-xl">
                                    <div class="sm:w-8/12 sm:text-left sm:pl-8">
                                        <h2 class="text-xl sm:text-4xl font-bold text-gray-900 mb-4 px-4 sm:px-0">¡Te presentamos la mejor plataforma <span class="text-red-700">Keto Pefecta</span> en Español!</h2>
                                        <p class="text-sm sm:text-base px-12 sm:px-0 mb-4">"Si de verdad anhelas recuperar tu salud y revertir tu enfermedad. debes estar dispuesto a dejar atrás lo que te enfermó."</p>
                                        <small><b>-Tu Doctor Bayter</b></small>
                                    </div>

                                    <figure class="block flex-1">
                                        <!-- Imagen para dispositivos móviles -->
                                        <img src="{{asset('img/photos/dr_002.png')}}" alt="Descripción de la imagen" class="block sm:hidden">
                                        <!-- Imagen para tablets hacia arriba -->
                                        <img src="{{asset('img/photos/dr_001.png')}}" alt="Descripción de la imagen" class="hidden sm:block ">
                                    </figure>
                                </div>
                                <div class="flex flex-col items-center justify-center sm:hidden">
                                    <div class="text-center">
                                        <p class="mt-4 text-lg font-semibold">Desliza para ver tu contenido</p>
                                        <div class="animate-bounce-vertical">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </header>
                            @if ($user_fases->count() > 0)
                                <div class="mt-8"><h2 class="text-4xl font-bold text-gray-900">Tus Productos</h2></div>
                                <section class="grid md:grid-cols-2 gap-12  max-w-screen-md my-8">
                                    <article class="hover:opacity-90 overflow-hidden rounded-xl shadow-xl">
                                        <a href="{{route('plan.dkp')}}">
                                            <img src="{{asset('img/billboards/metodo_dkp_lg.jpg')}}" alt="">
                                        </a>
                                        <a href="{{route('plan.dkp')}}">
                                            <span class="w-full text-center rounded-b-xl block text-xl font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">INGRESA AL MÉTODO DKP AQUÍ</span>
                                        </a> 
                                    </article>
                                    <article class="hover:opacity-90 overflow-hidden rounded-xl shadow-x">
                                        @if (auth()->user()->subscriptions->whereIn('plan_id', [23, 24, 27])->first())
                                            <a href="{{route('plan.fitness')}}">
                                                <img src="{{asset('img/billboards/total_fitness_lg.jpg')}}" alt="">
                                                <a href="{{route('plan.fitness')}}">
                                                    <span class="w-full text-center rounded-b-xl block text-xl font-bold px-4 py-2 border bg-yellow-700 border-yellow-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-yellow-700">INGRESA A TOTAL FITNESS AQUÍ</span>
                                                </a> 
                                            </a>
                                        @elseif (auth()->user()->subscriptions->whereIn('plan_id', [1,2,3,8,9,10,15,16,25,27,31,32,37,38,39,40,48,54])->sortBy('plan_id')->first()) 
                                        <a href="{{route('payment.checkout', $thf_plan)}}" target="_blank">
                                            <img src="{{asset('img/billboards/no_total_fitness_lg.jpg')}}" alt="">
                                        </a>
                                        @endif
                                    </article>
                                </section>
                            @endif
                        </section>

                        <hr class="my-8">
                     
                        @if ($user_retos->count() > 0)
                            <div>
                                <header>
                                    <h2 class="text-4xl font-bold text-gray-900">Tus Retos</h2>
                                    <p class="mt-2">Recuerda que tendrás acceso al contenido de los retos durante los siguientes 45 días después que termina el reto.</p>
                                </header>
                                
                                <section class="">
                                    <div class="grid grid-cols-1 xl:grid-cols-2  gap-8 pt-8">

                                        @foreach($user_retos as $reto)
                                            <a href="{{route('plan.fase', $reto)}}" class=" px-8 py-12 shadow-sm rounded-lg bg-yellow-400 hover:bg-yellow-500 text-gray-900 transition-all ease-in-out">
                                                <div>
                                                    <small class="mb-2 text-base"> Reto {{$reto->name}}</small>
                                                    <h2 class="text-3xl lg:text-4xl font-semibold mb-2">{!!$reto->sub_name!!}</h2>
                                                    <p>{{$reto->descripcion}}</p>
                                                    <span class="rounded-full inline-block mt-2 text-lg font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">INGRESA AL RETO AQUÍ</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </section>
                            </div>
                            <hr class="my-8">
                        @endif

                        @if ($user_adicionales->count() > 0)
                            <div class="">
                                <header>
                                    <h2 class="text-4xl font-bold text-gray-900">Más Contenido</h2>
                                </header>
                                <section class="">

                                    <div class="grid grid-cols-1 xl:grid-cols-2  gap-8 pt-8">

                                        @forelse($user_adicionales as $adicional)
                                            <a href="{{route('plan.fase', $adicional)}}" class=" px-8 py-12 shadow-sm rounded-lg  bg-gradient-to-t from-gray-900 to-gray-400 hover:bg-gray-500 text-gray-900 transition-all ease-in-out">
                                                <div class="text-gray-50">
                                                    <small class="mb-2 text-base"> Entra aquí a</small>
                                                    <h2 class="text-3xl lg:text-4xl font-semibold mb-2 text-black">{!!$adicional->sub_name!!}</h2>
                                                    <p>{{$adicional->descripcion}}</p>
                                                    <span class="rounded-full inline-block mt-2 text-lg font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:border-gray-200 hover:text-gray-100">INGRESA AQUÍ</span>
                                                </div>
                                            </a>
                                        @empty

                                        @endforelse
                                    </div>
                                </section>
                            </div>
                            <hr class="my-8">
                        @endif
                    </div>
                </section>
            </div>
        @else
            @php
               return redirect()->route('dkp')
            @endphp
        @endcan
    </div>

    @push('scriptsHead')
        @if (auth()->user()->subscriptions->count() == 1 && auth()->user()->subscription->plan->id == 7)
            <script type="text/javascript">
                window.location.href = "{{ url('/plan/fase/7-dias-keto') }}";
            </script>
        @endif
    @endpush
    @push('styles')
        <style>
            
        </style>
    @endpush

</div>
