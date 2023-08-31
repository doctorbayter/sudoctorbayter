<div x-cloak class=" sticky inset-x-0 top-0 left-0 flex h-screen overflow-hidden md:overflow-visible md:w-auto" :class="{'w-5/12': openMenu, 'w-1/12': !openMenu}" style="height: calc(100vh - 65px) z-10" x-on:click.away="openMenu = false">
    <div  class="flex flex-col w-full pt-8 md:w-72 text-gray-700 bg-gray-100 dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" >

        <div class="md:hidden text-left flex"  x-on:click="openMenu = !openMenu" >
            <i :class="{'fa-arrow-alt-circle-left': openMenu, 'fa-arrow-alt-circle-right': !openMenu}" class="px-2 fas  text-xl text-red-700 mb-4" title="Abrir menú"></i>
            <span class="text-gray-900 font-bold whitespace-nowrap text-sm">Cerrar Menú</span>
        </div>

        <nav  class="flex-grow md:block md:px-4 pb-4 md:pb-0 md:overflow-y-auto">

        @if (auth()->user()->fases->whereIn('id', [1, 2, 3, 4])->sortBy('id')->count() >0)
            <div :class="{'block': openMenu, 'hidden': !openMenu}" class="md:block">
                <button class="flex flex-row items-center w-full px-2 md:px-4 py-2 mt-2 text-base font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-gray-200">
                <span class="text-xs whitespace-nowrap">Método DKP</span>
                </button>
            </div>
            <div>
                @foreach (auth()->user()->fases->whereIn('id', [1, 2, 3, 4])->sortBy('id') as $fase)

                    <a href="{{route('plan.fase', $fase)}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm  text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline uppercase font-medium" title="Entra a {{$fase->name}} " >
                        <i class=" text-lg fas fa-layer-group mr-2"></i>
                        <div class="flex-1 whitespace-nowrap"> <b >{!!$fase->sub_name!!}</b></div>
                    </a>

                @endforeach
            </div>
        @endif

        @if (auth()->user()->subscriptions->whereIn('plan_id', [23, 24, 27])->first() )

        <div class="md:mt-12">
            <div :class="{'block': openMenu, 'hidden': !openMenu}" class="md:block">
                <button class="flex flex-row items-center w-full px-2 md:px-4 py-2 mt-2 text-base font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-gray-200">
                <span class="text-xs whitespace-nowrap">Deporte</span>
                </button>
            </div>
            <div>
                <a href="{{route('plan.fitness')}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm  text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline uppercase font-medium" title="Entra a Total Fitness " >
                    <i class=" text-lg fas fa-dumbbell mr-2"></i>
                    <div class="flex-1 whitespace-nowrap"> <b >Total Fitness</b></div>
                </a>

            </div>
        </div>
        @endif

        @if (auth()->user()->fases->whereIn('id', [5, 7])->sortBy('id')->count()>0)
        <div class="md:mt-12">
            <div :class="{'block': openMenu, 'hidden': !openMenu}" class="md:block">
                <button class="flex flex-row items-center w-full px-2 md:px-4 py-2 mt-2 text-base font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-gray-200">
                <span class="text-xs whitespace-nowrap">Adicionales</span>
                </button>
            </div>
            <div>
                @foreach (auth()->user()->fases->whereIn('id', [5, 7])->sortBy('id') as $adicional)

                    <a href="{{route('plan.fase', $adicional)}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm  text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline uppercase font-medium" title="Entra a {{$adicional->name}} " >
                        <i class=" text-lg fas fa-bullseye mr-2"></i>
                        <div class="flex-1 whitespace-nowrap"> <b >{!!$adicional->sub_name!!}</b></div>
                    </a>
                @endforeach
            </div>
        </div>
        @endif



        @if (auth()->user()->fases->whereNotIn('id', [1, 2, 3, 4, 5, 7, 9])->sortBy('id')->count() >0)
            <div class="md:mt-12">
                <div :class="{'block': openMenu, 'hidden': !openMenu}" class="md:block">
                    <button class="flex flex-row items-center w-full px-2 md:px-4 py-2 mt-2 text-base font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-gray-200">
                    <span class="text-xs whitespace-nowrap">Retos</span>
                    </button>
                </div>
                <div>
                    @foreach (auth()->user()->fases->whereNotIn('id', [1, 2, 3, 4, 5, 7, 8, 9, 10, 11, 13, 14, 15, 16])->sortBy('id') as $reto)

                        <a href="{{route('plan.fase', $reto)}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm  text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline uppercase font-medium" title="Entra a {{$reto->name}} " >
                            <i class=" text-lg fas fa-bullseye mr-2"></i>
                            <div class="flex-1 whitespace-nowrap"> <b >{!!$reto->sub_name!!}</b></div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if ($userPlan != 7 && $userPlan != 13 && $userPlan != 18 && $userPlan != 19 && $userPlan != 36 && $userPlan != 47 && $userPlan != 49 && $userPlan != 50 && $userPlan != 51)
            <div class="md:mt-12">
                <div :class="{'block': openMenu, 'hidden': !openMenu}" class="md:block">
                    <button class="flex flex-row items-center w-full px-2 md:px-4 py-2 mt-2 text-base font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-700 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-gray-200">
                    <span class="text-xs">Extras</span>
                </button>
                </div>

                <a href="{{route('plan.bebidas')}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm font-mediu text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                    <i class=" text-lg fas fa-cocktail mr-2"></i>
                    <span class="whitespace-nowrap">Bebidas Keto</span>
                </a>
                <a href="{{route('plan.salsas')}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm font-medium text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                    <i class=" text-lg fas fa-coffee mr-2"></i>
                    <span>Salsitas</span>
                </a>

                <a href="{{route('plan.snacks')}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm font-medium text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                    <i class=" text-lg fas fa-cookie-bite mr-2"></i>
                    <span>Snacks</span>
                </a>
            </div>

            <div class="md:mt-12">
                <div :class="{'block': openMenu, 'hidden': !openMenu}" class="md:block">
                    <button class="flex flex-row items-center w-full px-2 md:px-4 py-2 mt-2 text-base font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-700 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-gray-200">
                    <span class="text-xs">Seguimiento</span>
                </button>
                </div>

                <a href="{{route('plan.whatsapp')}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm font-medium text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                    <i class=" text-lg fab fa-whatsapp-square mr-2"></i>
                    <span>Whatsapp</span>
                </a>

                <a href="{{route('cita')}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm font-mediu text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                    <i class=" text-lg fas fa-calendar-alt mr-2"></i>
                    <span class="whitespace-nowrap">Cita Virtual</span>
                </a>
            </div>
        @endif

        <div class="md:mt-12">
            <div :class="{'block': openMenu, 'hidden': !openMenu}" class="md:block">
                <button class="flex flex-row items-center w-full px-2 md:px-4 py-2 mt-2 text-base font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block hover:text-gray-700 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-gray-200">
                <span class="text-xs">Información</span>
            </button>
            </div>

                <a href="{{route('plan.tutorial')}}" class="flex px-2 md:px-4 py-2 mt-2 text-sm font-medium text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                    <i class=" text-lg fas fa-exclamation-circle mr-2"></i>
                    <span>Tutoriales</span>
                </a>

            @if ($userPlan != 7 && $userPlan != 13 && $userPlan != 18 && $userPlan != 19 && $userPlan != 36 && $userPlan != 47 && $userPlan != 49 && $userPlan != 50 && $userPlan != 51)
                <a href="https://wa.me/573012579627" target="_blank" class="flex px-2 md:px-4 py-2 mt-2 text-sm font-medium text-gray-700 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-700 focus:text-gray-700 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                    <i class=" text-lg fas fa-question-circle mr-2"></i>
                    <span>Soporte</span>
                </a>
            @endif

        </div>
      </nav>
    </div>
    @push('style')
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    @endpush
</div>
