<x-app-layout>

    @if (\Carbon\Carbon::createFromTimeStamp(strtotime($promo_time['date']))->gt(\Carbon\Carbon::now()))
    <section class="py-16">
        <header class="text-center">
            <h2 class="text-red-700 text-2xl lg:text-4xl  font-bold">¡Felicidades! eres parte del 10% ¿Quieres saber que significa?</h2>
            <p class="text-xl lg:text-4xl  my-4 font-semibold">Mira el siguiente video</p>
        </header>
        <iframe class="w-full h-64 lg:min-h-video" src="https://player.vimeo.com/video/572593198?autoplay=1&loop=0&autopause=0"  frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen ></iframe>
    </section>
    @endif

    <div id="promoAdReto4">

        <div  class="flex items-center justify-center flex-col px-4 py-8 lg:max-w-5xl mx-auto mb-12 border-yellow-400 border-dashed border-2 relative">
            <!-- <i  x-on:click="$open = !$open; localStorage.setItem('promoAd', false)" class="fas fa-times absolute right-0 top-0 mr-2 mt-2 cursor-pointer" title="Cerrar"></i>  -->

            <h3 class="text-2xl lg:text-4xl text-center font-bold uppercase">🎁 Adquiere esta oferta exclusita</h3>
            <p class="text-base  text-gray-400 uppercase my-2">La oferta termina en:</p>
            <div data-countdown="" id="countdown" class="font-bold text-4xl grid grid-cols-4 gap-x-4 h-16 mb-6"></div>
            <a href="{{route('payment.checkout', $plan_oferta)}}" class="bg-gray-900 hover:bg-red-700 text-white font-bold py-2 px-6 border mt-4 rounded uppercase" id="promoText">Adquierelo tu plan fase 1 ahora</a>
        </div>

    </div>

    <section class="bg-fixed bg-cover" style="background-image: url({{asset('img/backgrounds/bg_red.jpg')}})">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 flex flex-col lg:flex-row relative overflow-hidden">
            <div class="max-w-lg mt-20 mb-4 lg:my-24">
                <header class="">
                    <h1 class="text-gray-50 leading-none font-black text-2xl md:text-5xl">Método DKP - <span class="text-red-700">Fase</span> 1</h1>
                    <p class="text-gray-50 mt-6 mb-4 md:text-xl">Descubre la primera fase del método de la Dieta Keto Perfecta que te convertira en una verdadera máquina quema grasa.</p>

                    @auth
                        @can('enrolled', auth()->user()->subscription)
                        <a href="{{route('plan.index')}}" class=" inline-block mt-4 font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">Entra aquí a tu plan</a>
                        @else
                            <div class="text-white text-left py-2 ">
                                @if ($plan_oferta->discount)
                                    @if ($plan_oferta->discount->value != 0 && \Carbon\Carbon::createFromTimeStamp(strtotime($plan_oferta->discount->expires_at))->gt(\Carbon\Carbon::now()))

                                    <div class="font-medium text-6xl flex items-center">
                                        <p class="mr-4 blocktext-gray-100 relative">
                                            <span>{{round($plan_oferta->price->value)}}<small class="text-3xl">US$</small> </span>
                                            <span class="w-full h-1 block absolute left-0 top-2/4 transform -rotate-6 border-b-4 border-red-700"></span>
                                        </p>
                                        <p class="">{{round($plan_oferta->finalPrice)}}<small class="text-3xl">US$</small></p>
                                    </div>

                                        <div class="">
                                            <p class="text-base text-gray-300 mb-2 ">Oferta {{$plan_oferta->discount->name}}</p>
                                            <p class="text-sm text-accent-400 hidden"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($plan_oferta->discount->expires_at))->diffForHumans() }}</b>! </p>
                                        </div>
                                        @else
                                        <p class="text-4xl text-accent-400 font-bold ">{{$plan_oferta->price->name}}</p>
                                    @endif
                                @else
                                    <p class="text-4xl text-accent-400 font-bold ">{{$plan_oferta->price->name}}</p>
                                @endif
                            </div>
                            <a href="{{route('payment.checkout', $plan_oferta)}}" class=" inline-block mt-4 font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Adquierela ya la Fase 1!</a>
                        @endcan
                    @else
                        <div class="text-white text-left py-2">
                            @if ($plan_oferta->discount)
                                @if ($plan_oferta->discount->value != 0 && \Carbon\Carbon::createFromTimeStamp(strtotime($plan_oferta->discount->expires_at))->gt(\Carbon\Carbon::now()))

                                <div class="font-medium text-6xl flex items-center">
                                    <p class="mr-4 blocktext-gray-100 relative">
                                        <span>{{round($plan_oferta->price->value)}}<small class="text-3xl">US$</small> </span>
                                        <span class="w-full h-1 block absolute left-0 top-2/4 transform -rotate-6 border-b-4 border-red-700"></span>
                                    </p>
                                    <p class="">{{round($plan_oferta->finalPrice)}}<small class="text-3xl">US$</small></p>
                                </div>

                                    <div class="">
                                        <p class="text-base text-gray-300 mb-2 ">Oferta {{$plan_oferta->discount->name}}</p>
                                        <p class="text-sm text-accent-400 hidden"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($plan_oferta->discount->expires_at))->diffForHumans() }}</b>! </p>
                                    </div>
                                    @else
                                    <p class="text-4xl text-accent-400 font-bold ">{{$plan_oferta->price->name}}</p>
                                @endif
                            @else
                                <p class="text-4xl text-accent-400 font-bold ">{{$plan_oferta->price->name}}</p>
                            @endif
                        </div>

                        <a href="{{route('payment.checkout', $plan_oferta)}}" class=" inline-block mt-2 font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Adquierela ya la Fase 1!</a>
                    @endauth

                </header>
            </div>
            <figure class="lg:absolute right-0 bottom-0 w-full lg:w-5/12">
                <img src="{{asset('img/photos/doctor_bayter_dkp_3.png')}}" alt="" class="w-full object-cover">
            </figure>
        </div>
    </section>



    <section class="bg-white" id="go">
        @auth
            @can('enrolled', auth()->user()->subscription)
                <div class="text-center py-20 ">
                    <header>
                        <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">Ya estás dentro</h2>
                        <p class="text-center text-lg font-semibold">tu plan actual es {{auth()->user()->subscription->plan->name}}</p>
                    </header>
                    <a href="{{route('plan.index')}}" class=" inline-block mt-4 font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">Entra aquí a tu plan</a>
                </div>
            @else
                <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
                    <header>
                        <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">Da el primer paso. Yo te acompañaré el resto del camino.</h2>

                    </header>


                    <div class="mt-12 border-red-700 border-8 max-w-md mx-auto px-8 py-6 rounded-2xl ">
                        <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-3xl">Método <span class="text-red-700">DKP</span></h2>
                        <p class="text-center mt-4 font-bold text-3xl text-yellow-500">OFERTA PAGO ÚNICO</p>

                        @if ($plan_oferta->discount)

                            @if ($plan_oferta->discount->value != 0 && \Carbon\Carbon::createFromTimeStamp(strtotime($plan_oferta->discount->expires_at))->gt(\Carbon\Carbon::now()))

                                    <p class="text-center font-extrabold text-6xl">{{round($plan_oferta->finalPrice)}} US$</p>
                                    <small class="text-center block font-semibold line-through text-red-700 text-xl">Precio Real {{$plan_oferta->price->name}}</small>
                                <div class="text-center">
                                    <p class="text-base text-gray-700 mb-2">Oferta {{$plan_oferta->discount->name}}</p>
                                    <p class="text-sm text-accent-400 hidden"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($plan_oferta->discount->expires_at))->diffForHumans() }}</b>! </p>
                                </div>
                                @else
                                <p class="text-4xl text-accent-400 font-bold text-center">{{$plan_oferta->price->name}}</p>
                            @endif
                        @else
                            <p class="text-4xl text-accent-400 font-bold text-center">{{$plan_oferta->price->name}}</p>
                        @endif

                        <div class="mt-4">
                            <h3 class="font-bold text-xl mb-4 text-center">¿Que recibes con la fase 1 del Método <span class="text-red-700">DKP</span>?</h3>
                            <ul>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Acceso inmediato y de por vida a la Fase 1 del Método DKP<b class=" text-sm text-gray-600 block font-medium">(Precio normal 110 US$)</b></p></li>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Acceso al chat WhatsApp por 30 días <b class=" text-sm text-gray-600 block font-medium">(Precio normal 37 US$/mes)</b></p></li>
                                <li class="hidden"><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg ">Curso ¿Cómo leer las etiquetas de los alimentos? <b class=" text-sm text-gray-600 block font-medium">(Precio normal 19 US$)</b></p>
                            </ul>
                            <a href="{{route('payment.checkout', $plan_oferta)}}" class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Únete Ahora!</a>
                        </div>
                    </div>
                </div>
            @endcan
        @else
            <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
                <header>
                    <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">Da el primer paso. Yo te acompañaré el resto del camino.</h2>
                </header>

                <section class="flex flex-col-reverse lg:flex-row items-center justify-center">
                    <article>
                        <div class="mt-12 border-black border-8 max-w-md mx-auto px-8 py-6 rounded-2xl bg-gray-900 text-white ">
                            <h2 class="text-gray-50 text-center leading-none font-black text-2xl md:text-3xl">Método <span class="text-red-700">DKP</span> Fase 1</h2>
                            <p class="text-center mt-4 font-bold text-3xl text-yellow-500">OFERTA PAGO ÚNICO</p>

                            @if ($plan_oferta->discount)

                                @if ($plan_oferta->discount->value != 0 && \Carbon\Carbon::createFromTimeStamp(strtotime($plan_oferta->discount->expires_at))->gt(\Carbon\Carbon::now()))

                                        <p class="text-center font-extrabold text-6xl">{{round($plan_oferta->finalPrice)}} US$</p>
                                        <small class="text-center block font-semibold line-through text-red-700 text-xl">Precio Real {{$plan_oferta->price->name}}</small>
                                    <div class="text-center">
                                        <p class="text-base text-gray-400 mb-2">Oferta {{$plan_oferta->discount->name}}</p>
                                        <p class="text-sm text-accent-400 hidden"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($plan_oferta->discount->expires_at))->diffForHumans() }}</b>! </p>
                                    </div>
                                    @else
                                    <p class="text-4xl text-accent-400 font-bold text-center">{{$plan_oferta->price->name}}</p>
                                @endif
                            @else
                                <p class="text-4xl text-accent-400 font-bold text-center">{{$plan_oferta->price->name}}</p>
                            @endif

                            <div class="mt-4">
                                <h3 class="font-bold text-xl mb-4 text-center">¿Que recibes con el la fase 1 del Método <span class="text-red-700">DKP</span>?</h3>
                                <ul>
                                    <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg">Acceso inmediato y de por vida a la Fase 1 del Método DKP<b class=" text-sm text-gray-400 block font-medium">(Precio normal 110 US$)</b></p></li>
                                    <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg">Acceso al chat WhatsApp por 30 días <b class=" text-sm text-gray-400 block font-medium">(Precio normal 37 US$/mes)</b></p></li>
                                    <li class="hidden"><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg">Curso ¿Cómo leer las etiquetas de los alimentos? <b class=" text-sm text-gray-400 block font-medium">(Precio normal 19 US$)</b></p>
                                </ul>
                                <a href="{{route('payment.checkout', $plan_oferta)}}" class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Únete Ahora!</a>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        @endauth
    </section>


    <section class="bg-white">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 pt-12 pb-24">
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

    <section class="bg-white">

        <header class="bg-gray-900 py-12">
            <h2 class="text-gray-50 text-center font-black text-2xl md:text-5xl max-w-5xl mx-auto">¿Qué incluye y cómo funciona la suscripción a la fase 1 del Método <span class="text-red-700">DKP</span>?</h2>

        </header>

        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">

            <div class="mt-16 md:mt-8">
                <div class=" flex items-center flex-col-reverse md:flex-row ">
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <p class="text-gray-900 text-justify">Te guiaremos y acompañaremos con la <b>Fase 1</b> encontrarás las mejores recetas de desayunos, snacks, almuerzos y cenas con los gramos exactos de grasas, proteinas y carbohidratos que necesitas en tu día a día con más de 70 deliciosas opciones diferentes y faciles de preparar.</p>
                    </div>
                    <figure class="mb-4 md:mb-0 flex-1 md:ml-12 overflow-hidden rounded-lg shadow-lg">
                        <img src="{{asset('img/resources/metodo_dkp_37sx.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                </div>
            </div>
            <div class="mt-16 md:mt-8">
                <div class=" flex items-center flex-col md:flex-row ">
                    <figure class="mb-4 md:mb-0 flex-1 md:mr-12 overflow-hidden rounded-lg shadow-lg">
                        <img src="{{asset('img/resources/metodo_dkp_ut7x.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <p class="text-gray-900 text-justify">Encontrarás recursos, herramientas y los secretos mejor guardados de tu <b>Doctor Bayter</b> para mejorar y alcanzar tus objetivos de peso y salud. También encontrarás  consejos y recomendaciones para que mantengas los resultados en el tiempo.</p>
                        <p class="mt-2 text-gray-900 font-bold">Tendrás acceso ilimitado a la pagina, y siempre que existan modificaciones, cambios, tu podrás contar con ellos.</p>
                    </div>

                </div>
            </div>
            <div class="mt-16 md:mt-8">
                <div class=" flex items-center flex-col-reverse md:flex-row ">
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <p class="text-gray-900 text-justify">21 videos exclusivos en la Fase 1 donde te diré cada día, lo que tu cuerpo y mente estarán experimentando y como lo podrás combatir y lograr que estos 21 días sean mucho más fáciles para ti.</p>
                    </div>
                    <figure class="mb-4 md:mb-0 flex-1 md:ml-12 overflow-hidden rounded-lg shadow-lg">
                        <img src="{{asset('img/resources/metodo_dkp_63x.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                </div>
            </div>
            <div class="mt-16 md:mt-8">
                <div class=" flex items-center flex-col md:flex-row ">
                    <figure class="mb-4 md:mb-0 flex-1 md:mr-12 overflow-hidden rounded-lg shadow-lg">
                        <img src="{{asset('img/resources/metodo_dkp_ue66x.jpg')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <p class="text-gray-900 text-justify">Y lo mejor de todo un chat por 30 días donde encontrarás personas que tienen situaciones similares, los mismos problemas, temores y miedos. Pero también tiene tus mismos objetivos que no es mas que dejar la adicción al azúcar. En contratas personas que como tu y como yo algún día decidieron cambiar sus vidas y hoy somos grandes sobrevivientes y junto a mi liderando el chat resolveremos todas tus dudas de alimentación para que no cometas ni un error.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-900">
        <div class="max-w-5xl mx-auto py-12 md:py-20">
            <h2 class="text-center font-extrabold text-3xl md:text-5xl max-w-2xl mx-auto leading-none text-gray-50 mb-12">¿Tienes dudas?</h2>
            <div class=" max-w-4xl mx-auto" x-data="{selected:null}">
                <ul class="text-gray-50">
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 2 ? selected = 2 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Qué necesito para empezar?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg"><span class="font-bold">1.</span> Tomar la decisión la decisión</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">2.</span> Tienes Que Saber en Qué Consiste la Dieta Cetogénica</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">3.</span> Debes Saber Que Alimentos Contienen Carbohidratos</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">4.</span> Debes identificar  Cuáles alimentos Están Permitidos</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">5.</span> Saber Cómo Mitigar los efectos secundarios</p>
                                <p class="text-base md:text-lg mt-4"><span class="font-bold">6.</span> Seguir las recetas al máximo</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 3 ? selected = 3 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Cómo debo contar los macros?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 3 , 'fa-chevron-down': selected !== 3 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg">¡La dieta ketobayter perfecta no es una dieta de macros ni de calorías es una dieta diseñada que contempla la cantidad de carbohidratos que debes consumir en el día.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 4 ? selected = 4 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Es segura la dieta Keto?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 4 , 'fa-chevron-down': selected !== 4 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg">Es una de las dietas más estudiadas en el mundo. las investigaciones sobre las dietas cetogénicas señalan su efectividad para adelgazar en el tiempo experimentando en la mayor parte de los casos muy pocos efectos adversos.</p>
                                <p class="text-base md:text-lg mt-4">Otras investigaciones también confirman la seguridad y eficacia de las dietas muy reducidas en carbohidratos y que inducen cetosis al momento de bajar de peso, por lo que, la duración de la misma no tendría limitaciones siempre y cuando podamos adherir a su práctica.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 5 ? selected = 5 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Puedo hacerla con hígado graso?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 5 , 'fa-chevron-down': selected !== 5 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container5" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container5.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg">La enfermedad de hígado graso no alcohólico es una consecuencia para muchas personas que llevan una dieta pobre, son sedentarias y tienen predisposición genética. Esta enfermedad es reversible si cambiamos el estilo de vida. El abordaje dietoterápico tradicional ha sido una dieta con restricción calórica. Sin embargo, actualmente la dieta cetogénica muestra excelentes resultados en el tratamiento de la enfermedad del hígado graso.</p>
                                <p class="text-base md:text-lg mt-4">La pérdida de peso es esencial cuando se revierte la enfermedad del hígado graso no alcohólico, y una reducción aún mayor en la pérdida de peso es útil para los pacientes con esteatohepatitis no alcohólica (inflamación del hígado acompañada de acumulación grasa).</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 6 ? selected = 6 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Puedo hacerla con el colesterol alto?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 6 , 'fa-chevron-down': selected !== 6 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container6" x-bind:style="selected == 6 ? 'max-height: ' + $refs.container6.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg">Empecemos por las buenas noticias: una dieta baja en carbohidratos y alta en grasas normalmente conlleva una mejora del perfil lipídico. Esto significa que tendrás un menor riesgo de sufrir cardiopatías</p>
                                <p class="text-base md:text-lg mt-4">Los niveles de colesterol pueden aumentar bastante en una minoría de personas que prueban la dieta keto. Sin embargo, el perfil del colesterol normalmente mejora, es decir, el colesterol bueno (HDL) generalmente es el que más sube, esto está relacionado con una reducción del riesgo por sí mismo. Para más información sobre este tema, consulta</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 7 ? selected = 7 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Puedo con diabetes tipo 2?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 7 , 'fa-chevron-down': selected !== 7 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container7" x-bind:style="selected == 7 ? 'max-height: ' + $refs.container7.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-base md:text-lg">Los beneficios de una dieta cetogénica han sido bien documentados para quienes viven con diabetes tipo 2. La dieta no solo ayuda a controlar el azúcar en la sangre, sino que también promueve la pérdida de peso. Muchas personas con diabetes que siguen la dieta keto han descubierto que reducen significativamente o incluso descontinúan por completo el uso de insulina y otros medicamentos para la diabetes. Una dieta keto también puede reducir el colesterol y la presión arterial. </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-gray-100">
        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
            <header>
                <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl max-w-2xl mx-auto">¿No estás seguro de si este método
                    es para ti?</h2>
                <p class="text-center max-w-lg mx-auto mt-4 text-lg font-semibold">Agenda una llamada gratuita con nuestro equipo y obtén respuestas a tus preguntas</p>
            </header>

            <div class="mt-8">
{{--
<div data-tf-widget="v900gdXI" data-tf-iframe-props="title=Reunión Equipo Doctor Bayter" style="width:100%;height:600px;"></div><script src="//embed.typeform.com/next/embed.js"></script>
--}}

