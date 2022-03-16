<div>
    <section class="" style="">

        <div class="py-12 flex flex-col-reverse md:flex-row max-w-5xl mx-auto">
            <div class=" w-full md:w-6/12">
                <img src="{{asset('img/billboards/reto_empareja2.png')}}" alt="" class="w-full my-4 md:my-0"/>
            </div>
            <div class="pl-2 w-full md:w-6/12 pr-2 mb-8 md:pl-12 md:pr-0 md:mb-0 ">
                <header class="leading-tight">
                    <p class="text-sm md:text-xl inline bg-red-700 text-gray-50 px-4"><b>Nuevo Reto</b> 100% Online</p>
                    <h1 class="text-3xl md:text-5xl font-bold leading-none pt-2">EMPAREJA<span class="text-red-700">2</span></h1>
                    <h2 class="text-base md:text-2xl">Juntos es más fácil</h2>
                </header>
                <p class="my-4 text-sm md:text-base text-justify">El camino puede parecer más difícil cuando estamos solos, por eso qué mejor que empezar la transformación de tu vida al lado de tu mejor compañía. De esa persona que te anima, que te impulsa a ser mejor y que tiene los mismos objetivos que tú: estar sanos y felices.</p>
                <p class="my-4 text-sm md:text-base text-justify">Empecemos con 5 días. 5 días con tu pareja para desintoxicar sus cuerpos, romper sus adicciones por los carbohidratos y el azúcar, y lo mejor de todo, en tan solo 5 días: ¡VAN A BAJAR DE PESO!</p>
                <p class="my-4 text-sm md:text-base text-justify">Prepárense porque durante 5 días los voy a llevar de la mano en un camino maravilloso en el que, con ingredientes económicos y deliciosos, probarán recetas increíbles que los desinflamarán, y sin aguantar hambre, <b>BAJARÁN DE PESO.</b></p>
                <div class="relative">
                    <a href="{{ route('payment.pay', $plan) }}"
                    wire:loading.attr="disabled"
                    class=" bg-red-700 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-red-500  text-sm lg:text-lg w-full">Sí! Quiero registrarme al reto</a>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 py-8">
            <p class="my-4 text-md mb-8 md:text-3xl max-w-5xl mx-auto text-center">Te voy a demostrar que tan solo en 5 días tu cuerpo estará listo para comer delicioso <b>Y BAJAR DE PESO</b>.</p>
        </div>

    </section>
    <section class="bg-gray-900 py-12">
        <div class="max-w-4xl mx-auto flex w-full flex-col-reverse md:flex-row">
            <div class="mt-8 md:mt-0  w-full md:w-4/12 ">
                <img src="{{asset('img/billboards/banner_facts.png')}}" alt="" class="mx-auto w-full">
            </div>
            <div class="text-gray-50  w-full lg:w-8/12  px-4 md:mr-0 md:ml-10">
                <h2 class="font-bold mb-4 text-2xl leading-none">¿Qué incluye este Reto?</h2>
                <ul class="text-sm md:text-base">
                    <li class="mb-4 relative pl-6 text-justify">
                        <i class="far fa-check-square text-yellow-400 mr-2 absolute top-1 left-0"></i>
                        <span class="">Menú del día a día para dos personas durante los 5 días del reto</span>
                    </li>
                     <li class="mb-4 relative pl-6 text-justify">
                        <i class="far fa-check-square text-yellow-400 mr-2 absolute top-1 left-0"></i>
                        <span>Acceso para dos a un grupo de Whatsapp dirigido por el <b>EQUIPO de tu Doctor Bayter</b> para resolver todas sus dudas y acompañarlos durante estos 5 días.</span>
                    </li>
                     <li class="mb-4 relative pl-6 text-justify">
                        <i class="far fa-check-square text-yellow-400 mr-2 absolute top-1 left-0"></i>
                        <span>Acceso para cada uno a dos reuniones por Zoom con tu Doctor Bayter donde aprenderán todos los secretos para convertirse en una máquina QUEMA GRASA. </span>
                    </li>

                </ul>
                <div>
                    <hr class="my-6 block text-gray-700">
                    <p class=" uppercase">Este Reto es <span class="font-bold">100% online </p>
                    <small>Estará disponible por tiempo limitado.</small>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-3xl py-24 mx-auto ">
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between mb-16">
                <div class="lg:mr-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Videos prácticos</h2>
                    <p class="text-justify ">Contarán con divertidos videos para que disfruten preparando sus almuerzos, de forma práctica y sencilla.</p>
                </div>
                <i class="fab fa-youtube text-9xl text-gray-300"></i>
            </div>
            <div class="flex flex-col lg:flex-row items-center justify-between mb-16">
                <i class="fas fa-trophy text-9xl text-gray-300"></i>
                <div class="lg:ml-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Conozcan y dominen cómo hacer una dieta para bajar de peso</h2>
                    <p class="text-justify ">No solo serán 5 días de recetas, serán 5 días de un acompañamiento exclusivo con el Equipo Keto Bayter, además de las reuniones privadas por zoom en compañía del que más sabe de keto, Tu Doctor Bayter.</p>
                </div>
            </div>
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between mb-16">
                <div class="lg:mr-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Secretos y lista de alimentos</h2>
                    <p class="text-justify ">¿Les surgen dudas? ¿No saben qué alimentos comprar? ¡No se preocupen! Contarán con una lista de alimentos para dos durante estos 5 días, para que ir al mercado sea mucho más sencillo. Además, contarán con un texto completo de los mejores secretos de tu Doctor Bayter, para usarlo como referencia y consultarlo cuando quieran.</p>
                </div>
                <i class="fas fa-unlock text-9xl text-gray-300"></i>
            </div>
    </section>
    <section class="bg-gray-900 py-12  ">
        <article class="max-w-3xl mx-auto text-gray-50 px-6 ">
            <div class="mb-8 ">
                <h2 class="font-semibold text-3xl mb-4 leading-none">¿Cómo serán estos 5 días?</h2>
                <h3 class="text-lg text-gray-200 leading-none"><b class="text-yellow-400">Fecha de inicio:</b> Lunes 4 de abril 2022</h3>
            </div>
            <p class="text-xl font-light mb-8">Esto es lo que verás en cada uno de los días del Reto:</p>
            <ul>
                <li class="mb-3 flex ">
                    <p class=""><b class="mr-4 text-yellow-400">Día 1:</b></p>
                    <p class=" flex-1">Lunes 4 de abril, día 1: Reunión privada de zoom con tu Doctor Bayter + plan de alimentación + video receta almuerzo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 2:</b></p>
                    <p class=" flex-1">Martes 5 de abril, día 2: Plan de alimentación + video receta almuerzo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 3:</b></p>
                    <p class=" flex-1">Miércoles 6 de abril, día 3: Plan de alimentación + video receta almuerzo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 4:</b></p>
                    <p class=" flex-1">Jueves 7 de abril, día 4: Plan de alimentación + video receta almuerzo</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 5:</b></p>
                    <p class=" flex-1">Viernes 8 de abril, día 5: Reunión privada de zoom con tu Doctor Bayter + Plan de alimentación + video receta almuerzo</p>
                </li>
            </ul>
        </article>
    </section>

    <section class="max-w-4xl mx-auto">
        <div class="py-16">
            <h2 class="font-bold mb-8 text-3xl text-center">¿Para quién es este Reto?</h2>
            <div class="grid lg:grid-cols-3 gap-x-6 gap-y-4">
                <div class="bg-gray-100 px-6 py-4 rounded-lg shadow-sm">
                    <h2 class="font-bold text-xl my-4 text-red-700">Adultos</h2>
                    <p class="text-sm">Aprenderán a sanar tu cuerpo, ganar energía y ganar salud a través de la alimentación.</p>
                </div>
                <div class="bg-gray-100 px-6 py-4 rounded-lg shadow-sm">
                    <h2 class="font-bold text-xl my-4 text-red-700">Jóvenes</h2>
                    <p class="text-sm">Este es el Reto perfecto para cambiar de hábitos y mejorar la salud.</p>
                </div>
                <div class="bg-gray-100 px-6 py-4 rounded-lg shadow-sm">
                    <h2 class="font-bold text-xl my-4 text-red-700">Parejas</h2>
                    <p class="text-sm">Hora de apoyarse y progresar en una transformación de alimentación que cambiará sus vidas.</p>
                </div>
            </div>
            <div class="my-8">
                <a href="{{ route('payment.pay', $plan) }}"
                wire:loading.attr="disabled"
                class=" bg-red-700 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-red-500  text-lg w-full">Sí! Quiero registrarme al reto</a>
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
                    <p class=" flex-1 text-justify"><b> ¿Qué me llega al pagar? <br></b> Al momento del pago, les llegará un correo de confirmación (al correo registrado al momento del pago) para ingresar al grupo de WhatsApp. Deben ingresar las dos personas al grupo a través de ese mismo enlace. La información del reto la tendrán disponible el día viernes 1 de abril en la cuenta registrada. Para acceder a esta, deben iniciar sesión en doctorbayter.com con el correo y contraseña que registraron al momento de realizar el pago. </p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">2:</b></p>
                    <p class=" flex-1 text-justify"><b>¿A qué hora serán las reuniones de zoom? <br></b>Las reuniones de zoom serán a la 1:00 p.m. hora Colombia. Hagan lo posible por conectarse y verlas en vivo, en caso de no poder asistir, serán grabadas y enviadas a través de un link tanto por el grupo de WhatsApp como por el correo electrónico que registraron.</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">3:</b></p>
                    <p class=" flex-1 text-justify"> <b>¿Qué pasa si no puedo asistir al zoom en vivo? <br></b> En caso de no poder asistir, serán grabadas y enviadas a través de un link tanto por tu grupo de WhatsApp como por el correo electrónico que registraste.</p>
                </li>

                </p>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">4:</b></p>
                    <p class=" flex-1 text-justify"><b>¿Cuánto peso voy a perder en estos 5 días? <br></b>En cuanto al PESO: tengan en cuenta que todos los cuerpos son diferentes, algunos podrán bajar más, otros no tanto, todo depende de qué tan enfermos están sus organismos.</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">5:</b></p>
                    <p class=" flex-1 text-justify"><b>¿Hasta cuando tendré acceso al material del reto?<br></b> Finalizado el reto, la información seguirá estando disponible por 60 días más dentro de la cuenta registrada en doctorbayter.com</p>
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
