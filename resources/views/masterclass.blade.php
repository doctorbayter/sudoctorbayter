<x-app-layout>
    <script type="text/javascript" src="https://load.fomo.com/api/v1/wUgUwvPxkTL3-hhjVamDfw/load.js" async></script>
    <script>
        window.addEventListener('scroll', () => {
          const div = document.getElementById('background');
          const scrollPosition = window.scrollY;
          const blurValue = Math.min(scrollPosition * 0.05, 20); // Máximo de 20px de desenfoque
          const scaleValue = 1 + scrollPosition * 0.00025; // Ajusta este valor según sea necesario
      
          div.style.backdropFilter = `blur(${blurValue}px)`;
          div.style.backgroundSize = `${scaleValue * 100}%`; // Ajusta el zoom de la imagen de fondo
        });
      </script>
    <section class="bg-fixed bg-cover bg-center" id="background" style="background-image: url({{asset('img/backgrounds/bg_black.jpg')}})">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 flex flex-col relative overflow-hidden min-h-screen  items-center justify-between">

            <img src="{{asset('img/gfx/titles/title_masterclass.png')}}" alt="Imagen" class="object-scale-down w-96 my-5">
            <img src="{{asset('img/billboards/baner_predice_tu_enfermedad.png')}}" alt="Imagen" class="object-scale-down w-3/4">
            <img src="{{asset('img/gfx/titles/title_date_masterclass.png')}}" alt="Imagen" class="object-scale-down w-full my-5">
        </div>
    </section>
    <section class="bg-white ">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex relative overflow-hidden py-16 md:py-24">
            <div class="flex flex-col md:flex-row">
                <figure class="flex-1 overflow-hidden ">
                    <img src="{{asset('img/billboards/banner_predice_tu_enfermedad4-5.jpg')}}" alt="" class="w-full object-cover rounded-xl flex-1 overflow-hidden shadow-sm">
                </figure>
                <div class="w-full md:w-6/12 px-4 md:ml-8">
                    <h2 class="text-gray-900 mb-8 leading-none font-black text-2xl md:text-5xl">EVENTO  <b class="text-red-700">ON</b>LINE</h2>
                    <p class="mt-3 text-base text-justify">Este próximo <strong>29 de febrero</strong> se realizará por primera vez el MasterClass <strong>Predice tu enfermedad Metabólica</strong>. Una masterclass diseñada para transformar la manera en que percibes tus análisis de laboratorio.</p>
                    <p class="mt-3 text-base text-justify">En esta <strong>MasterClass</strong>, aprenderás a interpretar los resultados de tus exámenes, identificando señales tempranas de enfermedades y comprendiendo cómo distintos factores pueden influir en tu bienestar.</p>
                    <p class="mt-3 text-base text-justify">No solo desglosaremos los valores y parámetros típicos de un análisis de laboratorio, sino que también te enseñaremos a leer entre líneas, permitiéndote <strong>anticipar riesgos para tu salud antes de que se manifiesten.</strong></p>
                    <p class="mt-3 text-base text-justify">Esta MasterClass es <strong>ideal para cualquier persona que desee tomar un rol activo en su cuidado de salud</strong>, ofreciendo las herramientas necesarias para predecir y prevenir problemas de salud mediante la educación y comprensión de sus propios datos de salud.</p>
                    <p class="mt-3 text-base text-justify">Prepárate para empoderarte, tomar decisiones informadas sobre tu salud y vivir <strong>una vida más sana, energética y feliz</strong></p>
                    
                    <script type="text/javascript">
                        function importHotmart(){ 
                             var imported = document.createElement('script'); 
                             imported.src = 'https://static.hotmart.com/checkout/widget.min.js'; 
                             document.head.appendChild(imported); 
                            var link = document.createElement('link'); 
                            link.rel = 'stylesheet'; 
                            link.type = 'text/css'; 
                            link.href = 'https://static.hotmart.com/css/hotmart-fb.min.css'; 
                            document.head.appendChild(link);	} 
                         importHotmart(); 
                     </script> 
                     <div class="w-full mt-8 mx-auto text-center">
                        <div class="mt-4 text-left">
                           
                            <div class="flex flex-col ">
                                <span class=" text-black font-bold text-2xl">Oferta de <span class="text-red-700">Pre</span>lanzamiento</span>
                                <span class="text-red-700 font-semibold text-6xl">$11.99 USD</span>
                            </div> 
                            <div class="flex">
                                <span class="text-base text-gray-500">Precio Normal <span class="line-through">$15.00 USD</span></span>
                            </div>
                          </div>
                          <a onclick="return false;" href="https://pay.hotmart.com/N90636215D?checkoutMode=2" class="hotmart-fb ">
                            <span class="w-full rounded-full inline-block mt-4 text-2xl font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">ASEGURA TU LUGAR AQUÍ</span>
                        </a> 
                     </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-7xl mx-auto px-6 lg:px-8  relative overflow-hidden pt-16 md:pt-24">
            <div class="flex flex-col-reverse md:flex-row">
                <div class="w-full md:w-5/12 md:mr-8 mt-8 md:mt-0">
                    <h2 class="text-gray-900 mb-4 leading-none font-black text-2xl md:text-5xl">¿Qué es el Método<b class="text-red-700">DKP</b>?</h2>
                    <p class=" text-base text-justify ">Ahora si, <b>DKP</b> es la <strong>Dieta Keto Perfecta</strong>, la única dieta del mundo creada por fases (<b>4 fases</b>). 3 fases de 21 días y 1 una de 7 días.</p>
                    <p class="mt-3 font-bold text-2xl">¿Por qué de esta manera?</p>
                    <p class="mt-4 text-base text-justify">Porque tu cuerpo es una máquina hermosa y perfecta, que no se puede medir y está demostrado científicamente que esta maquinaria vive para adaptarse. Adaptarse al estrés, a las bajas de calorías, a los ayunos y a todo aquello que hace que pueda ocurrir algo malo en tu cuerpo, adaptando todo su sistema hormonal y metabólico en tan solo 21 días.</p>
                </div>
                <figure class=" max-w-2xl">
                    <img src="{{asset('img/billboards/metodo_dkp.jpg')}}" alt="" class=" object-cover">
                </figure>
                <iframe src="https://player.vimeo.com/video/542233951?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen title="Reto 7 - Video Invitaci&amp;oacute;n" class="w-full h-56 md:h-96 rounded-xl flex-1 hidden"></iframe>
            </div>
            <div class=" pb-20">
                <p class="mt-6 text-base text-justify">Por esto cada fase tiene <b>21 días</b>, para evitar la adaptación que es la principal forma como tu cuerpo no deja que sigas bajando de peso. Cuando yo digo, voy a hacer fases de 21 días, lo que quiero es que tu cuerpo nunca se adapte, sigas bajando y perpetúe bajando de peso. Para mi y para las más de 2300 personas que han pasado en el chat con un 97% efectividad.</p>
            </div>
        </div>
    </section>
    <section class="bg-gradient-to-t from-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 pb-24">
            <div>
                <div class=" flex items-center flex-col md:flex-row ">
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="font-medium text-gray-600 mr-2">FASE 1</span> KETO<span class="text-red-700">BAYTER</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">La fase 1, está diseñada de una forma fácil y sencilla. En los primeros 21 días vas a empezar a tener una armonía hormonal la cual se logra cuando decides dejar el dulce. Esta fase tiene un objetivo sublime: dejar la adicción a todo aquello que te está haciendo daño, a todo aquello que está haciendo que tus hormonas estén desordenadas.</p>
                        </div>
                    </div>
                    <figure class="hidden md:block flex-1 ml-4">
                        <img src="{{asset('img/resources/smartmockups_kkok833x.png')}}" alt="" class="w-full object-cover">
                    </figure>
                </div>
            </div>
            <div class="mt-12">
                <div class=" flex items-center flex-col md:flex-row ">
                    <figure class="hidden md:block flex-1 mr-4">
                        <img src="{{asset('img/resources/smartmockups_klog63x.png')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="font-medium text-gray-600 mr-2">FASE 2</span> LIPO<span class="text-red-700">BAYTER</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">Para este momento ya has logrado vencer tus adicciones, tienes claro que no vas a contar calorías, ni a pesar tus alimentos (visualmente ya aprendiste a conocer las cantidades) y tienes los lineamientos básicos. Sin embargo, falta camino por recorrer y aún cuando ya estás disfrutando los beneficios de la dieta Keto Perfecta, todavía te falta conocer tu cuerpo y ver cómo va a reaccionar ahora que reincorporarás por los siguientes 21 días otros alimentos a la dieta.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12">
                <div class=" flex items-center flex-col md:flex-row ">
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="font-medium text-gray-600 mr-2">FASE 3</span> INTER<span class="text-red-700">BAYTER</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">En este momento después de 42 días, viene la otra cachetada a tu organismo. Vas a iniciar los ayunos intermitentes (¡cuando ya no te da hambre!). Por eso los ketobayter iniciamos el ayuno después de 42 días, porque el ayuno debe ser algo natural y vas a aprovechar los beneficios que proporcionan los ayunos al cuerpo. Esta fase es una combinación de la fase 1 más ayunos de lunes a viernes, más la fase 2 los sábados y domingos.</p>
                        </div>
                    </div>
                    <figure class="hidden md:block flex-1 ml-4">
                        <img src="{{asset('img/resources/smartmockups_kkojy9m7-1-.png')}}" alt="" class="w-full object-cover">
                    </figure>
                </div>
            </div>
            <div class="mt-12">
                <div class=" flex items-center flex-col md:flex-row ">
                    <figure class="hidden md:block flex-1 mr-4">
                        <img src="{{asset('img/resources/smartmockups_olpd97x.png')}}" alt="" class="w-full object-cover">
                    </figure>
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <header>
                            <h2 class="text-2xl md:text-3xl font-bold mb-2"><span class="font-medium text-gray-600 mr-2">FASE 4</span> KETO<span class="text-red-700">METABOLISMO</span></h2>
                        </header>
                        <div>
                            <p class="text-gray-700 text-justify">Es la fase mas dura, aquí solo por 7 días y tan solo con 11 alimentos naturales, vas a activar de nuevo una perdida de peso impresionante, pues vamos a desintoxicar tu organismo. ¿Para qué? Para prepararte a la segunda vuelta de la fase 1, o tantas cuanto necesites para cambiar tu energía, cambiar tu vida, cambiar tu salud y como efecto secundario, bajar de peso.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-gray-900">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 py-12 md:py-20  flex flex-col">
            <h2 class="text-xl md:text-3xl font-bold text-gray-50 text-center">SE NECESITAN <span class="text-red-700">5 DÍAS</span> PARA HACER UN RETO, <span class="text-red-700">21 DÍAS</span> PARA DESARROLLAR UN HÁBITO, <span class="text-red-700">70 DÍAS</span> PARA LOGRAR UN ESTILO DE VIDA KETOBAYTER Y <span class="text-red-700">210 DÍAS </span>PARA INICIAR A SANAR TU CUERPO.</h2>
        </div>
    </section>
    <section class="bg-white">
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
    <section class="bg-white">
        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
            <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">¿Qué incluye y cómo funciona la suscripción al Método <span class="text-red-700">DKP</span>?</h2>
            <div class="mt-16 md:mt-8">
                <div class=" flex items-center flex-col-reverse md:flex-row ">
                    <div class="w-full md:w-7/12 bg-gray-50 py-8 px-12 rounded-xl shadow-lg">
                        <p class="text-gray-900 text-justify">Te guiaremos y acompañaremos para que cambies tu vida. con el <b>Método DKP</b> encontrarás las mejores recetas de desayunos, snacks, almuerzos y cenas con los gramos exactos de grasas, proteinas y carbohidratos que necesitas en tu día a día con más de 200 deliciosas opciones diferentes y faciles de preparar.</p>
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
                                <p class="text-base md:text-lg">Los beneficios de una dieta cetogénica han sido bien documentados para quienes viven con diabetes tipo 2. La dieta no solo ayuda a controlar el azúcar en la sangre, sino que también promueve la pérdida de peso. Muchas personas con diabetes que siguen la dieta keto han descubierto que reducen significativamente o incluso descontinúan por completo el uso de insulina y otros medicamentos para la diabetes. Una dieta keto también puede reducir el colesterol y la presión arterial.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="py-8 md:py-16 bg-gray-900 bg-opacity-95 px-6 md:px-0">
        <div class="max-w-5xl mx-auto text-gray-50">
            <p class="uppercase text-yellow-500 font-medium text-sm md:text-lg">¿Tienes dudas adicionales?</p>
            <a href="https://wa.me/573173455477" target="_blank" class="text-2xl md:text-6xl font-bold flex items-center leading-none my-4 transition duration-300 ease select-none hover:text-gray-100 hover:underline " title="Escríbemele a mi equipo">
                <span  class="">Escríbenos vía WhatsApp</span>
            </a>
        </div>
    </section>

</x-app-layout>
