<x-app-layout>
    <div class="flex">
        <x-menu :fases="auth()->user()->subscription->plan->fases" />
        <div class="w-full bg-white">

            <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
                <div class="w-10/12 mx-auto py-10">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Listado de</h3>
                    <h2 class=" font-bold text-6xl">Salsitas <span class="text-red-700">Keto</span></h2>
                </div>
            </header>  

            <section class="bg-gradient-to-t from-gray-100 pb-14 ">
                <div class="w-10/12 mx-auto my-10" x-data="{selected:1}">
                    <section class="mt-16">
                        <div class="grid grid-cols-3 gap-x-8 gap-y-12">
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_01.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">MAYONESA CASERA</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">2gr Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_02.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">SALSA RANCHERA</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">2gr Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_03.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">SALSA CHIMOCHIRRI</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0,24g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_04.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">SALSA DE AGUACATE</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0,24g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_05.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">VINAGRETA ITALIANA</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0,24g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_06.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">SALSA DE QUESO</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0,24g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_07.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">SALSA CREMOSA DE QUESO</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0,24g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_08.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">SALSA PICANTE</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0,24g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <div class="relative h-62"> 
                                        <img src="{{Storage::url('recipes/salsa_09.jpg')}}" alt="" class="rounded-2xl object-cover">
                                    </div>
                                    <div class="mt-2 ml-4">
                                        <p class="text-2xl mb-2 font-bold text-gray-900">GUACAMOLE</p>
                                        <div class="flex text-xs items-center">
                                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0,24g Carbs.</p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>1 porción</span>
                                        </p>
                                        <p class="text-gray-400 ml-2 flex items-center">
                                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                            <span>7 minutos</span>
                                        </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>