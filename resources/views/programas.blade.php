<x-app-layout>
    <section class="bg-fixed bg-cover" style="background-image: url({{asset('img/backgrounds/bg_red.jpg')}})">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 flex relative overflow-hidden">
            <div class=" my-16">
                <header class="">
                    <h1 class="text-gray-50 leading-none font-black text-2xl md:text-5xl">Mis Programas y Cursos de la <strong>Dieta <span class="text-red-700">Keto</span> Perfecta</strong></h1>
                    <p class="text-gray-50 mt-4 mb-4 md:text-xl">Descubre las diferentes maneras que te ofrezco para ayudarte a bajar de peso y mejorar tu salud con la Dieta Keto</p>
                </header>
            </div>
        </div>
    </section>
    <section class="py-12 md:py-24 bg-gray-50">
        <div class="max-w-5xl mx-auto px-6 md:px-0">
            <div class="grid grid-cols-1 gap-x-4 gap-y-2 grid-rows-1 md:grid-cols-2 md:gap-x-24 md:gap-y-4">

                <a href="{{route('dkp')}}" class="block mb-6 p-4 rounded-lg shadow-xs bg-gray-900">
                    <div class="flex flex-col md:flex-row items-center h-full">
                        <figure class=" h-56 w-full md:w-40 md:h-40 object-cover  overflow-hidden rounded-xl">
                            <img src="{{asset('img/resources/covers/recurso_01.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">

                            <h2 class="text-2xl text-gray-50 font-semibold my-1 flex-1 leading-5">Método DKP</h2>
                            <p class="text-gray-500">Dieta Keto Perfecta</p>
                            <button class="bg-red-700 text-white border font-bold border-red-700 text-xs rounded-full mt-4 py-2 uppercase transition ease-in-out duration-300 hover:bg-transparent hover:text-red-700" >Más Información</button>
                        </div>
                    </div>
                </a>
                <a href="https://ketobayter.com/cursos" class="block mb-6 p-4 rounded-lg shadow-xs bg-gray-900">
                    <div class="flex flex-col md:flex-row items-center h-full">
                        <figure class=" h-56 w-full md:w-40 md:h-40 object-cover  overflow-hidden rounded-xl">
                            <img src="{{asset('img/resources/covers/recurso_03.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">

                            <h2 class="text-2xl text-gray-50 font-semibold my-1 flex-1 leading-5">Cursos Keto</h2>
                            <p class="text-gray-500">Aprende a tu ritmo</p>
                            <button class="bg-red-700 text-white border font-bold border-red-700 text-xs rounded-full mt-4 py-2 uppercase transition ease-in-out duration-300 hover:bg-transparent hover:text-red-700" >Más Información</button>
                        </div>
                    </div>
                </a>

                <a href="{{route('cita')}}" class="block mb-6 p-4 rounded-lg shadow-xs bg-gray-900">
                    <div class="flex flex-col md:flex-row items-center h-full">
                        <figure class=" h-56 w-full md:w-40 md:h-40 object-cover  overflow-hidden rounded-xl">
                            <img src="{{asset('img/resources/covers/recurso_02.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">

                            <h2 class="text-2xl text-gray-50 font-semibold my-1 flex-1 leading-5">Consulta Virtual</h2>
                            <p class="text-gray-500">Hablemos uno a uno</p>
                            <button class="bg-red-700 text-white border font-bold border-red-700 text-xs rounded-full mt-4 py-2 uppercase transition ease-in-out duration-300 hover:bg-transparent hover:text-red-700" >Más Información</button>
                        </div>
                    </div>
                </a>

                <a href="{{route('selecto')}}" class="block mb-6 p-4 rounded-lg shadow-xs bg-gray-900">
                    <div class="flex flex-col md:flex-row items-center h-full">
                        <figure class=" h-56 w-full md:w-40 md:h-40 object-cover  overflow-hidden rounded-xl">
                            <img src="{{asset('img/resources/covers/recurso_06.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">

                            <h2 class="text-2xl text-gray-50 font-semibold my-1 flex-1 leading-5">Grupo Selecto</h2>
                            <p class="text-gray-500">Para los que quieren más</p>
                            <button class="bg-red-700 text-white border font-bold border-red-700 text-xs rounded-full mt-4 py-2 uppercase transition ease-in-out duration-300 hover:bg-transparent hover:text-red-700" >Adquierelo aquí</button>
                        </div>
                    </div>
                </a>

                <a  class="block mb-6 p-4 rounded-lg shadow-xs bg-gray-900">
                    <div class="flex flex-col md:flex-row items-center h-full">
                        <figure class=" h-56 w-full md:w-40 md:h-40 object-cover  overflow-hidden rounded-xl">
                            <img src="{{asset('img/resources/covers/recurso_05.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">

                            <h2 class="text-2xl text-gray-50 font-semibold my-1 flex-1 leading-5">Eventos Virtuales</h2>
                            <p class="text-gray-500">Aprende de la mejor manera</p>
                            <button class="bg-red-700 text-white border font-bold border-red-700 text-xs rounded-full mt-4 py-2 uppercase transition ease-in-out duration-300 hover:bg-transparent hover:text-red-700" >Próximamente</button>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>
</x-app-layout>
