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
                        <h2 class="text-lg text-gray-900 font-semibold my-1 md:text-5xl">Cómo saber si estoy en cetosis</h2>
                    </header>
                    <p class="mt-8 text-lg">¿Sabías que puedes medir tu cetosis sin necesitar de un medidor de sangre u orina? Hay síntomas que pueden revelar que estás en cetosis:</p>
                </div>

                <div class="my-8">
                    <figure class="h-48 md:h-96  block">
                        <img src="{{asset('img/blog/heros/como_saber_si_estoy_en_cetosis.jpg')}}" alt="" class=" object-cover w-full my-auto block">
                    </figure>
                </div>

                <div class="mt-24">
                    <p class="mt-8 text-lg"><b>1. Aumento de la sed:</b> Es posible que te sientas con sed ¡todo el tiempo! Recuerda que nuestro recomendado son mínimo 3 litros de agua al día, con media cucharadita de sal rosada cada uno.</p>
                    <p class="mt-8 text-lg"><b>2. Aliento:</b> Puede ser que tu aliento comience a oler a fruta podrida. Es algo temporal (entre 3 y 4 meses) es debido a que tu cuerpo está expulsando las cetonas</p>
                    <p class="mt-8 text-lg"><b>3. Reducción del hambre: </b>Muchos experimentan una disminución del apetito bastante considerable lo que también ayuda a acelerar la pérdida de peso. </p>
                    <p class="mt-8 text-lg"><b>4. Aumento de energía:</b> Es claro que los niveles de energía se aumentan, la energía Keto Bayter se apoderará de ti y de tu cuerpo llevando tu vida al siguiente nivel.</b>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-gray-50">
        <div class="max-w-5xl mx-auto px-6 md:px-0">
            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 md:text-3xl">También te puede interesar</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 mt-8">
                <a href="{{route('blog.uno')}}" class="block mb-6 border border-gray-200 rounded-xl">
                    <div class="flex flex-col overflow-hidden rounded-xl bg-gray-50 shadow-xs h-full">
                        <figure class="">
                            <img src="{{asset('img/blog/heros/appletvplus_hero.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">
                            <span class="uppercase text-xs font-medium text-gray-500">Tips</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5">Qué comer y qué evitar en una dieta cetogénica</h2>
                            <small class="text-gray-500">Mayo 14, 2021</small>
                        </div>
                    </div>
                </a>
                <a href="{{route('blog.dos')}}" class="block mb-6 border border-gray-200 rounded-xl">
                    <div class="flex flex-col overflow-hidden rounded-xl bg-gray-50 shadow-xs h-full">
                        <figure class="">
                            <img src="{{asset('img/blog/heros/beneficios-dieta-cetogenica.jpg')}}" alt="">
                        </figure>
                        <div class="px-6 py-8 flex-1 flex flex-col">
                            <span class="uppercase text-xs font-medium text-gray-500">Tips</span>
                            <h2 class="text-lg text-gray-900 font-semibold my-1 flex-1 leading-5">5 beneficios que no conocías de la dieta cetogénica</h2>
                            <small class="text-gray-500">Mayo 17, 2021</small>
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