<!-- Principio del widget integrado de Calendly -->
<div class="calendly-inline-widget" data-url="https://calendly.com/doctorbayter/llamada?hide_gdpr_banner=1" style="min-width:300px;height:630px;"></div>
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<!-- Final del widget integrado de Calendly -->

            </div>
        </div>
    </section>

    <section class="py-8 md:py-16 bg-gray-900 bg-opacity-95 px-6 md:px-0">
        <div class="max-w-5xl mx-auto text-gray-50">
            <p class="uppercase text-gray-200 font-medium text-sm md:text-lg">¿Estas listo para iniciar?</p>
            <a href="{{route('payment.checkout', $plan_oferta)}}" class="text-2xl md:text-6xl font-bold flex items-center leading-none my-4 transition duration-300 ease select-none hover:text-gray-100 hover:underline ">
                <span class="text-yellow-500" >¡Adquiere tu Fase 1 ahora!</span>
            </a>
        </div>
    </section>




    <script>

        let promoAdDiv = document.getElementById("promoAdReto4");

            // Set the date we're counting down to
            let countdown = document.getElementById('countdown');
            let promoText = document.getElementById('promoText');
            let countdownData = '{{$promo_time["date"]}}'
            var countDownDate = new Date(countdownData).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {
            // Get today's date and time
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = (Math.floor(distance / (1000 * 60 * 60 * 24)));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Time validate and HTML
            let daysHtml = "<span class='leading-none inline-block text-center px-2 py-4 bg-red-700 pt-4 rounded-lg text-gray-50'>"+ days.toString().padStart(2, '0') + " <small class='block text-xs px-1'>DIAS</small> </span>";
            let hoursHtml = "<span class='leading-none inline-block text-center px-2 py-4 bg-red-700 pt-4 rounded-lg text-gray-50'>"+ hours.toString().padStart(2, '0') + "  <small class='block text-xs px-1'>HORAS</small> </span>";
            let minutesHtml = "<span class='leading-none inline-block text-center px-2 py-4 bg-red-700 pt-4 rounded-lg text-gray-50'> "+ minutes.toString().padStart(2, '0') + "  <small class='block text-xs px-1'>MINUTOS</small> </span>";
            let secondsHtml = "<span class='leading-none inline-block text-center px-2 py-4 bg-red-700 pt-4 rounded-lg text-gray-50'>"+ seconds.toString().padStart(2, '0') + " <small class='block text-xs px-1'>SEGUNDOS</small> </span>";
            // Display the result in the element with id="demo"
            countdown.innerHTML = daysHtml + hoursHtml  + minutesHtml + secondsHtml;
            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                countdown.innerHTML = "<p class='col-span-4 text-center mt-auto mb-auto text-red-700'>Tu oferta ha expirado <br> <span class='text-center text-gray-900 w-full font-medium text-xl'>Si realmente deseas adquirir tu plan</span></p>";
                promoText.innerText = "¡Ingresa y compra aquí ya!";
            }
            }, 1000);

    </script>

</x-app-layout>
