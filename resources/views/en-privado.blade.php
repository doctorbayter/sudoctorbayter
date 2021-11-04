<x-app-layout>
    <section class="" style="">
        <div class="py-12 flex flex-col-reverse md:flex-row max-w-5xl mx-auto">
            <div>
                <iframe src="https://player.vimeo.com/video/642467854?h=2448c221e9" width="" height="550" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" class="w-full -my-16 md:w-96 md:my-0"></iframe>
            </div>
            <div class="pl-4 pr-4 mb-8 md:pl-12 md:pr-0 md:mb-0 ">
                <header class="leading-tight">
                    <p class="text-sm md:text-xl inline bg-red-700 text-gray-50 px-4"><b>Evento Presencial Exclusivo </p>
                    <h1 class="text-3xl md:text-5xl font-bold leading-none pt-2">En Privado con tu Doctor Bayter</h1>
                    <h2 class="text-base text-gray-400 md:text-2xl">Santo Domingo, República Dominicana</h2>
                </header>
                <p class="my-4 text-sm md:text-base">Por qué ser keto, cómo convertirte en un KETO PERFECTO y cómo ser la máquina quema grasa que siempre has querido de la mano de tu Doctor Bayter.</p>
                <div class="relative">
                    <h2 class="text-base  text-red-700 md:text-2xl mb-2">Un evento PRESENCIAL</h2>
                    <p class="font-medium"><b>El hotel Catalonia en Santo Domingo</b>, República Dominicana, será el escenario ideal para que tu Doctor Bayter<b> comparta contigo</b> lo mejor de su método de la <b class="text-red-700">Dieta Keto Perfecta</b> para convertirte en esa máquina quema grasa que tanto deseas. Tendrás la oportunidad de conversar cara a cara con tu <b> Doctor Bayter</b>, romper mitos, aprender de su mano y compartir con el que más sabe de KETO.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-900 py-12">
        <div class="max-w-4xl mx-auto flex w-full flex-col-reverse md:flex-row">
            <div class="mt-8 md:mt-0 w-6/12 ">
                <img src="{{asset('img/billboards/banner_facts.png')}}" alt="" class="mx-auto">
                <div class="mt-4">
                    <a href="{{route('payment.pay', $plan)}}" class="bg-green-600 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-green-700  text-lg w-full">Adquiere tu cupo $499 USD</a>
                </div>
            </div>
            <div class="text-gray-50  w-8/12  ml-4 mr-4 md:mr-0 md:ml-10">
                <h2 class="font-bold mb-4 text-2xl leading-none">¿Qué incluye tu acceso?</h2>
                <p class="mb-4">Evento privado el viernes 26 de noviembre en Santo Domingo, República Dominicana.</p>
                <ul class="text-sm md:text-base font-medium">
                    <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span class="">Acceso al MÉTODO DKP: El método completo contiene todas las fases (fase 1 de 21 días, fase 2 de 21 días, fase 3 de 21 días y fase 4 de 7 días), más de 180 recetas, listas de alimentos, lista de salsas keto, bebidas keto y todos los secretos para ser un KETO PERFECTO</span>
                    </li>
                     <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span>Acceso al chat de WhatsApp por 60 días con tu Doctor Bayter para hacer seguimiento de tu proceso.</span>
                    </li>
                     <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span>Certificado de participación en el evento En Privado.</span>
                    </li>
                     <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span>Recursos y material de trabajo.</span>
                    </li>
                </ul>
                <div>
                    <hr class="my-6 block text-gray-700">
                    <p class=" uppercase font-medium">Este evento es <span class="font-bold">100% presencial <span class="text-yellow-400 font-medium" >Cupos limitados</span></span></p>
                    <small class="font-medium">(Cumplimiento de todas las normas contra el COVID-19)</small>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-4xl mx-auto  w-full md:flex-row py-16">
            <h2 class="font-bold mb-16 text-4xl leading-none">Programación</h2>
            <div class="grid grid-cols-7 gap-x-2">
                <div class=" col-span-2">
                    <ul >
                        <li class="p-4 py-2 mb-4 bg-gray-200">1:15 p.m. a 2:00 p.m.</li>
                        <li class="p-4 py-2 mb-4 bg-gray-200">2:00 p.m. a 2:20 p.m.</li>
                        <li class="p-4 py-2 mb-4 bg-gray-200">2:20 p.m. a 2:40 p.m.</li>
                        <li class="p-4 py-2 mb-4 bg-gray-200">2:40 p.m. a 3:10 p.m</li>
                        <li class="p-4 py-2 mb-4 bg-gray-200">3:10 p.m. a 3:30 p.m.</li>
                        <li class="p-4 py-2 mb-4 bg-gray-200">3:30 p.m. a 5:00 p.m.</li>
                        <li class="p-4 py-2 mb-4 bg-gray-200">5:00 p.m.</li>
                    </ul>
                </div>
                <div class="col-span-5">
                    <ul >
                        <li class="p-4 py-2 mb-4">Presentación de cada uno de los participantes</li>
                        <li class="p-4 py-2 mb-4">¿Por qué debo ser keto? Beneficios en mi salud. Rompiendo mitos</li>
                        <li class="p-4 py-2 mb-4">Sección 1 de preguntas por participantes</li>
                        <li class="p-4 py-2 mb-4">Explicación de mi método DKP: cómo convertirme en un <b>KETOPERFECTO</b></li>
                        <li class="p-4 py-2 mb-4">Sección 2 de preguntas por participantes</li>
                        <li class="p-4 py-2 mb-4">Workshop: Qué puedo y qué no puedo comer en una Dieta Keto Perfecta</li>
                        <li class="p-4 py-2 mb-4">Toma de fotografías, entrega de obsequio y cierre.</li>
                    </ul>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{route('payment.pay', $plan)}}" class="bg-green-600 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-green-700  text-lg w-full">Adquiere tu cupo $499 USD</a>
            </div>
        </div>
    </section>
    <section class="bg-gray-900">
        <div class="max-w-5xl mx-auto py-12 md:py-20">
            <h2 class="text-center font-extrabold text-3xl md:text-5xl max-w-2xl mx-auto leading-none text-gray-50 mb-12">Preguntas Frecuentes</h2>
            <div class=" max-w-4xl mx-auto" x-data="{selected:2}">
                <ul class="text-gray-50">
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 2 ? selected = 2 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿El precio incluye traslado y hospedaje?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg"><span class="font-bold">El precio que te ofrecemos incluye la entrada al evento en el Hotel Catalonia. Debes cubrir otros gastos como traslado a la ciudad y alojamiento en caso de ser necesario.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 3 ? selected = 3 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Debo ser keto para asistir al evento?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 3 , 'fa-chevron-down': selected !== 3 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg">No es necesario, podrás aprender todo lo que necesitas en el evento además de que contarás con el método completo. En caso de ya ser keto, será un plus para que te conviertas en un KETO PERFECTO.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 4 ? selected = 4 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Este evento es teórico o práctico?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 4 , 'fa-chevron-down': selected !== 4 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg">Es un evento teórico/práctico con los recursos necesarios para que inicies tu camino Keto Perfecto desde el primer momento.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 5 ? selected = 5 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Este evento se transmitirá vía online?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 5 , 'fa-chevron-down': selected !== 5 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container5" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container5.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg">No, este es un evento exclusivo y presencial. Solo aquellos que adquieran su cupo podrán disfrutarlo y aprender todo lo necesario para ser un KETO PERFECTO.  </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pb-16 cursor-default  text-center w-full">
            <p class="text-gray-100 text-2xl lg:text-3xl  font-bold text-center">Si tienes preguntas, escríbenos al WhatsApp</p>
            <div class="my-4">
                <a href="https://wa.me/573147281252" target="_blank" class=" inline-flex px-6 py-4 rounded-full text-white font-bold bg-green-600 text-xl lg:text-4xl">
                    <div class="flex h-8 w-8 relative mr-4">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <i class="fab fa-whatsapp "></i>
                    </div>
                    <p class="">+57 314 728 1252</p>
                </a>
            </div>
        </div>
    </section>
    <section class="bg-gradient-to-t from-gray-100 bg-white  ">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 flex relative overflow-hidden ">
            <div class="flex items-center pt-24 flex-col-reverse md:flex-row">
                <div class="flex-1">
                    <h2 class="text-5xl font-bold text-gray-900 mb-4 md:block hidden">¿Quién es el Doctor Bayter?</h2>
                    <p class="my-4 text-justify text-gray-700">Soy Médico y Cirujano, especialista en Anestesia, especialista en Medicina Crítica y Cuidado Intensivo.</p>
                    <p class="my-4 text-justify text-gray-700">Líder latinoamericano de seguridad en cirugía plástica, conferencista Internacional en todos los países de Latinoamérica, Estados Unidos y España.</p>
                    <p class="my-4 text-justify text-gray-700">Autor del libro Catástrofes en Cirugía Plástica y de más de 30 artículos científicos y ganador del mejor Artículo Internacional de la revista Aesthetic de la Sociedad Americana de Cirugía Plástica.</p>
                    <p class="my-4 text-justify text-gray-700">Socio fundador del Centro Medico Quirúrgicos Bayos- Clínica El Pinar, una de las principales clínicas ambulatorias de Cirugía Plástica en mi país Colombia y mi ciudad Bucaramanga, caracterizándose por ser la institución mas segura en dichos procedimientos.</p>
                </div>
                <figure class="w-full md:w-5/12 md:ml-8 ">
                    <h2 class="text-5xl font-bold text-gray-900 mb-4 md:hidden">¿Y como profesional?</h2>
                    <img src="{{asset('img/photos/doctor_bayter_profesional.jpg')}}" alt="">
                </figure>
            </div>
        </div>
        <div class="max-w-5xl mx-auto px-6 lg:px-8 pb-16">
            <p class=" text-justify text-gray-700">Sencillamente soy Jorge, un médico, intensivista, investigador, educador, que trabajé por más de 25 años en Unidades de Cuidado Intensivo, viendo gente enferma y aún cuando dedicaba todo mi esfuerzo y mi conocimiento, no era suficiente, no lograba salvar sus vidas.</p>
            <p class="my-8  text-gray-900 text-lg text-center md:text-justify md:text-3xl font-bold">Causándome una gran frustración porque casi siempre sus antecedentes eran una misma causa: <span class=" font-medium">su mal estilo de vida, (mala alimentación, generalmente obesos).</span></p>
            <p class="my-4 text-justify text-gray-700">En estas condiciones, me ponía a pensar en mis carreras de Ironman donde se pone al límite la capacidad física y mental de los triatletas, como se pone al límite la capacidad mental y física de los pacientes que ingresan a una unidad de cuidado crítico.</p>
            <p class="my-4 text-justify text-gray-700">En los dos casos hay una constante: Si un Ironman no ha preparado su cuerpo con la alimentación apropiada, apoya su energía en el combustible inadecuado, no lleva a cabo una hidratación correcta durante su competencia y no ha preparado su cerebro, al final de esta carrera, que es la vida, se convertirá en una dolorosa experiencia.</p>
            <p class="my-4 text-justify text-gray-700">Lo viví, con cada uno de mis pacientes y en mis competencias. Esto me llevó por muchos años a una búsqueda incansable de aprender a conocer mi cuerpo desde lo básico, lo simple.</p>
            <p class="my-4 text-justify text-gray-700">No quería ver ni verme desfallecer más en el intento y firmé el acta de defunción 1022 y ese día, entendí que mi labor no era tratar la enfermedad y menos atender a pacientes sino... <b>CAMBIAR VIDAS…</b></p>
        </div>
    </section>
    <section class="bg-white md:bg-gray-50">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 flex relative overflow-hidden">
            <div class="flex pt-8 flex-col-reverse md:flex-row">
                <figure class="w-full flex items-end justify-end md:w-6/12 p-0 leading-none">
                    <img src="{{asset('img/photos/doctor_bayter_triatleta.png')}}" alt="" class="mt-auto w-full">
                </figure>
                <div class="md:ml-8 flex-1 ">
                    <h2 class="text-4xl md:text-5xl text-center md:text-left font-bold text-gray-900 mb-4">¿Cómo cambio vidas?</h2>
                    <p class="my-4 text-justify text-gray-700">Con lo que más me apasiona, con este sueño que tengo en generar impacto positivo, educando a todas las personas del mundo e inspirando a que piensen y sueñen lo que yo sueño. Mostrándoles que haciendo pequeños cambios en su diario vivir, lograrán grandes transformaciones. Porque solo si cada uno interioriza las buenas prácticas en su salud podemos lograr que la vida valga la pena vivirla, con energía, con salud, pero sobretodo inmensamente feliz.</p>
                    <p class="my-4 text-justify text-gray-700">Sencillamente soy <b>TU DOCTOR BAYTER.</b></p>
                </div>
            </div>
        </div>
        <div class="text-center pt-16 pb-20 bg-gray-900">
            <h2 class="text-5xl font-bold text-gray-50 mb-4">¿Creador del Método DKP</h2>
            <a href="{{route('dkp')}}" class=" inline-block mt-4 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">¿Qué es el Método DKP?</a>
        </div>
    </section>
</x-app-layout>
