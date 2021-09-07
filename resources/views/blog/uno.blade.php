<x-app-layout>
    <section class="py-12 md:py-24 bg-white">
        <div class="max-w-3xl mx-auto px-6 md:px-0">
            <div class="">
                <div class="py-4  flex flex-col md:w-2/6 ">
                    <span class="uppercase text-sm font-medium text-gray-500">Tips de alimentación</span>
                    <small class="text-gray-500">Mayo 09, 2021</small>
                </div>
                <div>
                    <header>
                        <h2 class="text-lg text-gray-900 font-semibold my-1 md:text-5xl">Qué comer y qué evitar en una dieta cetogénica</h2>
                    </header>
                    <p class="mt-8 text-lg">Hoy te compartimos algunos de los alimentos que podrás disfrutar con un estilo de vida cetogénico. Recuerda que aquí contamos carbohidratos netos por 100 gramos de comida, y que tu plato debe estar constituido por 75% grasa, 20% proteína y 5% carbohidrato.</p>
                </div>

                <div class="my-8">
                    <figure class="h-48 md:h-96 block">
                        <img src="{{asset('img/blog/heros/que-comer.jpg')}}" alt="" class=" object-cover w-full my-auto block">
                    </figure>
                </div>

                <div>
                    <p class="mt-16 text-lg">El objetivo general que debes tener, es alcanzar el estado de cetosis. Por eso, contar carbohidratos puede ser útil en un principio, pero si te unes a nuestro programa completo y sigues nuestras recetas, podrás permanecer cetogénico sin tener que contar.</p>
                    <h3 class="text-lg mt-8 text-gray-900 font-semibold my-1 md:text-3xl">¿Qué debes evitar?</h3>
                    <p class="mt-8 text-lg">Alimentos con un alto índice glucémico y que contienen muchos carbohidratos, tanto azucarados como almidonados. El pan, la pasta, el arroz o la papa deben ser evitados (por lo menos, en fase 1).</p>
                    <div class="my-16">
                        <figure class="h-48 md:h-96 block__ hidden">
                            <img src="{{asset('img/blog/heros/post_uno_1.jpg')}}" alt="" class=" object-cover w-full my-auto block">
                        </figure>
                    </div>
                    <p class="mt-8 text-lg">También es importante evitar la ingesta de alimentos procesados, de paquetes y de alimentos que no sean 100% naturales.</p>
                    <p class="mt-8 text-lg">Recuerda que debes optar por tu salud, y que eres lo que comes. Alcanzar tu objetivo sublime significa dejar eso que te gusta para escoger aquello que te conviene.</p>
                    <h3 class="text-lg mt-8 text-gray-900 font-semibold my-1 md:text-3xl">¿Qué puedes beber?</h3>
                    <div class="my-16">
                        <figure class="h-48 md:h-96 block__ hidden">
                            <img src="{{asset('img/blog/heros/post_uno_2.jpg')}}" alt="" class=" object-cover w-full my-auto block">
                        </figure>
                    </div>
                    <p class="mt-8 text-lg">El agua es la bebida perfecta, y el café o el té también están bien. <b>NO USES EDULCORANTES</b></p>
                    <p class="mt-8 text-lg">Si realmente quieres cambiar tu vida y hacerlo PERFECTO, consulta nuestras guías completas sobre alimentos cetogénicos y bebidas cetogénicas.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="max-w-5xl mx-auto px-6 md:px-0">
            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 md:text-3xl">También te puede interesar</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 mt-8">
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
                            <small class="text-gray-500">Mayo 17, 2021</small>
                        </div>
                    </div>
                </a>
                <a href="#" class="block__ mb-6 border border-gray-200 rounded-xl hidden">
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
