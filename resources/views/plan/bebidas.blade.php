<x-app-layout>
    <div class="flex">
        <x-menu :fases="auth()->user()->subscription->plan->fases" />
        <div class="w-full bg-white">

            <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
                <div class="w-10/12 mx-auto py-10">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Listado de</h3>
                    <h2 class=" font-bold text-6xl">Bebidas <span class="text-red-700">Keto</span></h2>

                </div>

            </header>  

            <section class="bg-gradient-to-t from-gray-100 pb-14 ">
                <div class="w-10/12 mx-auto my-10" x-data="{selected:1}">
                    <section class="mt-16">
                        <div class="grid grid-cols-3 gap-x-8 gap-y-12">
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_01.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">SHOT BAYTER</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">1g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_02.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">REFRESCANTE DE HIERBABUENA</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">13,25g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>10 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_03.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">REFRESCANTE DE PEPINO</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">2 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_04.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">REFRESCANTE DE SIDRA</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">3,8 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_05.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">REFRESCANTE DE APIO</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">5,1 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_06.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">INFUSIÓN DE MANZANILLA</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">1 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_07.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">INFUSIÓN DE CIDRÓN</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">1 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_08.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">TÉ DE TORONJÍL</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">1 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_09.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">TÉ DE VALRIANA</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">1 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_10.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">TÉ DE TILA</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">1 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_11.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">CAFÉ</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">1 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_12.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">TEKIBAYTER</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">3,26 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/bebida_13.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">MARTINI BAYTER</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">2,05 Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 persona</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>5 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>