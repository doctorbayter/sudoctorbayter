<x-app-layout>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <section class="bg-fixed bg-cover bg-black">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 flex flex-col lg:flex-row relative overflow-hidden">
            <figure class="w-full h-5/6">
                <img src="{{asset('img/billboards/total_fitness_xl.jpg')}}" alt="" class="w-full">
            </figure>
        </div>
    </section>

    <section>
        <div class="max-w-7xl mx-auto px-6 lg:px-8  relative overflow-hidden pt-16 md:pt-24">
            <div class="flex flex-col-reverse md:flex-row">
                <div class="w-full md:w-5/12 md:mr-8 mt-8 md:mt-0">
                    <h2 class="text-gray-900 mb-4 leading-none font-black text-2xl md:text-5xl">¿Qué es Total <b>Health & Fitness</b>?</h2>
                    <p class=" text-base text-justify ">El programa Total Health and Fitness by Doctor Bayter es el único programa de entrenamiento diseñado por fases (4 fases): 3 fases de 21 días y 1 una de 7 días.</p>
                    <p class="mt-3 font-bold text-2xl">¿Por qué de esta manera?</p>
                    <p class="mt-4 text-base text-justify">Porque tu cuerpo es una máquina hermosa y perfecta, que no se puede medir y está demostrado científicamente que esta maquinaria vive para adaptarse. Adaptarse en tan solo 21 días. Por esto cada fase tiene 21 días, para evitar la adaptación.</p>
                    <p class="mt-4 text-base text-justify">Lo que empezó con una dieta debe transformarse en un estilo de vida. Por eso, después de iniciar por la alimentación, es importante incorporar el ejercicio.</p>
                </div>
                <figure class=" max-w-2xl">
                    <img src="{{asset('img/billboards/plan_thf.png')}}" alt="" class=" object-cover">
                </figure>
                <iframe src="https://player.vimeo.com/video/542233951?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Reto 7 - Video Invitaci&amp;oacute;n" class="w-full h-56 md:h-96 rounded-xl flex-1 hidden"></iframe>
            </div>
            <div class=" pb-20">
                <p class="mt-6 text-base text-justify">Por esto cada fase tiene <b>21 días</b>, para evitar la adaptación que es la principal forma como tu cuerpo no deja que sigas bajando de peso. Cuando yo digo, voy a hacer fases de 21 días, lo que quiero es que tu cuerpo nunca se adapte, sigas bajando y perpetúe bajando de peso. Para mi y para las más de 2300 personas que han pasado en el chat con un 97% efectividad.</p>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 ">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex relative overflow-hidden py-16 md:py-24">
            <div class="flex flex-col md:flex-row">
                <figure class="rounded-xl flex-1">
                    <img src="{{asset('img/billboards/thf.png')}}" alt="" class="w-full object-cover">
                </figure>
                <div class="w-full md:w-5/12 px-4 md:ml-4">
                    <h2 class="text-gray-900 mb-8 leading-none font-black text-2xl md:text-4xl">¿El ejercicio sirve para <span class="text-red-700">bajar</span>  de peso?</h2>
                    <p class="mt-3 text-base text-justify">No. Todo empieza con lo que metes a tu boca. Sin embargo, el ejercicio es una estrategia para tener un estilo de vida SALUDABLE y tiene grandes beneficios como la prevención de enfermedades degenerativas como Parkinson, Alzheimer y Cáncer, hasta la mejoría cardiovascular, respiratoria, intestinal de tu microbiota, y de las enfermedades metabólicas. Ojo, empezarás a hacer ejercicio no para bajar de peso. Empezarás a hacer ejercicio para curar tu cuerpo y adquirir un estilo de vida SALUDABLE.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-900 mb-12">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 py-12 md:py-20  flex flex-col">
            <h2 class="text-xl md:text-3xl font-bold text-gray-50 text-center">
                RECUERDA: EL EJERCICIO <span class="text-red-700">SUMA</span>, PERO LA ALIMENTACIÓN, <span class="text-red-700">MULTIPLICA.</span>
            </h2>
        </div>
    </section>

    <section class="bg-gradient-to-t from-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 pb-24">
            <div>
                <div class=" flex items-center flex-col md:flex-row ">
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="font-medium text-gray-600 mr-2">FASE 1</span> CREANDO EL <span class="text-red-700">HÁBITO</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">Los primeros 21 días están diseñados con entrenamientos cortos y prácticos, perfectos para practicarlos desde cualquier lugar de tu casa. Esta fase tiene un objetivo sublime: incorporar el ejercicio a tu vida y que se convierta en un HÁBITO.</p>
                        </div>
                    </div>
                    <figure class="hidden md:block flex-1 ml-4">
                        <img src="{{asset('img/resources/thf_f1.png')}}" alt="" class="w-full object-cover">
                    </figure>
                </div>
            </div>
            <div class="mt-12">
                <div class=" flex items-center flex-col md:flex-row ">
                    <figure class="hidden md:block flex-1 mr-4">
                        <img src="{{asset('img/resources/thf_f2.png')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="font-medium text-gray-600 mr-2">FASE 2</span> MÁS <span class="text-red-700">INTENSIDAD</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">Para este momento será tu cuerpo el que te pida hacer ejercicio. Ya tendrás claro cómo hacer algunos de los ejercicios, sin embargo, falta un gran camino por recorrer. En esta fase aumentaremos un poco la intensidad y el tiempo del ejercicio. Serán 21 días maravillosos en los que no dejarás de aprender y lo disfrutarás al máximo.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12">
                <div class=" flex items-center flex-col md:flex-row ">
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="font-medium text-gray-600 mr-2">FASE 3</span> CON <span class="text-red-700">TODA</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">Después de 42 días, estarás listo para hacer entrenamientos de una hora, e incluso más. Por eso el programa está diseñado para aumentar las sesiones en cada uno de tus entrenamientos y también la intensidad. ¡En esta fase estarás arrasando con toda! Y lo mejor, ya verás los resultados en tu cuerpo y tu salud.</p>
                        </div>
                    </div>
                    <figure class="hidden md:block flex-1 ml-4">
                        <img src="{{asset('img/resources/thf_f3.png')}}" alt="" class="w-full object-cover">
                    </figure>
                </div>
            </div>
            <div class="mt-12">
                <div class=" flex items-center flex-col md:flex-row ">
                    <figure class="hidden md:block flex-1 mr-4">
                        <img src="{{asset('img/resources/thf_f4.png')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="font-medium text-gray-600 mr-2">FASE 4</span> SOMOS <span class="text-red-700">TOTAL</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">Finalizamos con los 7 días más exigentes del programa. Después de esta fase, lo ideal es que sigas haciendo tus ejercicios con la misma intensidad y tiempo con el que terminarás el programa. Para este momento el ejercicio ya hará parte de tu estilo de vida, y será un gran complemento para tu alimentación.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white hidden">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 py-24">
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
    <section class="bg-gray-900 ">
        <div class="max-w-7xl mx-auto relative px-6 md:px-0">
            <div class="flex relative">
                <div class="max-w-xl my-12 md:my-28">
                    <header>
                        <h1 class="text-white leading-none font-black text-2xl md:text-5xl">¿Quién es el Doctor Bayter?</h1>
                        <p class="text-white mt-8 mb-4 text-lg">Médico Especialista en Medicina Crítica y Cuidado IntensivoMédico Especialista en Anestesiólogos y Reanimación.</p>
                        <a href="{{route('doctor')}}" class=" inline-block mt-2 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Conoce más sobre tu Doctor aquí</a>
                    </header>
                </div>
            </div>
            <div class="md:absolute right-0 bottom-0">
                <figure class="">
                    <img src="{{asset('img/photos/doctor_bayter_triatleta.png')}}" alt="" class="object-cover w-full md:w-10/12 ml-auto">
                </figure>
            </div>
        </div>
    </section>
    <section class="bg-white hidden">
        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
            <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">¿Qué incluye y cómo funciona la suscripción al Método <span class="text-red-700">DKP</span>?</h2>
            <div class="mt-16 md:mt-8">
                <div class=" flex items-center flex-col-reverse md:flex-row ">
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <p class="text-gray-900 text-justify">Te guiaremos y acompañaremos para que cambies tu vida. con el <b>Método DKP</b> encontrarás las mejores recetas de desayunos, snacks, almuerzos y cenas con los gramos exactos de grasas, proteinas y carbohidratos que necesitas en tu día a día con más de 140 deliciosas opciones diferentes y faciles de preparar.</p>
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
    <section class="bg-gray-900 hidden">
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
                                <p class="text-base md:text-lg">Los beneficios de una dieta cetogénica han sido bien documentados para quienes viven con diabetes tipo 2. La dieta no solo ayuda a controlar el azúcar en la sangre, sino que también promueve la pérdida de peso. Muchas personas con diabetes que siguen la dieta keto han descubierto que reducen significativamente o incluso descontinúan por completo el uso de insulina y otros medicamentos para la diabetes. Una dieta keto también puede reducir el colesterol y la presión arterial.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-gray-100 hidden">
        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
            <header>
                <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-4xl max-w-2xl mx-auto">¿Quieres ser el primero en enterarte del lanzamiento del programa?</h2>
                <p class="text-center max-w-lg mx-auto mt-4 text-lg font-semibold">Inscribete en el pre-registro y no te pierdas la oferta de lanzamiento</p>
            </header>
            <div class="mt-8">
                <div data-tf-widget="LJnxUcrh" data-tf-iframe-props="title=Prospectos THF" data-tf-medium="snippet" style="width:100%;height:600px;"></div><script src="//embed.typeform.com/next/embed.js"></script>
            </div>
        </div>
    </section>


</x-app-layout>
