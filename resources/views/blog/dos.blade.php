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
                        <h2 class="text-lg text-gray-900 font-semibold my-1 md:text-5xl">5 beneficios que no conocías de la dieta cetogénica</h2>
                    </header>
                    <p class="mt-8 text-lg">Los beneficios de ser keto pueden llegar a ser incomparables a lo que puedes conseguir en otras dietas. Pero para alcanzar cada uno de ellos, debes hacerlo perfecto, ¡SIN ERRORES!</p>
                </div>

                <div class="my-8">
                    <figure class="h-48 md:h-96  block">
                        <img src="{{asset('img/blog/heros/beneficios-dieta-cetogenica.jpg')}}" alt="" class=" object-cover w-full my-auto block">
                    </figure>
                </div>

                <div class="mt-24">
                    <h3 class="text-lg mt-8 text-gray-900 font-semibold my-1 md:text-3xl">Pérdida de peso</h3>
                    <p class="mt-8 text-lg">Este, sin lugar a duda, es uno de los mejores beneficios que encontrarás en este maravilloso estilo de vida.</p>
                    <p class="mt-8 text-lg">Tu cuerpo se convierte en una máquina para quemar grasa. ¿Por qué? Hemos disminuido los niveles de insulina, la hormona que almacena grasa. Esto es lo que facilita la perdida de grasa muscular, y lo mejor, ¡sin pasar hambre!</p>
                    <h3 class="text-lg mt-8 text-gray-900 font-semibold my-1 md:text-3xl">Control del apetito</h3>
                    <p class="mt-8 text-lg">Es normal que la sensación de hambre disminuya significativamente. Por esta razón, esto hace más fácil que quieras comer menos y que solo esperemos hasta tener hambre para comer.</p>
                    <p class="mt-8 text-lg">Sin embargo, recuerda que es necesario para tu cuerpo y tu salud comer 3 veces al día. Podrás pensar en ayunos estando en la fase 3 de tu dieta, donde ya serás un experto escuchando tu cuerpo y conociendo qué te conviene y qué no.</p>
                    <p class="mt-8 text-lg">Por fin la comida ya no será un problema para ti, dejarás de luchar con tu adicción por el azúcar y los carbohidratos, y te sentirás plenamente satisfecho con lo que consumes. La comida dejará de ser tu enemiga, y se convertirá en tu combustible de energía.</p>
                    <h3 class="text-lg mt-8 text-gray-900 font-semibold my-1 md:text-3xl">Control de azúcar</h3>
                    <p class="mt-8 text-lg">Existen estudios y algunos de mis pacientes demuestran que la dieta cetogénica funciona para controlar la diabetes tipo 2. Esto debido a que ser cetogénico reduce los niveles de azúcar en la sangre, reduciendo la necesidad de medicamentos en los pacientes, e incluso, puede revertir completamente la enfermedad.</p>
                    <p class="mt-8 text-lg">En el mejor de los casos, la glucosa en sangre vuelve a la normalidad sin necesitar medicamentos. Es importante mantenerse cetogénico para que la enfermedad no vuelva con el tiempo y no progrese.</p>
                    <h3 class="text-lg mt-8 text-gray-900 font-semibold my-1 md:text-3xl">Mayor energía</h3>
                    <p class="mt-8 text-lg">Es común que las personas que llevan una dieta keto experimenten mayor rendimiento en su energía. Recuerda que con la dieta cetogénica tu cerebro no necesitará carbohidratos, alimentándose con cetonas junto con una menor cantidad de glucosa sintetizada por el hígado.</p>
                    <p class="mt-8 text-lg">Lo que resulta en más concentración, mayor claridad mental y una gran carga de energía.</p>
                    <h3 class="text-lg mt-8 text-gray-900 font-semibold my-1 md:text-3xl">Mejor digestión y mayor resistencia física</h3>
                    <p class="mt-8 text-lg">En un estilo de vida cetogénico te olvidas de los gases, los calambres y además, menos dolor. Por otro lado, aumenta tu resistencia física al tomar la energía de tus reservas de grasa.</p>
                    <p class="mt-8 text-lg">Cuando suministras la energía a partir de los carbohidratos, esta solo dura un par de horas, pero las reservas de energía a partir de la grasa, contiene la energía suficiente para durar incluso, ¡semanas! </p>
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
                <a href="#" class="block mb-6 border border-gray-200 rounded-xl">
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