<div>
    <section class="" style="">

        <div class="py-12 flex flex-col-reverse md:flex-row max-w-5xl mx-auto">
            <div class="w-full">
                <img src="{{asset('img/billboards/doctor_reto.png')}}" alt="" class="w-full my-4 md:w-96 md:my-0"/>
            </div>
            <div class="pl-2 pr-2 mb-8 md:pl-12 md:pr-0 md:mb-0 ">
                <header class="leading-tight">
                    <p class="text-sm md:text-xl inline bg-red-700 text-gray-50 px-4"><b>Nuevo Reto</b> 100% Online</p>
                    <h1 class="text-3xl md:text-5xl font-bold leading-none pt-2">Desafio 2022</h1>
                    <h2 class="text-base md:text-2xl">Libérate de la mierda del 2021</h2>
                </header>
                <p class="my-4 text-sm md:text-base text-justify">Porque este es tu año. Esta es tu oportunidad. Este 2022 vas a dejar de decir "el lunes comienzo la dieta" para decir "INICIO HOY". Y qué mejor que con un espectacular reto de 5 días en el que vas a eliminar toda la mierda que comiste en el 2021.</p>
                <p class="my-4 text-sm md:text-base text-justify">Vas a desintoxicar tu cuerpo, a romper tus adicciones por los carbohidratos y el azúcar, y lo mejor de todo, en tan solo 5 días: ¡VAS A BAJAR DE PESO!</p>
                <p class="my-4 text-sm md:text-base text-justify">Prepárate porque durante 5 días te voy a llevar de la mano en un camino maravilloso en el que, con ingredientes económicos y deliciosos, probarás recetas increíbles que te desinflamarán, y sin aguantar hambre, <b>BAJARÁS DE PESO</b>.</p>
                <div class="relative">
                    <a href="{{ route('payment.pay', $plan) }}"
                    wire:loading.attr="disabled"
                    class=" bg-red-700 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-red-500  text-sm lg:text-lg w-full">Sí! Quiero registrarme al Desafio 2022</a>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 py-8">
            <p class="my-4 text-md mb-8 md:text-3xl max-w-5xl mx-auto text-center">Te voy a demostrar que tan solo en 5 días tu cuerpo estará listo para comer delicioso <b>Y BAJAR ESA MIERDA QUE ACUMULASTE EN EL 2021</b>.</p>
        </div>

    </section>
    <section class="bg-gray-900 py-12">
        <div class="max-w-4xl mx-auto flex w-full flex-col-reverse md:flex-row">
            <div class="mt-8 md:mt-0 w-4/12 ">
                <img src="{{asset('img/billboards/banner_facts.png')}}" alt="" class="mx-auto">
            </div>
            <div class="text-gray-50  w-full lg:w-8/12  px-4 md:mr-0 md:ml-10">
                <h2 class="font-bold mb-4 text-2xl leading-none">¿Qué incluye este reto?</h2>
                <ul class="text-sm md:text-base">
                    <li class="mb-4 relative pl-6 text-justify">
                        <i class="far fa-check-square text-yellow-400 mr-2 absolute top-1 left-0"></i>
                        <span class="">Menú de tu día a día durante los 5 días del reto.</span>
                    </li>
                     <li class="mb-4 relative pl-6 text-justify">
                        <i class="far fa-check-square text-yellow-400 mr-2 absolute top-1 left-0"></i>
                        <span>Acceso a un grupo de Whatsapp dirigido por el EQUIPO de tu Doctor Bayter para resolver todas tus dudas y acompañarte durante estos 5 días.</span>
                    </li>
                     <li class="mb-4 relative pl-6 text-justify">
                        <i class="far fa-check-square text-yellow-400 mr-2 absolute top-1 left-0"></i>
                        <span>Dos reuniones por Zoom con tu Doctor Bayter donde aprenderás todos los secretos para que este año te conviertas en una máquina QUEMA GRASA.</span>
                    </li>

                </ul>
                <div>
                    <hr class="my-6 block text-gray-700">
                    <p class=" uppercase">Este RETO es <span class="font-bold">100% online </p>
                    <small>Estará disponible por tiempo limitado.</small>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-3xl py-24 mx-auto ">
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between mb-16">
                <div class="lg:mr-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Videos prácticos</h2>
                    <p class="text-justify ">Contarás con divertidos videos para que disfrutes preparando tus almuerzos, de forma práctica y sencilla.</p>
                </div>
                <i class="fab fa-youtube text-9xl text-gray-300"></i>
            </div>
            <div class="flex flex-col lg:flex-row items-center justify-between mb-16">
                <i class="fas fa-trophy text-9xl text-gray-300"></i>
                <div class="lg:ml-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Conoce y domina cómo hacer una dieta para bajar de peso</h2>
                    <p class="text-justify ">No solo serán 5 días de recetas, serán 5 días de un acompañamiento exclusivo con el Equipo Keto Bayter, además de las reuniones privadas por zoom en compañía del que más sabe de keto, Tu Doctor Bayter.</p>
                </div>
            </div>
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between mb-16">
                <div class="lg:mr-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Secretos y lista de alimentos</h2>
                    <p class="text-justify ">¿Te surgen dudas? ¿No sabes qué alimentos comprar? ¡No te preocupes! Contarás con una lista de alimentos para estos 5 días, para que ir al mercado sea mucho más sencillo. Además, contarás con un texto completo de los mejores secretos de tu Doctor Bayter, para usarlo como referencia y consultarlo cuando quieras.</p>
                </div>
                <i class="fas fa-unlock text-9xl text-gray-300"></i>
            </div>
    </section>
    <section class="bg-gray-900 py-12  ">
        <article class="max-w-3xl mx-auto text-gray-50 px-6 ">
            <div class="mb-8 ">
                <h2 class="font-semibold text-3xl mb-4 leading-none">¿Cómo serán estos 5 días?</h2>
                <h3 class="text-lg text-gray-200 leading-none"><b class="text-yellow-400">Fecha de inicio:</b> Martes 11 de enero 2022</h3>
            </div>
            <p class="text-xl font-light mb-8">Esto es lo que verás en cada uno de los días del reto:</p>
            <ul>
                <li class="mb-3 flex ">
                    <p class=""><b class="mr-4 text-yellow-400">Día 1:</b></p>
                    <p class=" flex-1">Martes 11 de enero: Reunión privada de zoom con tu Doctor Bayter + plan de alimentación + video receta almuerzo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 2:</b></p>
                    <p class=" flex-1">Miércoles 12 de enero: Plan de alimentación + video receta almuerzo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 3:</b></p>
                    <p class=" flex-1">Jueves 13 de enero: Plan de alimentación + video receta almuerzo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 4:</b></p>
                    <p class=" flex-1">Viernes 14 de enero: Reunión privada de zoom con tu Doctor Bayter + Plan de alimentación + video receta almuerzo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 5:</b></p>
                    <p class=" flex-1">Sábado 15 de enero: Plan de alimentación + video receta almuerzo</p>
                </li>
            </ul>
        </article>
    </section>

    <section class="max-w-4xl mx-auto">
        <div class="py-16">
            <h2 class="font-bold mb-8 text-3xl text-center">¿Para quién es este reto?</h2>
            <div class="grid lg:grid-cols-3 gap-x-6 gap-y-4">
                <div class="bg-gray-100 px-6 py-4 rounded-lg shadow-sm">
                    <h2 class="font-bold text-xl my-4 text-red-700">Adultos</h2>
                    <p class="text-sm">Aprenderás a sanar tu cuerpo, ganar energía y ganar salud a través de la alimentación.</p>
                </div>
                <div class="bg-gray-100 px-6 py-4 rounded-lg shadow-sm">
                    <h2 class="font-bold text-xl my-4 text-red-700">Jóvenes</h2>
                    <p class="text-sm">Este es el reto perfecto para cambiar de hábitos y mejorar la salud.</p>
                </div>
                <div class="bg-gray-100 px-6 py-4 rounded-lg shadow-sm">
                    <h2 class="font-bold text-xl my-4 text-red-700">Parejas</h2>
                    <p class="text-sm">Hora de apoyarse y progresar en una transformación de alimentación que cambiará sus vidas.</p>
                </div>
            </div>
            <div class="my-8">
                <a href="{{ route('payment.pay', $plan) }}"
                wire:loading.attr="disabled"
                class=" bg-red-700 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-red-500  text-lg w-full">Sí! Quiero registrarme al Desafio 2022</a>
            </div>
        </div>
    </section>
    <section class="bg-gray-700 py-12  ">
        <article class="max-w-3xl mx-auto text-gray-50 px-6 ">
            <div class="mb-8 ">
                <h2 class="font-semibold text-3xl mb-4 leading-none">Preguntas Frecuentes</h2>
            </div>
            <ul>
                <li class="mb-3 flex ">
                    <p class=""><b class="mr-4 text-yellow-400">1:</b></p>
                    <p class=" flex-1 text-justify"><b> ¿Qué me llega al pagar? <br></b> Al momento del pago, te llegará un correo de confirmación para ingresar al grupo de WhatsApp. La información del reto la tendrás disponible el día viernes 7 de enero en tu cuenta. Para acceder a esta, debes iniciar sesión en doctorbayter.com con el correo y contraseña que registraste cuando realizaste el pago.</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">2:</b></p>
                    <p class=" flex-1 text-justify"><b>¿A qué hora serán las reuniones de zoom? <br></b> Las reuniones de zoom serán a la 1:00 p.m. hora Colombia. Haz lo posible por conectarte y verlas en vivo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">3:</b></p>
                    <p class=" flex-1 text-justify"> <b>¿Qué pasa si no puedo asistir al zoom en vivo? <br></b> En caso de no poder asistir, serán grabadas y enviadas a través de un link tanto por tu grupo de WhatsApp como por el correo electrónico que registraste.</p>
                </li>

                </p>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">4:</b></p>
                    <p class=" flex-1 text-justify"><b>¿Cuánto peso voy a perder en estos 5 días? <br></b> En cuanto al PESO: Ten en cuenta que todos los cuerpos son diferentes, algunos podrán bajar más, otros no tanto, todo depende de qué tan enfermo esté tu organismo.</p>
                </li>

            </ul>
        </article>
    </section>
    <section class="py-8 md:py-16 bg-gray-900 px-6 md:px-0">
        <div class="max-w-5xl mx-auto text-gray-50">
            <p class="uppercase text-yellow-500 font-medium text-sm md:text-lg">¿Tienes dudas adicionales?</p>
            <a href="https://wa.me/573147281252" target="_blank" class="text-2xl md:text-6xl font-bold flex items-center leading-none my-4 transition duration-300 ease select-none hover:text-gray-100 hover:underline " title="Escríbemele a mi equipo">
                <span  class="">Escríbenos vía WhatsApp</span>
            </a>
        </div>
    </section>

    @push('footerText')
        <small class="italic text-gray-100 font-thin text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
    @endpush
</div>
