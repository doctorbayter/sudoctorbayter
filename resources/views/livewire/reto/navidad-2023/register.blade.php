<div>
    <section class="" style="">

        <div class="py-12 flex flex-col-reverse md:flex-row max-w-5xl mx-auto">
            <div class=" w-full md:w-6/12">
                <img src="{{asset('img/billboards/que_comer.jpg')}}" alt="" class="w-full my-4 md:my-0"/>
            </div>
            <div class="pl-2 w-full md:w-6/12 pr-2 mb-8 md:pl-12 md:pr-0 md:mb-0 ">
                <header class="leading-tight">
                    <p class="text-sm md:text-xl inline bg-red-700 text-gray-50 px-4"><b>Nuevo Reto</b> 100% Online</p>
                    <h1 class="text-3xl md:text-5xl font-bold leading-none pt-2">Navidad<span class="text-red-700">2023</span></h1>
                    <h2 class="text-base md:text-2xl">El Reto en Navidad</h2>
                </header>
                <p class="my-4 text-sm md:text-base text-justify">Durante 5 días te voy a llevar de la mano, donde juntos vamos a conseguir lo que por separado no has logrado: </p>
                <p class="my-4 text-sm md:text-base text-justify">cambiar tus hábitos alimenticios, que dejes de satanizar las grasas,  logres  disminuir  los carbohidratos a su mínima expresión, dejes  la adicción al azúcar y hagas un ayuno PERFECTO</p>
                <p class="my-4 text-sm md:text-base text-justify">aprovechando todos los beneficios en salud que este trae. Te voy a demostrar que tan solo en 5 días se desinflamará tu cuerpo, mejorarás tu digestión, mejorarás tu energía y lo más increíble: <b>BAJARÁS DE PESO.</b></p>
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
                        <span class="">Todas las recetas: desayuno, almuerzo, cena de tu día a día, junto a lista de alimentos y los mejores secretos para hacer un KETO AYUNO PERFECTO</span>
                    </li>
                     <li class="mb-4 relative pl-6 text-justify">
                        <span>Acceso a un grupo CERRADO de Whatsapp (unidireccional, solo envío de información) dirigido por el EQUIPO de tu Doctor Bayter para acompañarte durante estos 5 días.</span>
                        <i class="far fa-check-square text-yellow-400 mr-2 absolute top-1 left-0"></i>
                    </li>
                     <li class="mb-4 relative pl-6 text-justify">
                        <i class="far fa-check-square text-yellow-400 mr-2 absolute top-1 left-0"></i>
                        <span>1 reunión grupal a través de link privado para evaluar el progreso de los participantes en el reto, compartir experiencias, resolver algunas dudas y continuar por este camino de construir salud.</span>
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
            
            <div class="flex flex-col lg:flex-row items-center justify-between mb-16">
                <i class="fas fa-trophy text-9xl text-gray-300"></i>
                <div class="lg:ml-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Conoce y domina lo que es hacer un KETO AYUNO PERFECTO</h2>
                    <p class="text-justify ">No solo serán 5 días de recetas, serán 5 días de un acompañamiento exclusivo con el Equipo Keto Bayter, además de todo el material para hacerlo perfecto.</p>
                </div>
            </div>
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between mb-16">
                <div class="lg:mr-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Secretos y lista de alimentos</h2>
                    <p class="text-justify ">¿Te surgen dudas? ¿No sabes qué alimentos comprar? ¡No te preocupes! Contarás con una lista de alimentos para estos 5 días, para que ir al mercado sea mucho más sencillo. Además, contarás con un texto completo de los mejores secretos de tu Doctor Bayter, para usarlo como referencia y consultarlo cuando quieras.</p>
                </div>
                <i class="fas fa-unlock text-9xl text-gray-300"></i>
            </div>
            <div class="flex flex-col-reverse lg:flex-row items-center justify-between mb-16 ">
                <div class="lg:mr-10 px-4 lg:px-4">
                    <h2 class="font-semibold text-2xl lg:text-3xl mb-4 text-red-700">Reunión privada</h2>
                    <p class="text-justify ">Podrás finalizar el reto con una reunión privada junto al Doctor Bayter y tus compañeros de reto para compartir experiencias y seguir construyendo salud. </p>
                </div>
                <i class="fab fa-youtube text-9xl text-gray-300"></i>
            </div>
    </section>
    <section class="bg-gray-900 py-12  ">
        <article class="max-w-3xl mx-auto text-gray-50 px-6 ">
            <div class="mb-8 ">
                <h2 class="font-semibold text-3xl mb-4 leading-none">¿Cómo serán estos 5 días?</h2>
                <h3 class="text-lg text-gray-200 leading-none"><b class="text-yellow-400">Fecha de inicio:</b> LUNES 11 DE SEPTIEMBRE</h3>
            </div>
            <p class="text-xl font-light mb-8">Esto es lo que verás en cada uno de los días del Reto:</p>
            <ul>
                <li class="mb-3 flex ">
                    <p class=""><b class="mr-4 text-yellow-400">Día 1:</b></p>
                    <p class=" flex-1">LUNES 11 DE SEPT: Plan de alimentación + envío de información a través del grupo privado</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 2:</b></p>
                    <p class=" flex-1">MARTES 12 DE SEPT: Plan de alimentación + envío de información a través del grupo privado</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 3:</b></p>
                    <p class=" flex-1">MIÉRCOLES 13 DE SEPT: Plan de alimentación + envío de información a través del grupo privado</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 4:</b></p>
                    <p class=" flex-1">JUEVES 14 DE SEPT: Plan de alimentación + envío de información a través del grupo privado + Reunión privada vía zoom y youtube</p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">Día 5:</b></p>
                    <p class=" flex-1">VIERNES 15 DE SEPT:  Plan de alimentación + envío de información a través del grupo privad</p>
                </li>
            </ul>
        </article>
    </section>

    <section class="max-w-4xl mx-auto">
        <div class="py-16">
            <h2 class="font-bold mb-2 text-3xl text-center">¿Para quién es este Reto?</h2>
            <p class="text-center mb-8">Para todos aquellos que desean <b>CONSTRUIR SALUD</b> </p>
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
                    <p class=" flex-1 text-justify"><b> ¿Qué me llega al pagar? <br></b> Al momento del pago, les llegará un correo de confirmación (al correo registrado al momento del pago) para ingresar al grupo de WhatsApp. La información del reto la tendrás disponible el día viernes 19 de agosto en la cuenta registrada. Para acceder a esta, debes iniciar sesión en doctorbayter.com con el correo y contraseña que registraste al momento de realizar el pago. </p>
                </li>
                <li class="mb-3 flex">
                    <p class=""><b class="mr-4 text-yellow-400">2:</b></p>
                    <p class=" flex-1 text-justify"><b>¿A qué hora será la reunión de zoom? <br></b>La reunión de zoom será a la 1:00 p.m. hora Colombia. Has lo posible por conectarte y verlas en vivo, en caso de no poder asistir, serán grabadas y enviadas a través de un link tanto por el grupo de WhatsApp como por el correo electrónico que registraron.</p>
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
                    <p class=" flex-1 text-justify"><b>¿Hasta cuando tendré acceso al material del reto?<br></b> Finalizado el reto, la información seguirá estando disponible por 90 días más dentro de la cuenta registrada en doctorbayter.com</p>
                </li>

            </ul>
        </article>
    </section>
    <section class="py-8 md:py-16 bg-gray-900 px-6 md:px-0">
        <div class="max-w-5xl mx-auto text-gray-50">
            <p class="uppercase text-yellow-500 font-medium text-sm md:text-lg">¿Tienes dudas adicionales?</p>
            <a href="https://wa.me/573173455477" target="_blank" class="text-2xl md:text-6xl font-bold flex items-center leading-none my-4 transition duration-300 ease select-none hover:text-gray-100 hover:underline " title="Escríbemele a mi equipo">
                <span  class="">Escríbenos vía WhatsApp</span>
            </a>
        </div>
    </section>

    @push('footerText')
        <small class="italic text-gray-100 font-thin text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
    @endpush
</div>
