<x-app-layout>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <section class="bg-fixed  bg-top" style="background-image: url({{asset('img/backgrounds/bg_event.jpg')}})">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 flex flex-col lg:flex-row relative overflow-hidden">
            <div class="max-w-2xl mx-auto mt-20 mb-4 lg:my-24 text-center">
                <small class="text-gray-50 mt-6 mb-4 md:text-sm italic uppercase">Julio 16 de 2022, Bogotá Colombia - Ágora Centro de Convenciones</small>
                <img src="{{asset('img/logos/revoluciona_event.png')}}" alt="" class="w-full object-cover text-center">
                <p class="text-gray-50 mt-2 mb-4 md:text-base">El evento que reunirá a profesionales de la salud, nutricionistas, dietistas, nutriólogos y deportistas quienes durante años han estudiado este estilo de vida, y hoy son los máximos exponentes del mismo frente al mundo.</p>
                <div class="text-white text-left py-2 hidden">
                    <p class="text-4xl text-accent-400 font-bold ">{{$vip->price->name}}</p>
                </div>
                <a href="#go" class=" inline-block mt-2 font-bold px-4 mb-8 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Preventa disponible ya! desde 47 US$</a>
            </div>
        </div>
    </section>
    <section class="bg-white ">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex relative overflow-hidden py-16 md:py-24">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-6/12 px-4 md:mr-4">
                    <h2 class="text-gray-900 mb-8 leading-none font-black text-2xl md:text-6xl">La <span class="text-red-700">nueva</span> era de la nutrición</h2>
                    <p class="mt-3 text-base text-justify">Organizado por el doctor <b>Jorge Enrique Bayter</b>, en su primera versión, traerá un profundo análisis acerca de la salud y la nutrición en esta nueva era, en donde las grasas se han convertido en el mejor aliado para tener una vida sana, feliz y longeva.</p>
                    <p class="mt-3 text-base text-justify">Este evento lo hemos programado para desarrollarse de forma presencial el día <b>16 de julio de 2022</b> en Ágora Centro de Convenciones en la ciudad de <b>Bogotá, Colombia</b>; seguiremos las más estrictas medidas de bioseguridad según las recomendaciones nacionales e internacionales.</p>
                    <p class="mt-2"><small > <b>* Para los asistentes internacionales:</b> Las personas no vacunadas podrán entrar a Colombia presentando una prueba <b>PCR</b> no mayor a 72 horas o una prueba de antígenos no mayor a 48 horas.</small></p>
                    <a href="#go" class=" inline-block mt-8 font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">Adquiere tu entrada ahora</a>
                </div>
                <figure class="rounded-xl flex-1 mt-4 mb:mt-0">
                    <img src="{{asset('img/billboards/revoluciona_2022.png')}}" alt="" class="w-full object-cover">
                </figure>

            </div>
        </div>
    </section>

    <section class="bg-gray-900">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 py-12 md:py-20  flex flex-col">
            <h2 class="text-xl md:text-3xl font-bold text-gray-50 text-center">
                El evento contará con 4 importantes bloques académicos centrados en <span class="text-red-700">nutrición</span>, <span class="text-red-700">salud</span> y <span class="text-red-700">estilo de vida</span>, todo ello de la mano de un selecto grupo de conferencistas e invitados especiales, encabezados por el Doctor Jorge Enrique Bayter, más conocido como <span class="text-red-700">tu Doctor Bayter</span>.
            </h2>
        </div>
    </section>

    <section class="bg-gradient-to-t from-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 pb-24 mt-16">
            <div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="w-full bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="text-red-700">Dirigido a</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">Profesionales de la salud, nutricionistas, dietistas, deportologos, deportistas, empresas del sector salud, EPSs, IPSs, universidades, y demás personas interesadas en el tema.</p>
                        </div>
                    </div>
                    <div class="w-full bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="text-red-700">Metodología</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">El evento se desarrollará a través de conferencias magistrales en cada tema, foros, presentación de experiencias exitosas y la participación activa de los asistentes.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="bg-gray-50">
        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
            <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">¿Quieres serán los <span class="text-red-700">Conferencistas</span>?</h2>

            <article>
                <div class="max-w-6xl mt-12 grid md:grid-cols-4 gap-y-4 md:gap-x-4    mx-auto text-center">
                    <div class="w-full">
                        <img src="{{asset('img/photos/alejandrodietista.jpg')}}" alt="Alejandro Dietista">
                        <h2 class="font-bold mt-4 text-xl">Alejando Perez</h2>
                        <p class="italic my-2">Dietista</p>
                        <p class="text-sm my-4">Experto en Nutrición Clínica y Conferencista y divulgador científico</p>
                        <ul class="flex items-center justify-center mt-4">
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/facebook.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/instagram.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/tiktok.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/youtube.svg')}}"></a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <img src="{{asset('img/photos/jorgebayter.jpg')}}" alt="Doctor Bayter">
                        <h2 class="font-bold mt-4 text-xl">Jorge E. Bayter</h2>
                        <p class="italic my-2">Médico Cirujano </p>
                        <p class="text-sm my-4">Especialista en Anestesiología y Cuidado Intensivo Creador de la Dieta Keto Perfecta Autor de los libros "Catástrofes en Cirugía Plástica" y "La Dieta Keto Perfecta"</p>
                        <ul class="flex items-center justify-center mt-4">
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/facebook.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/instagram.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/tiktok.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/youtube.svg')}}"></a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <img src="{{asset('img/photos/danielaospina.jpg')}}" alt="Doctor Bayter">
                        <h2 class="font-bold mt-4 text-xl">Daniela Ospina</h2>
                        <p class="italic my-2">Empresaria</p>
                        <p class="text-sm my-4">Modelo,jugadora profesional de voleibol, deportista de alto rendimiento y empresaria colombiana</p>
                        <ul class="flex items-center justify-center mt-4">
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/facebook.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/instagram.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/tiktok.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/youtube.svg')}}"></a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <img src="{{asset('img/photos/endikamontiel.jpg')}}" alt="Endika Montiel">
                        <h2 class="font-bold mt-4 text-xl">Endika Montiel</h2>
                        <p class="italic my-2">Dietista</p>
                        <p class="text-sm my-4">Master en Nutrición Deportiva Experto en Psico Inmunología (PNI) Autor del libro "Ayuno Consciente"</p>
                        <ul class="flex items-center justify-center mt-4">
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/facebook.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/instagram.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/tiktok.svg')}}"></a>
                            </li>
                            <li class="mr-1">
                                <a href="https://facebook.com/"><img class="w-6 h-6" src="{{asset('img/icons/rrss/youtube.svg')}}"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </article>

        </div>
    </section>

    <section class="bg-gray-900">
        <div class="max-w-5xl mx-auto py-12 md:py-20">
            <h2 class="text-center font-extrabold text-3xl md:text-5xl max-w-2xl mx-auto leading-none text-gray-50 mb-12">Conferencias del evento</h2>
            <div class=" max-w-4xl mx-auto" x-data="{selected:1}">
                <ul class="text-gray-50">
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 1 ? selected = 1 : selected = null">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold md:text-xl flex items-center">
                                    <img class="w-20 mr-4 overflow-hidden rounded-full" src="{{asset('img/photos/jorgebayter.jpg')}}" alt="Doctor Bayter">
                                    <div>
                                        <small class="italic text-sm font-normal opacity-75">Conferencista</small>
                                        <p>Doctor Bayter</p>
                                        <p class="mt-2 text-sm font-normal opacity-75">Dieta Keto y estilo de vida</p>
                                    </div>
                                </div>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 1 , 'fa-chevron-down': selected !== 1 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500 bg-gray-700" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">1.</span> ¿Por qué enfermamos y morimos? ¿cómo predecir mi enfermedad? </p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">2.</span> La dieta keto perfecta</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">3.</span> Mitos de la dieta keto y la verdad de las grasas y el colesterol</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">4.</span> Estilo de vida keto</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 2 ? selected = 2 : selected = null">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold md:text-xl flex items-center">
                                    <img class="w-20 mr-4 overflow-hidden rounded-full" src="{{asset('img/photos/danielaospina.jpg')}}" alt="Doctor Bayter">
                                    <div>
                                        <small class="italic text-sm font-normal opacity-75">Conferencista</small>
                                        <p>Daniela Ospina</p>
                                        <p class="mt-2 text-sm font-normal opacity-75">Vida saludable</p>
                                    </div>
                                </div>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500 bg-gray-700" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">1.</span> Disciplina y vida saludable </p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 3 ? selected = 3 : selected = null">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold md:text-xl flex items-center">
                                    <img class="w-20 mr-4 overflow-hidden rounded-full" src="{{asset('img/photos/alejandrodietista.jpg')}}" alt="Alejandro Perez">
                                    <div>
                                        <small class="italic text-sm font-normal opacity-75">Conferencista</small>
                                        <p>Alejando Perez</p>
                                        <p class="mt-2 text-sm font-normal opacity-75">Dieta Keto y Alimentación</p>
                                    </div>
                                </div>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500 bg-gray-700" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">1.</span> Destruidos por la civilización</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">2.</span> Aplicaciones terapéuticas de keto</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">3.</span> 5 grandes mentiras de la industria</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">4.</span> Herramientas ancestrales que potencian la salud</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 4 ? selected = 4 : selected = null">
                            <div class="flex items-center justify-between">
                                <div class="text-lg font-bold md:text-xl flex items-center">
                                    <img class="w-20 mr-4 overflow-hidden rounded-full" src="{{asset('img/photos/endikamontiel.jpg')}}" alt="Endika Montiel">
                                    <div>
                                        <small class="italic text-sm font-normal opacity-75">Conferencista</small>
                                        <p>Endika Montiel</p>
                                        <p class="mt-2 text-sm font-normal opacity-75">Ayuno y Deporte</p>
                                    </div>
                                </div>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500 bg-gray-700" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">1.</span> No eres un robot </p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">2.</span> Microbiota, flexibilidad metabólica y sistema hormonal</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">3.</span> Cronobiología</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">4.</span> Entrenamiento y ejercicio</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <a href="{{asset('files/pdf/cronograma_revolucion_2022.pdf')}}" target="_blank" class="max-w-4xl mx-auto mt-8 block text-center font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">Descarga aquí el cronograma del evento</a>
        </div>
    </section>

    <section class="bg-gray-100">
        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
            <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">Ubicación del <span class="text-red-700">Evento</span></h2>
            <article class="md:flex items-center justify-between bg-gray-50 rounded-lg my-8 overflow-hidden shadow-xl">
                <ul class="md:w-6/12 ml-8 pr-8 py-4">
                    <li class="mb-4 bg-gray-100 py-4 px-2 rounded-xl">
                        <p class="uppercase font-extrabold text-red-700">Dirección</p>
                        <i class="fas fa-map-marker-alt"></i> Ac. 24 #38-47, Bogotá
                    </li>
                    <li class="mb-4 bg-gray-100 py-4 px-2 rounded-xl">
                        <p class="uppercase font-extrabold text-red-700">Lugar</p>
                        <i class="fas fa-home"></i> Ágora Centro de Convenciones
                    </li>
                    <li class="mb-4 bg-gray-100 py-4 px-2 rounded-xl">
                        <p class="uppercase font-extrabold text-red-700">Teléfono</p>
                        <i class="fas fa-phone"></i> 304 609 6274
                    </li>
                    <li class="mb-4 bg-gray-100 py-4 px-2 rounded-xl">
                        <p class="uppercase font-extrabold text-red-700">Correo electrónico</p>
                        <i class="fas fa-envelope"></i> equipodoctorbayter@gmail.com
                    </li>
                </ul>
                <div class="flex-1">
                    <img src="{{asset('img/photos/agora_bog_loc.jpg')}}" alt="">
                </div>
            </article>
        </div>
    </section>

    <section class="bg-gray-100">
        <div class="max-w-5xl mx-auto relative pb-12 px-6 md:px-0">
            <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">¿Necesitas  <span class="text-red-700">Hospedaje?</span></h2>
            <article class="md:flex items-center justify-between  rounded-lg my-8 overflow-hidden">

                <img src="{{asset('img/billboards/RPS_NH_collection-royal-teleport_040.jpg')}}" alt="">
                <div class="md:ml-8 mt-8 md:mt-0">
                    <p>Reserva tu hospedaje en el hotel NH Collection Bogotá Teleport Royal situado en el Parque Empresarial Teleport a un precio espcial exclusivo para los asistentes al evento.</p>
                    <a href="https://www.nh-hoteles.es/event/doctor-bayter-sas " target="_blank" class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Reserva Ahora!</a>
                </div>
            </article>
        </div>
    </section>

    <section class="bg-white" id="go">

            <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
                <header>
                    <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">Adquiere tu entrada ya!</h2>
                    <p class="text-center text-lg font-semibold text-red-700">Preventa disponible por 5 días o hasta la entrada número 50</p>
                </header>

                <section class="flex flex-col-reverse lg:flex-row items-center justify-center">
                    <article class="lg:mr-8  md:w-4/12">
                        <div class="mt-12 border-red-700 border-8 max-w-md mx-auto px-8 py-6 rounded-2xl ">
                            <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-2xl">Entrada <span class="text-red-700">General</span></h2>

                            <p class="text-5xl text-accent-400 font-bold text-center">{{$general->price->name}}</p>
                            <p class="text-center uppercase"><small class="tracking-wide text-gray-600">PRECIO PREVENTA</small></p>

                            <div class="mt-4">
                                <h3 class="font-bold text-xl mb-4 text-center">¿Que incluye?</h3>
                                <ul>
                                    <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Acceso al evento en ubicación general</p></li>
                                </ul>
                                <a href="{{route('payment.checkout', $general)}}" class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Adquierela Ahora!</a>
                            </div>
                        </div>
                    </article>
                    <article class=" md:w-4/12">
                        <div class="mt-12 border-black border-8 max-w-md mx-auto px-8 py-6 rounded-2xl bg-gray-900 text-white ">
                            <h2 class="text-gray-50 text-center leading-none font-black text-2xl md:text-3xl">Entrada <span class="text-red-700">VIP</span>+</h2>

                            <p class="text-5xl text-accent-400 font-bold text-center">{{$plus->price->name}}</p>
                            <p class="text-center uppercase"><small class="tracking-wide text-gray-200">PRECIO 3ra etapa</small></p>

                            <div class="mt-4">
                                <h3 class="font-bold text-xl mb-4 text-center">¿Que incluye?</h3>
                                <ul>
                                    <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg">Acceso al evento en ubicación <span class="text-red-700">VIP</span></p></li>
                                    <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg">Obsequio de recuerdo del evento</p></li>
                                    <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg">Sesión grupal de preguntas<b class=" text-sm text-gray-600 block font-medium">Al finlaizar el evento</b></p></li>

                                </ul>
                                <a class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border cursor-default border-red-700  uppercase transition-colors duration-300 ease-in-out text-lg bg-transparent text-red-700">¡AGOTADO!</a>
                            </div>
                        </div>
                    </article>
                    <article class="lg:ml-8  md:w-4/12">
                        <div class="mt-12 border-red-700 border-8 max-w-md mx-auto px-8 py-6 rounded-2xl ">
                            <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-3xl">Entrada <span class="text-red-700">VIP</span></h2>

                            <p class="text-5xl text-accent-400 font-bold text-center">{{$vip->price->name}}</p>
                            <p class="text-center uppercase"><small class="tracking-wide text-gray-600">PRECIO 2da etapa</small></p>
                            <div class="mt-4">
                                <h3 class="font-bold text-xl mb-4 text-center">¿Que incluye?</h3>
                                <ul>
                                    <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Acceso al evento en ubicación <span class="text-red-700">VIP</span></p></li>
                                    <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Obsequio de recuerdo del evento</p></li>
                                </ul>
                                <a href="{{route('payment.checkout', $vip)}}" class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Adquierela Ahora!</a>
                            </div>
                        </div>
                    </article>
                </section>
            </div>

    </section>
    <section class="py-8 md:py-16 bg-gray-900 bg-opacity-95 px-6 md:px-0">
        <div class="max-w-5xl mx-auto text-gray-50">
            <p class="uppercase text-yellow-500 font-medium text-sm md:text-lg">¿Tienes dudas adicionales?</p>
            <a href="https://wa.me/573046096274" target="_blank" class="text-2xl md:text-6xl font-bold flex items-center leading-none my-4 transition duration-300 ease select-none hover:text-gray-100 hover:underline " title="Escríbemele a mi equipo">
                <span  class="">Escríbenos vía WhatsApp</span>
            </a>
        </div>
    </section>
</x-app-layout>
