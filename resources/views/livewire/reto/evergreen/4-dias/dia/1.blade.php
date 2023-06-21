<x-app-layout>
    <div class="flex">
    <div class="bg-white  ml-auto w-full">
        <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
            <div class="w-7/12 mx-auto py-10">
                <h3 class="font-bold text-white text-lg md:text-xl px-2 inline-block bg-red-700"> Reto 4 días</h3>
                <h2 class=" font-bold text-3xl md:text-6xl">Reto 4 </h2>
                <p class="text-base text-gray-600 mt-2">Desinflama tu cuerpo en 4 días</p>
                <section class=" flex items-center flex-col md:flex-row mt-4 ">
                    <a  href="/" target="_blank" class="text-white text-xs mt-4 md:mt-0 md:text-sm xl:text-base border cursor-pointer border-red-700 bg-red-700 hover:text-red-800 hover:bg-white inline-block font-bold px-6 py-2 rounded-full">Descargar lista de alimentos del reto</a>
                </section>
            </div>
        </header>
        <div class="flex flex-col space-y-4 min-w-screen py-16 animated fadeIn faster  justify-center items-center outline-none focus:outline-none bg-gray-900">
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
                            <p class="text-sm text-gray-600 leading-none mt-1">El reto <b>EMPAREJA2 2023</b> Dará inicio el <b>13 de Junio de 2023</b></p>
                            <p class="text-sm text-gray-600 leading-none mt-1">por ahora puedes ingresar a <a class="text-white text-sm border cursor-pointer border-red-700 bg-red-700 hover:text-red-800 hover:bg-white inline-block font-bold px-4 py-2 rounded-full" href="https://doctorbayter.com/reto/empareja2/whatsapp" target="_blank" rel="noopener noreferrer"><b>El grupo de Whatsapp</b></a> Dirigido por <b>El Equipo de Tu Doctor Bayter</b></p>
                            <p class="text-sm text-gray-600 leading-none mt-1">Recurda que: <b>Toda la información del reto quedará activa el día viernes 9 de junio 2023 (Recetas, Lista de alimentos y Secretos)</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="bg-gradient-to-t from-gray-100 pb-8 md:pb-14 ">
            <div class="w-7/12 mx-auto my-10" x-data="{selected:0}">
                <section class="mt-8 mb-20">
                    <div class="grid grid-cols-1 text-center">
                        <div class="border border-gray-100 font-bold cursor-pointer bg-gray-50 rounded-tl-md relative">
                            <div class="text-red-700 border-b-4 text-xs md:text-base py-3 md:py-4  hover:text-red-700" @click="selected = 0" x-bind:class="{ 'bg-red-800 border-gray-700   ': selected == 0, 'border-gray-300 ': selected !== 0 }">
                                <img src="{{asset('img/icons/gfx/calendar_color.svg')}}" alt="" class="w-3 md:w-5 mr-2 inline">
                                <span x-bind:class="{ ' text-gray-50  ': selected == 0, 'text-red-700': selected !== 0 }">
                                    Semana Uno
                                </span>
                            </div>
                                <div>
                                    <a href="/" target="_blank" class=" font-semibold md:font-bold md:text-sm text-xs py-2 w-full block text-white bg-gray-900" >
                                        <span class="hidden md:inline">Descargar lista de alimentos</span>
                                        <span class="md:hidden">Lista alimentos</span>
                                    </a>
                                </div>
                            <div class="grid overflow-hidden h-0 md:h-auto grid-cols-4 text-center shadow-md  absolute w-full " >
                                <div class="font-semibold text-xs bg-red-700 text-red-100 cursor-default py-2"><span class="hidden md:block xl:inline">Día 1</div>
                                <div class="font-semibold text-xs bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2"><span class="hidden md:block xl:inline"><a href="">Día 2</a></div>
                                <div class="border-l border-gray-400 font-semibold text-xs bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2"><span class="hidden md:block xl:inline"><a href="">Día 3</a></div>
                                <div class="border-l border-gray-400 font-semibold text-xs bg-gray-50  hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2"><span class="hidden md:block xl:inline"><a href="">Día 4</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="w-10/12 grid md:hidden overflow-hidden grid-cols-4 text-center shadow-md absolute " >
                        <div class="font-semibold text-xs  bg-red-700 text-red-100 cursor-default py-2 "><span class="hidden md:inline">Día</span> 1</div>
                        <div class="font-semibold text-xs  bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2 "><a href=""><span class="hidden md:inline">Día</span> 2</a></div>
                        <div class="font-semibold text-xs  bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2 "><a href=""><span class="hidden md:inline">Día</span> 3</a></div>
                        <div class="font-semibold text-xs  bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2 "><a href=""><span class="hidden md:inline">Día</span> 4</a></div>
                    </div>     
                </section>
                <section class="mt-16 w-full">
                    <header class="md:mb-12">
                        <h2 class="text-3xl md:text-5xl font-bold">Menú <span class="text-red-700">Día 1</span></h2>
                        <p class="mb-4 text-gray-500"><img src="{{asset('img/icons/gfx/pie-chart.svg')}}" alt="" class="w-4 mr-1 inline opacity-40">Gramos de carbohidratos día <b>0</b></p>
                    </header>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-10 divide-y-2 md:divide-y-0 ">
                        <div class="pt-12 md:pt-0">
                            <a href="{{route('reto4.dia1')}}">
                                <div class="relative h-62">
                                    <div class="absolute text-sm bg-gray-100 bottom-full px-4 py-2 font-bold leading-none text-gray-900  rounded-t-lg ml-2 "><p>Desayuno</p></div>
                                    <img src="{{asset('img/')}}" alt="" class="rounded-2xl object-cover">
                                </div>
                                <div class="mt-2 ml-4">
                                    <p class="text-2xl mb-2 font-bold text-gray-900">Nombre Receta</p>
                                    <div class="flex md:flex-col xl:flex-row md:items-start  text-xs items-center xl:items-center">
                                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0 Carbs.</p>
                                    <p class="text-gray-400 ml-2 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>1 persona</span>                                                
                                    </p>
                                    <p class="text-gray-400 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>10 minutos</span>
                                    </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="pt-12 md:pt-0">
                            <a href="{{route('reto4.dia1')}}">
                                <div class="relative h-62">
                                    <div class="absolute text-sm bg-gray-100 bottom-full px-4 py-2 font-bold leading-none text-gray-900  rounded-t-lg ml-2 "><p>Almuerzo</p></div>
                                    <img src="{{asset('img/')}}" alt="" class="rounded-2xl object-cover">
                                </div>
                                <div class="mt-2 ml-4">
                                    <p class="text-2xl mb-2 font-bold text-gray-900">Nombre Receta</p>
                                    <div class="flex md:flex-col xl:flex-row md:items-start  text-xs items-center xl:items-center">
                                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0 Carbs.</p>
                                    <p class="text-gray-400 ml-2 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>1 persona</span>                                                
                                    </p>
                                    <p class="text-gray-400 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>10 minutos</span>
                                    </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="pt-12 md:pt-0">
                            <a href="{{route('reto4.dia1')}}">
                                <div class="relative h-62">
                                    <div class="absolute text-sm bg-gray-100 bottom-full px-4 py-2 font-bold leading-none text-gray-900  rounded-t-lg ml-2 "><p>Cena</p></div>
                                    <img src="{{asset('img/')}}" alt="" class="rounded-2xl object-cover">
                                </div>
                                <div class="mt-2 ml-4">
                                    <p class="text-2xl mb-2 font-bold text-gray-900">Nombre Receta</p>
                                    <div class="flex md:flex-col xl:flex-row md:items-start  text-xs items-center xl:items-center">
                                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0 Carbs.</p>
                                    <p class="text-gray-400 ml-2 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>1 persona</span>                                                
                                    </p>
                                    <p class="text-gray-400 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>10 minutos</span>
                                    </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr class="my-12">
                    <div class="flex flex-col xl:flex-row" x-data="{ modalIsShowing: false }" >
                        <div class=" flex-1 hidden">
                            <h2 class="text-4xl font-bold mb-4 text-red-700">¡Notas!</h2>
                            <div class="text-gray-600">
                                <p>Notas</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative w-full mt-8 h-52 md:h-96 xl:min-h-video video-iframe">
                        Video
                    </div>
                </section>
            </div>
        </section>
    </div>
    </div>
    @push('style')
        <style>
            [x-cloak] {
                display: none !important;
            }

            .modal {
                transition: opacity 0.25s ease;
            }
            body.modal-active {
                overflow-x: hidden;
                overflow-y: visible !important;
            }
            .video-iframe iframe{
                width: 100%;
                height: 100%;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://player.vimeo.com/api/player.js"></script>
    @endpush
</x-app-layout>