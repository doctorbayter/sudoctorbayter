<x-app-layout>
    <div class="flex">
    <div class="bg-white  ml-auto w-full">
        <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
            <div class="w-7/12 mx-auto py-10">
                <h3 class="font-bold text-white text-lg md:text-xl px-2 inline-block bg-red-700"> Reto 4 días</h3>
                <h2 class=" font-bold text-3xl md:text-6xl">Reto 4 </h2>
                <p class="text-base text-gray-600 mt-2">Desinflama tu cuerpo en 4 días</p>
                <section class=" flex items-center flex-col md:flex-row mt-4 ">
                    <a  href="https://doctorbayter.co/files/masterclass/reto-4/pdf/lista-de-alimentos-reto-4-doctor-bayter.pdf" target="_blank" class="text-white text-xs mt-4 md:mt-0 md:text-sm xl:text-base border cursor-pointer border-red-700 bg-red-700 hover:text-red-800 hover:bg-white inline-block font-bold px-6 py-2 rounded-full">Descargar lista de alimentos del reto</a>
                </section>
            </div>
        </header>
       
        <section class="bg-gradient-to-t from-gray-100 pb-8 md:pb-14 ">
            <div class="w-10/12 md:w-7/12 mx-auto my-10" x-data="{selected:0}">
                <section class="mt-8 mb-20">
                    <div class="grid grid-cols-1 text-center">
                        <div class="border border-gray-100 font-bold cursor-pointer bg-gray-50 rounded-tl-md relative">
                            <div class="text-red-700 border-b-4 text-xs md:text-base py-3 md:py-4  hover:text-red-700" @click="selected = 0" x-bind:class="{ 'bg-red-800 border-gray-700   ': selected == 0, 'border-gray-300 ': selected !== 0 }">
                                <img src="{{asset('img/icons/gfx/calendar_color.svg')}}" alt="" class="w-3 md:w-5 mr-2 inline">
                                <span x-bind:class="{ ' text-gray-50  ': selected == 0, 'text-red-700': selected !== 0 }">
                                    Recetas día a día del Reto
                                </span>
                            </div>
                                <div>
                                    <a href="https://doctorbayter.co/files/masterclass/reto-4/pdf/lista-de-alimentos-reto-4-doctor-bayter.pdf" target="_blank" class=" font-semibold md:font-bold md:text-sm text-xs py-2 w-full block text-white bg-gray-900" >
                                        <span class="hidden md:inline">Descargar lista de alimentos</span>
                                        <span class="md:hidden">Lista alimentos</span>
                                    </a>
                                </div>
                            <div class="grid overflow-hidden h-0 md:h-auto grid-cols-4 text-center shadow-md  absolute w-full " >
                                
                                <a href="{{route('reto4.dia1')}}"><div class="font-semibold text-xs bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2"><span class="hidden md:block xl:inline">Día 1</span></div></a>
                                <div class="font-semibold text-xs bg-red-700 text-red-100 cursor-default py-2"><span class="hidden md:block xl:inline">Día 2</div>
                                <a href="{{route('reto4.dia3')}}"><div class="border-l border-gray-400 font-semibold text-xs bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2"><span class="hidden md:block xl:inline">Día 3</span></div></a>
                                <a href="{{route('reto4.dia4')}}"><div class="border-l border-gray-400 font-semibold text-xs bg-gray-50  hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2"><span class="hidden md:block xl:inline">Día 4</span></div></a>
                            </div>
                        </div>
                    </div>
                    <div class="w-10/12 grid md:hidden overflow-hidden grid-cols-4 text-center shadow-md absolute " >
                        <a href="{{route('reto4.dia1')}}"><div class="font-semibold text-xs  bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2 "><span class="hidden md:inline">Día</span> 1</div></a>
                        <div class="font-semibold text-xs  bg-red-700 text-red-100 cursor-default py-2 "><span class="hidden md:inline">Día</span> 2</div>
                        <a href="{{route('reto4.dia3')}}"><div class="font-semibold text-xs  bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2 "><span class="hidden md:inline">Día</span> 3</div></a>
                        <a href="{{route('reto4.dia4')}}"><div class="font-semibold text-xs  bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer py-2 "><span class="hidden md:inline">Día</span> 4</div></a>
                    </div>     
                </section>
                <section class="mt-16 w-full">
                    <header class="md:mb-12">
                        <h2 class="text-3xl md:text-5xl font-bold">Menú <span class="text-red-700">Día 2</span></h2>
                        <p class="mb-4 text-gray-500"><img src="{{asset('img/icons/gfx/pie-chart.svg')}}" alt="" class="w-4 mr-1 inline opacity-40">Gramos de carbohidratos día <b>14,42</b></p>
                    </header>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-10 divide-y-2 md:divide-y-0 ">
                        <div class="pt-12 md:pt-0">
                            <a href="{{route('reto4.dia2.desayuno')}}">
                                <div class="relative h-62">
                                    <div class="absolute text-sm bg-gray-100 bottom-full px-4 py-2 font-bold leading-none text-gray-900  rounded-t-lg ml-2 "><p>Desayuno</p></div>
                                    <img src="{{asset('img/recipes/reto4-menu-dia-2-1.jpg')}}" alt="" class="rounded-2xl object-cover">
                                </div>
                                <div class="mt-2 ml-4">
                                    <p class="text-2xl mb-2 font-bold text-gray-900">Espinacas con huevos</p>
                                    <div class="flex md:flex-col xl:flex-row md:items-start  text-xs items-center xl:items-center">
                                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">1,08 Carbs.</p>
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
                            <a href="{{route('reto4.dia2.almuerzo')}}">
                                <div class="relative h-62">
                                    <div class="absolute text-sm bg-gray-100 bottom-full px-4 py-2 font-bold leading-none text-gray-900  rounded-t-lg ml-2 "><p>Almuerzo</p></div>
                                    <img src="{{asset('img/recipes/reto4-menu-dia-2-2.jpg')}}" alt="" class="rounded-2xl object-cover">
                                </div>
                                <div class="mt-2 ml-4">
                                    <p class="text-2xl mb-2 font-bold text-gray-900">Alitas verdosas</p>
                                    <div class="flex md:flex-col xl:flex-row md:items-start  text-xs items-center xl:items-center">
                                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">13,34 Carbs.</p>
                                    <p class="text-gray-400 ml-2 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>1 persona</span>                                                
                                    </p>
                                    <p class="text-gray-400 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>30 minutos</span>
                                    </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="pt-12 md:pt-0">
                            <a href="{{route('reto4.dia2.cena')}}">
                                <div class="relative h-62">
                                    <div class="absolute text-sm bg-gray-100 bottom-full px-4 py-2 font-bold leading-none text-gray-900  rounded-t-lg ml-2 "><p>Cena</p></div>
                                    <img src="{{asset('img/recipes/reto4-menu-dia-2-3.jpg')}}" alt="" class="rounded-2xl object-cover">
                                </div>
                                <div class="mt-2 ml-4">
                                    <p class="text-2xl mb-2 font-bold text-gray-900">Taco de huevo</p>
                                    <div class="flex md:flex-col xl:flex-row md:items-start  text-xs items-center xl:items-center">
                                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0 Carbs.</p>
                                    <p class="text-gray-400 ml-2 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>1 persona</span>                                                
                                    </p>
                                    <p class="text-gray-400 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                        <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                        <span>15 minutos</span>
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
                    <div class="relative w-full mt-8 h-52 md:h-96 xl:min-h-video video-iframe hidden">
                        <iframe src="https://player.vimeo.com/video/885003816?h=f661a6f4c5" style="width:  100%; height: 500px;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>

                    <section>
                        <article class="text-center mt-8 md:mt-12 mx-auto max-w-5xl px-2 ">
                            <a href="https://pay.hotmart.com/R89419188I?off=u0oztc1t&checkoutMode=10" target="_blank"><img src="{{asset('img/billboards/desafio_2024_banner.png')}}" alt="" class="w-full mx-auto overflow-hidden  "></a>
                        </article>
    
                        <div class="max-w-5xl mx-auto grid  bg-zinc-100 bg-white py-8">
    
                            <div class="text-center mb-4">
                                <h2 class="text-3xl md:text-5xl font-bold">Inscríbete al Reto <span class="text-red-700">En Vivo</span></h2>
                                <p class="text-base text-gray-600 mt-2">Inicia 2024 liberandote de la mierda de 2023 con nuestro Desafío 2024 que inicia este próximo 9 de enero de 2024</p>
                            </div>
    
                            <!-- Pricing table -->
                            <div class="pricing-table grid w-full grid-cols-1 rounded-md  p-8 xs:grid-cols-1 xs:gap-4 xs:px-10 lg:grid-cols-2 sm:gap-y-4 sm:gap-x-8 sm:px-8">          
                              <!-- Pricing column 2 -->
                              <div class="pricing-column pricing-column-2 flex flex-col gap-y-5 p-6 border rounded-lg bg-gray-50 mb-6 lg:mb-0">
                                <div class="upper-part flex flex-col gap-y-4">
                                 
                                  
                                  <div class="account-and-description">
                                    <h3 class="font-semibold text-2xl">Reto 4 Gratuito</h3>
                                    <p class="text-sm text-gray-500">Este es el reto que estás haciendo actualmente</p>
                                  </div>
                                  <div class="tier-and-description">
                                    <h2 class="text-4xl font-extrabold">$0</h2>
                                  </div>
                                </div>            
                                <!-- Account features -->
                                <div class="account-features flex flex-col gap-y-1">
                                  <div class="feature flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4 text-green-600">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm text-gray-800">Recetas desayuno, almuerzo y cena por 4 días</p>
                                  </div>
                                  <div class="feature flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4 text-green-600">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm text-gray-800">Lista de alimentos</p>
                                  </div>
                                  <div class="feature flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4 text-green-600">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm text-gray-800">Seguimiento por correo</p>
                                  </div>
                                </div>
                              </div>
                              <style>
                                .active-animation {
                                    background-image: linear-gradient(90deg, red 50%, transparent 50%), linear-gradient(90deg, red 50%, transparent 50%), linear-gradient(0deg, red 50%, transparent 50%), linear-gradient(0deg, red 50%, transparent 50%);
                                    background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
                                    background-size: 15px 2px, 15px 2px, 2px 15px, 2px 15px;
                                    background-position: left top, right bottom, left bottom, right   top;
                                    animation: border-dance 1s infinite linear;
                                }
                                @keyframes border-dance {
                                    0% {
                                    background-position: left top, right bottom, left bottom, right   top;
                                    }
                                    100% {
                                    background-position: left 15px top, right 15px bottom , left bottom 15px , right   top 15px;
                                    }
                                }
        
                            </style>
                              <!-- Pricing column 3 -->
                              <div class="pricing-column pricing-column-3 flex flex-col gap-y-5 rounded-lg bg-red-800 p-6 text-white active-animation">
                                <div class="upper-part flex flex-col gap-y-4">
                                  <div class="flex items-center justify-between">
                                    <div class="account-and-description">
                                        <h3 class="font-semibold text-2xl">Desafío 2024</h3>
                                        <p class="text-sm">Libérate de la mierda de 2023</p>
                                      </div>
                                    <p class="rounded-md bg-red-600 px-2 py-1 text-xs font-bold">Recomendado</p>
                                  </div>
                                  
                                  <div class="tier-and-description">
                                    <h2 class="text-4xl font-extrabold">$10 USD</h2>
                                   
                                  </div>
                                </div>
                                <!-- call to action button -->
                                <a href="https://pay.hotmart.com/R89419188I?off=u0oztc1t&checkoutMode=10" target="_blank" class="cta-button w-full rounded-lg px-6 py-1 bg-white font-semibold text-black cursor-pointer block">Registrate aquí por $10 dólares</a>
                                <!-- Account features -->
                                <div class="account-features flex flex-col gap-y-1">
                                  <div class="feature flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="h-4 w-4 text-green-600">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm">Recetas desayuno, almuerzo y cena por 5 días</p>
                                  </div>
                                  <div class="feature flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="h-4 w-4 text-green-600">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm">Lista de alimentos</p>
                                  </div>
                                  <div class="feature flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="h-4 w-4 text-green-600">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm">Secretos para hacerlo perfecto</p>
                                  </div>
                                  <div class="feature flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="h-4 w-4 text-green-600">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm">Seguimiento por grupo de WhatsApp</p>
                                  </div>
                                  <div class="feature flex items-center gap-x-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="h-4 w-4 text-green-600">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                    <p class="text-sm">1 Reunión Zoom privada grupal con tu Doctor Bayter </p>
                                  </div>
                                </div>
                              </div>
                             
                            </div>
                        </div>
                    </section>

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