<x-app-layout>
    <section class="xl:bg-fixed bg-cover bg-right" style="background-image: url({{asset('img/backgrounds/hero.jpg')}})">
        <div class="max-w-6xl px-6 mx-auto sm:px-6 lg:px-8 flex relative overflow-hidden">
            <div class="max-w-lg my-24">
                <header class="">
                    <h1 class="text-gray-900 leading-none font-black text-4xl md:text-5xl">Bienvenido a la Dieta <span class="text-red-700">Keto</span> Perfecta</h1>
                    <p class="text-gray-900 mt-4 md:mt-8 mb-4 md:text-xl">Con tu <b>Doctor Bayter</b> el que más sabe de la dieta keto en español del mundo.</p>
                </header>
                <div class="flex mt-12">
                    <figure class="bg-gray-200 rounded-xl w-28 h-36 overflow-hidden shadow-md">
                        <img src="{{asset('img/billboards/banner_dkp.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="flex-1 ml-4">
                        <h3 class="font-bold"><span class="text-red-700">Únete</span> Ya:</h3>
                        <h2 class="font-bold">Método DKP <span class="text-red-700">(Dieta Keto Perfecta)</span></h2>
                        <p class="mt-2 text-sm">Que con tan solo 4 fases te convertira en una verdadera máquina quema grasa!</p>
                        <a href="{{route('dkp')}}" class="inline-block mt-2 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Adquiere aquí tu Plan</a>
                    </div>
                </div>
            </div>
            <div class="absolute right-0 -bottom-8 hidden md:block">
                <figure class="w-100">
                    <img src="{{asset('img/photos/doctor_bayter.png')}}" alt="" class="w-full object-cover">
                </figure>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 flex relative overflow-hidden py-12 md:py-24">

            <div class="flex items-center flex-col-reverse md:flex-row">
            <div class="w-full px-6 md:w-3/6 md:px-0 mt-4 md:mt-0">
                <h2 class="text-gray-900 leading-none font-black text-2xl md:text-5xl">Descubre el Método <span class="text-red-700">DKP</span></h2>
                <p class="mt-4">Descubre el método de la <b>Dieta Keto Perfecta</b> que con san solo 4 fases te convertira en una verdadera máquina quema grasa</p>
                <a href="{{route('dkp')}}" class=" inline-block mt-4 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Aquiere el método DKP hoy</a>
            </div>
            <figure class="rounded-xl flex-1">
                <img src="{{asset('img/resources/keto-app-mobile-web.png')}}" alt="" class="w-full object-cover">
            </figure>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex relative overflow-hidden pb-24">
            <div class="grid grid-cols-1 px-6  gap-x-4 gap-y-4 md:px-6 md:grid-cols-3 md:gap-y-0">
                <article class=" bg-gray-900 flex items-center rounded-lg shadow-md">
                    <figure class="pl-4 mr-4 w-5/12 pt-2">
                        <img src="{{asset('img/photos/doctor_bayter_medico.png')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="flex-1 pr-4">
                        <h2 class=" leading-none font-black text-2xl lg:text-xl xl:text-2xl text-white">Consulta Virtual</h2>
                        <a href="{{route('cita')}}" class=" inline-block mt-4 lg:mt-2 xl:mt-4 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Adquíerela<span class="inline-block md:hidden xl:inline-block ml-2">aquí</span></a>
                    </div>
                </article>
                <article class=" bg-gray-900 flex items-center rounded-lg shadow-md">
                    <figure class="pl-4 mr-4 w-5/12 pt-2">
                        <img src="{{asset('img/photos/doctor_bayter_eventos.png')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="flex-1 pr-4">
                        <h2 class=" leading-none font-black text-3xl lg:text-xl xl:text-2xl text-white">Eventos en Vivo</h2>
                        <a class=" inline-block mt-4 lg:mt-2 xl:mt-4 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Próximamente<span class="inline-block md:hidden xl:inline-block ml-2"></span></a>
                    </div>
                </article>
                <article class=" bg-gray-900 flex items-center rounded-lg shadow-md ">
                    <figure class="pl-4 mr-4 w-5/12 pt-2">
                        <img src="{{asset('img/photos/doctor_bayter_cursos.png')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="flex-1 pr-4">
                        <h2 class="leading-none font-black text-3xl lg:text-xl xl:text-2xl text-white">Cursos Keto Online</h2>
                        <a href="https://ketobayter.com" class=" inline-block mt-4 lg:mt-2 xl:mt-4 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Adquíerelos<span class="inline-block md:hidden xl:inline-block ml-2">aquí</span></a>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <section class="bg-gray-900 ">
        <div class="max-w-7xl mx-auto relative">
            <div class="flex relative">
                <div class="max-w-xl my-16 xl:my-28">
                    <header class="mx-6 xl:mx-0">
                        <h1 class="text-white leading-none font-black text-2xl md:text-5xl">¿Quién es tu Doctor Bayter?</h1>
                        <p class="text-white mt-8 mb-4 text-lg">Médico Especialista en Medicina Crítica y Cuidado IntensivoMédico Especialista en Anestesiólogos y Reanimación.</p>
                        <a href="{{route('doctor')}}" class=" inline-block mt-2 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Conoce más sobre tu Doctor aquí</a>
                    </header>
                </div>
            </div>
            <div class="md:absolute text-center md:text-right right-0 bottom-0">
                <figure class="">
                    <img src="{{asset('img/photos/doctor_bayter_triatleta.png')}}" alt="" class="object-cover w-11/12 md:w-9/12 xl:w-10/12 mx-auto md:mx-px md:ml-auto">
                </figure>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 py-16 md:py-24 px-6 md:px-0">
            <header class="py-4">
                <h2 class="text-xl md:text-3xl text-center mb-4 font-bold text-gray-900">Únete a miles de personas que han alcanzado sus objetivos de pérdida de peso y salud con el Método DKP</h2>
                <p class="text-center max-w-2xl mx-auto mb-8">Estamos muy orgullosos de los miembros de nuestra familia <b>KetoBayter</b> por haber alcanzado sus objetivos de pérdida de peso y salud. Te queremos compartir algunos de ellos.</p>
            </header>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-9">
                <div>
                    <figure>
                        <img src="{{asset('img/testimonios/testimonio_dkp_01.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div>
                        <header class="flex my-4 items-end">
                            <h4 class="font-bold text-xl">Claudia carlomagno</h4>
                            <p class="ml-2 text-gray-600">2 años en Keto</p>
                        </header>
                        <p class="text-sm text-justify"></p>
                    </div>
                </div>
                <div>
                    <figure>
                        <img src="{{asset('img/testimonios/testimonio_dkp_02.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div>
                        <header class="flex my-4 items-end">
                            <h4 class="font-bold text-xl">Carlos Sanin</h4>
                            <p class="ml-2 text-gray-600">1 año en Keto</p>
                        </header>
                        <p class="text-sm text-justify"></p>
                    </div>
                </div>
                <div>
                    <figure>
                        <img src="{{asset('img/testimonios/testimonio_dkp_03.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div>
                        <header class="flex my-4 items-end">
                            <h4 class="font-bold text-xl">Shanna Patiño </h4>
                            <p class="ml-2 text-gray-600">2 años en Keto</p>
                        </header>
                        <p class="text-sm text-justify"></p>
                    </div>
                </div>
                <div>
                    <figure>
                        <img src="{{asset('img/testimonios/testimonio_dkp_04.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div>
                        <header class="flex my-4 items-end">
                            <h4 class="font-bold text-xl">Johana fleischner</h4>
                            <p class="ml-2 text-gray-600">1 años en Keto</p>
                        </header>
                        <p class="text-sm text-justify"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-50 py-16 md:py-24 px-6 md:px-0">
        <header class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-2xl md:text-4xl text-center mb-8 font-bold text-gray-900">Antojate con estás deliciosas recetas <span class="text-red-700">100% Keto</span> que te harán bajar de peso</h2>
        </header>
        <ul class="grid grid-cols-1 gap-x-4 gap-y-4 md:grid-cols-2 md:gap-y-4 md:px-6 xl:px-0 xl:grid-cols-4 xl:gap-y-0 ">

            @foreach ($recipes as $recipe)
            <li>
                <a >
                    <div class="relative overflow-hidden h-52"> 
                        <div class="absolute bottom-0 ml-4 mb-4 font-bold text-lg leading-none text-white z-20">
                            <div class="mt-2 ml-2">
                                <p class="text-lg font-bold text-white">{{$recipe->name}}</p>
                               <div class="flex text-xs items-center">
                                <p class="bg-green-500 px-2 py-1 rounded-lg inline-block  text-white">{{$recipe->carbs}}g Carbs.</p>
                                <p class="text-gray-50 ml-2 flex items-center">
                                    <i class="fas fa-user w-4 mr-1 opacity-70"></i>
                                    <span>1 persona</span>
                                </p>
                                <p class="text-gray-50 ml-2 flex items-center">
                                    <i class="fas fa-clock w-4 mr-1 opacity-70"></i>
                                    <span>{{$recipe->time}} minutos</span>
                                </p>
                               </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-t from-gray-900 opacity-50 absolute w-full h-full z-10"></div>
                        <img src="{{asset('img/'.$recipe->image->url)}}" alt="Receta de {{$recipe->name}}" class=" w-full h-full object-cover">
                    </div>
                </a>
            </li>
            @endforeach

            
        </ul>
    </section>
    <section class="bg-white">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 py-16 md:py-24 px-6 md:px-0">
            <header class="py-4">
                <h2 class="text-2xl md:text-5xl text-center mb-4 font-bold text-gray-900">¿Quieres saber cómo funciona el <span class="text-red-700">Método DKP</span>?</h2>
                <p class="text-center max-w-2xl mx-auto mb-8">Aprende rapidamente lo que necesitas para iniciar la dieta keto perfecta y convertirte en una verdadera maquina quema grasa y por consecuencia mejorar tu salud.</p>
            </header>
            <div class=" max-w-2xl mx-auto">
                <iframe src="https://www.youtube-nocookie.com/embed/jxG4Gm4ls14" title="Mini Curso Método DKP Youtube" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full block h-48 md:h-96"></iframe>
            </div>
            <div class="text-center mt-8">
                <a href="https://www.youtube.com/watch?v=Chn3Mz5GwvY&list=PLiel2pAKOvl8OFFLa3Ia_NVGp3QFxpV7Y" target="_blank" class="inline-block text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Mira el mini curso gratuito en YouTube</a>
            </div>
        </div>
    </section>
    <section class="xl:bg-fixedbg-fixed bg-cover bg-center bg-gray-900 relative" style="background-image: url({{asset('img/billboards/dkp_live.jpg')}})">
        <div class="bg-gradient-to-t from-black opacity-95 absolute w-full h-full "></div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 flex relative overflow-hidden">
            <div class=" py-12 md:py-20 px-6 md:px-0">
                <p class="text-gray-50 mt-4 mb-4 text-xl text-center md:text-4xl md:text-left flex-1 font-bold">No te pierdas mi próximo evento en vivo DKP y aprende todo sobre la Dieta Keto Perfecta</p>
                <a  target="_blank" class="inline-block w-full md:w-auto text-center text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out hover:bg-transparent hover:border-white">Espera nuestro próximo evento</a>
            </div>
        </div>
    </section>
    <section class="bg-gray-50">
        <div class="max-w-5xl mx-auto relative py-16 md:py-24 px-6 xl:px-0">
            <div class="flex items-center flex-col md:flex-row">
                <div class="flex-1">
                    <iframe src="https://player.vimeo.com/video/571757470" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Reto 4 - Video Invitaci&amp;oacute;n" class="w-full h-72"></iframe>
                    
                </div>
                <div class="flex-1 w-full md:w-3/6 md:ml-8 text-center md:text-left">
                    <h2 class="text-5xl mb-4 font-bold text-red-700">Desinflama tu cuerpo en 4 días</h2>
                    <h2 class="text-2xl mb-4 font-bold text-gray-900">¿Estás listo para el Reto?</h2>
                    <p class="mt-4">Te ayudaré a tomar las decisiones correctas en cuanto a la alimentación y  paso a paso te mostraré cómo implementar el plan de la dieta keto perfecta que te llevará a obtener mejores resultados.</p>
                    <a href="https://doctorbayter.co/reto4" class="inline-block mt-4 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Inicia ya el Reto 4 gratis</a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-16 pb-12">
            <header class="py-4">
                <h2 class="text-2xl md:text-5xl text-center mb-4 font-bold text-gray-900">Aprende algo nuevo sobre la dieta keto todos los días</h2>
            </header>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-6 md:px-0">
                <div>
                    <a href="{{route('blog.uno')}}">
                        <figure>
                            <img src="{{asset('img/blog/heros/que-comer.jpg')}}" alt="">
                            <p class="bg-gray-50 text-xs text-gray-400 font-medium py-2 pl-2"><span class="mr-2 font-semibold text-gray-600">Tips de alimentacion</span> 14 de mayo de 2021</p>
                        </figure>
                        <div>
                            <h2 class="font-semibold mb-2 mt-4 text-xl">Qué comer y qué evitar en una dieta cetogénica</h2>
                            <p class="text-sm text-justify">Hoy te compartimos algunos de los alimentos que podrás disfrutar con un estilo de vida cetogénico. Recuerda que aquí contamos carbohidratos netos por 100 gramos de comida, y que tu plato debe estar constituido por 75% grasa, 20% proteína y 5% carbohidrato.</p>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="{{route('blog.dos')}}">
                        <figure>
                            <img src="{{asset('img/blog/heros/beneficios-dieta-cetogenica.jpg')}}" alt="">
                            <p class="bg-gray-50 text-xs text-gray-400 font-medium py-2 pl-2"><span class="mr-2 font-semibold text-gray-600">Salud</span> 17 de mayo de 2021</p>
                        </figure>
                        <div>
                            <h2 class="font-semibold mb-2 mt-4 text-xl">5 beneficios que no conocías de la dieta cetogénica</h2>
                            <p class="text-sm text-justify">Los beneficios de ser keto pueden llegar a ser incomparables a lo que puedes conseguir en otras dietas. Pero para alcanzar cada uno de ellos, debes hacerlo perfecto, ¡SIN ERRORES!</p>
                        </div>
                    </a>
                </div>
           </div>
           <div class="text-center mt-8">
            <a href="{{route('blog')}}" class=" inline-block mt-2 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Aprende más sobre keto aquí</a>
           </div>
        </div>
    </section>

    <section class="pb-4 md:pb-16 pt-10 text-center flex items-center justify-center bg-gray-50">
        <div class="max-w-5xl mx-auto px-6 md:px-0 ">
            <header class="py-4">
                <h2 class="text-2xl md:text-5xl text-center mb-4 font-bold text-gray-900">Escucha mi <strong class="text-red-700">Podcast Keto</strong> de la semana</h2>    
            </header>
            <iframe src="https://anchor.fm/doctor-bayter/embed" class="w-full md:shadow-xl md:border " frameborder="0" scrolling="no"></iframe>
        </div>
    </section>
    <section class="bg-white">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 py-12">
            <header class="py-4">
                <h2 class="text-xl md:text-4xl text-center mb-4 font-bold text-gray-900">Sígueme en todas mis redes</h2>    
            </header>
            <ul class="flex items-center justify-between max-w-xs md:max-w-sm mx-auto">
                <li class="mr-2">
                    <a href="https://facebook.com/doctorbayter" target="_blank" class="w-12 inline-block">
                        <img src="{{asset('img/icons/rrss/facebook.svg')}}" alt="" class="w-full object-cover">
                    </a>
                </li>
                <li class="mr-2">
                    <a href="https://instagram.com/doctorbayter" target="_blank" class="w-12 inline-block">
                        <img src="{{asset('img/icons/rrss/instagram.svg')}}" alt="" class="w-full object-cover">
                    </a>
                </li>
                <li class="mr-2">
                    <a href="https://youtube.com/doctorbayter" target="_blank" class="w-12 inline-block">
                        <img src="{{asset('img/icons/rrss/youtube.svg')}}" alt="" class="w-full object-cover">
                    </a>
                </li>
                <li class="">
                    <a href="https://tiktok.com/@doctorbayter" target="_blank" class="w-12 inline-block">
                        <img src="{{asset('img/icons/rrss/tiktok.svg')}}" alt="" class="w-full object-cover">
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-16">
            <header class="py-4">
                <h2 class="text-2xl md:text-5xl text-center mb-4 font-bold text-gray-50">Nuevos videos todas las semanas</h2>    
            </header>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5 px-6 md:px-0">
                <div>
                    <iframe class="w-full h-48 md:h-auto" src="https://www.youtube-nocookie.com/embed/hDRuAWkjorQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe class="w-full h-48 md:h-auto" src="https://www.youtube-nocookie.com/embed/fbkjaG7uhCw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe class="w-full h-48 md:h-auto" src="https://www.youtube-nocookie.com/embed/DBylYSPUeNk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe class="w-full h-48 md:h-auto" src="https://www.youtube-nocookie.com/embed/WgDgkNf8nuU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
               
            </div>
        </div>
    </section>

    <section class="pb-4 fixed bottom-0 mr-4 right-0  z-50 transition duration-500 delay-3000 ease-in-out opacity-0"
    id="classAd"
    x-data="{$open : true}"
    x-show="$open"
    x-cloak>
        <div class=" w-11/12 md:w-full max-w-2xl mx-auto py-8 px-6 md:px-12  bg-yellow-400 rounded-2xl md:flex shadow-2xl bg-hero-pattern bg-cover bg-center">
            <div class="md:mr-8 flex-1">
                <h3 class="text-yellow-100 bg-red-700 uppercase font-bold inline-block text-base px-4 py-1 rounded-xl mb-4">Aviso importante</h3>
                <h2 class=" hidden text-accent-400 text-3xl mb-4 md:my-2 md:text-6xl font-extrabold leading-none">
                    LA <span class="text-red-700">MEJOR</span> DIETA
                </h2>
                <p class="text-gray-900 text-sm md:text-base mb-4">Si compraste la página con cualquiera de los planes de <b>tu Doctor Bayter</b> antes del día <b class="text-red-700">1 de julio de 2021</b> podrás ingresar a esta página nueva, pero antes debes hacer la actualización de tu contraseña.</p>
                <div class=" text-center md:flex items-center">
                    <a href="{{ route('password.request') }}" target="_blank" class="inline-block font-bold px-8 py-2 text-lg border border-red-700  bg-red-700 bg-accent-400 text-yellow-400 rounded-xl hover:bg-transparent hover:text-red-700" >Actualiza aquí tu contraseña</a>
                    <button x-on:click="$open = !$open; sessionStorage.setItem('classAd', false)" class=" mt-4 md:ml-3 md:mt-0 inline-block font-bold text-lg text-red-700 hover:underline outline-none" >Cerrar mensaje</button>
                </div>
            </div>
            
        </div>
    </section>
    
    
    <script>
        const CLASS_AD = sessionStorage.getItem('classAd');
        let classAdDiv = document.getElementById("classAd");
        
        if(CLASS_AD == "false"){
            classAdDiv.remove();
        } else{
            classAdDiv.classList.add('opacity-100')
        }
    </script>
    
</x-app-layout>
