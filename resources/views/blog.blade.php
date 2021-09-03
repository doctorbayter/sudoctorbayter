<x-app-layout>
    <section class="bg-fixed bg-cover" style="background-image: url({{asset('img/backgrounds/hero.jpg')}})">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 flex relative overflow-hidden">
            <div class=" my-16">
                <header class="">
                    <h1 class="text-gray-900 leading-none font-black text-2xl md:text-5xl">Bienvenido mi <strong>blog <span class="text-red-700">Keto</span></strong> </h1>
                    <p class="text-gray-900 mt-8 mb-4 md:text-xl">Aprende algo nuevo sobre la dieta keto todas las semanas. Articulos cientificos, Tips y Secretos de la Dieta Keto Perfecta.</p>
                </header>
            </div>
        </div>
    </section>
    <section class="py-12 md:py-24 bg-white">
        <div class="max-w-5xl mx-auto px-6 md:px-0">
            <div class="grid grid-cols-1 gap-x-4 grid-rows-1 md:grid-cols-3 md:gap-x-8">

                <a href="{{route('blog.uno')}}" class="block mb-6 md:col-span-3 md:mb-10 border border-gray-200 rounded-xl">
                    <div class="flex flex-col md:flex-row overflow-hidden rounded-xl bg-gray-50 shadow-xs h-full">
                        <figure class="flex-1 h-96">
                            <img src="{{asset('img/blog/heros/que-comer.jpg')}}" alt="" class=" object-cover w-full my-auto">
                        </figure>
                        <div class="px-6 py-8  flex flex-col md:w-2/6 ">
                            <span class="uppercase text-xs font-medium text-gray-500">Tips</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 md:text-3xl">Qué comer y qué evitar en una dieta cetogénica</h2>
                            <small class="text-gray-500">Mayo 09, 2021</small>
                        </div>
                    </div>
                </a>

                <a href="{{route('blog.dos')}}" class="block mb-6 border border-gray-200 rounded-xl">
                    <div class="flex flex-col overflow-hidden rounded-xl bg-gray-50 shadow-xs h-full">
                        <figure class="">
                            <img src="{{asset('img/blog/heros/beneficios-dieta-cetogenica.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">
                            <span class="uppercase text-xs font-medium text-gray-500">Salud</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5">5 beneficios que no conocías de la dieta cetogénica</h2>
                            <small class="text-gray-500">Mayo 14, 2021</small>
                        </div>
                    </div>
                </a>
                <a href="{{route('blog.tres')}}" class="block mb-6 border border-gray-200 rounded-xl">
                    <div class="flex flex-col overflow-hidden rounded-xl bg-gray-50 shadow-xs h-full">
                        <figure class="">
                            <img src="{{asset('img/blog/heros/como_saber_si_estoy_en_cetosis.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">
                            <span class="uppercase text-xs font-medium text-gray-500">Tips</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5">Cómo saber si estás en cetosis</h2>
                            <small class="text-gray-500">Mayo 18, 2021</small>
                        </div>
                    </div>
                </a>
                <a href="#" class="block mb-6 border border-gray-200 rounded-xl hidden">
                    <div class="flex flex-col overflow-hidden rounded-xl bg-gray-50 shadow-xs h-full">
                        <figure class="">
                            <img src="{{asset('img/blog/heros/efectos_secundarios.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">
                            <span class="uppercase text-xs font-medium text-gray-500">Tips</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5">Efectos secundarios de una dieta keto</h2>
                            <small class="text-gray-500">Mayo 19, 2021</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
