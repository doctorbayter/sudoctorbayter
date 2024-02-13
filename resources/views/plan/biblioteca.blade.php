<x-app-layout>
    <div x-data="{ openMenu: false }" >
    
        @php
            if(auth()->user()->subscription){
                $user_plan = auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->sortBy('plan_id')->first();
            }
            $user_fases = auth()->user()->fases->whereIn('id', [1, 2, 3, 4])->sortBy('id');          
        @endphp

        
    
        <div class="flex">
            <x-menu :userPlan="$user_plan->plan_id" />
            <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="bg-white  ml-auto">
    
                <header class="bg-fixed bg-cover shadow-lg bg-gray-800">
                    <div class="w-10/12 mx-auto py-10 text-white">
                        <h3 class="font-bold text-white text-xl px-2 mb-2 inline-block bg-red-700">Aprende todo sobre el Método DKP</h3>
                        <h2 class="font-bold text-6xl ">Biblioteca<span class="text-red-700"> de Contenido</span></h2>
                        <p class="mt-4  text-xl text-justify font-medium text-gray-200">El Doctor Bayter Junto a su equipo han creado está Biblioteca de contenido, donde encontrarás toda la información exclusiva para los miembros del Método DKP. Sabemos que al momento de iniciar este proceso puedes tener muchas dudas y preguntas que estamos seguros en nuestra biblioteca de preguntas encontrarás la respuesta.</p>
                    </div>
    
                </header>
    
                <section class="bg-gradient-to-t from-gray-100 pb-14 ">
                    <div class="w-10/12 mx-auto my-10" x-data="{selected:1}">
                        <section class="mt-0">
                            <div class="">
                                @if ($user_fases->count() > 1)
                                    <div class="mt-8 mb-4">
                                        <h2 class=" font-bold text-6xl">Contenido en <span class="text-red-700">Video</span></h2>
                                        <p class="mt-2 text-justify mb-6">En está página encontrarás algunos videos que te ayudarán en tu proceso para que hagas el Método DKP Perfecto. Información en video donde el Doctor Bayter te explica los aspectos más importantes que debes tener en cuenta asi como los principales efectos sendarios que podrias llegar a sentir.</p>
                                        
                                        <div class="py-4">
                                        <style>
                                            .video-responsive {
                                                position: relative;
                                                overflow: hidden;
                                                padding-top: 56.25%; /* Relación de aspecto 16:9 */
                                            }

                                            .video-responsive iframe {
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                            }
                                            /* Estilos para el icono giratorio */
                                            .loader {
                                            border: 4px solid #f3f3f3;
                                            border-top: 4px solid #3498db;
                                            border-radius: 50%;
                                            width: 20px;
                                            height: 20px;
                                            animation: spin 2s linear infinite;
                                            }

                                            @keyframes spin {
                                            0% { transform: rotate(0deg); }
                                            100% { transform: rotate(360deg); }
                                            }
                                        </style>
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                            <!-- Video Item -->
                                            <div class="video-item" data-video-id="901984363?h=94038ce63f">
                                                <img class="w-full h-auto rounded-xl" src="{{asset('img/thumbnails/bc_hidratacion_11012024.jpg')}}" alt="Biblioteca de Contenido DKP - Hidratacion">
                                                <div class="p-2">
                                                <h3 class="font-bold">Hidratación</h3>
                                                <p class="text-sm text-gray-600">Como debo hidratarme correctamente, cuantos litros de agua debo tomar, cuanta sal por cada litro, todas estas dudas las resultave tu Doctor Bayter en este video sobre la hidratación en el Método DKP.</p>
                                                </div>
                                            </div>
                                            <!-- Video Item -->
                                            <div class="video-item" data-video-id="901989104?h=f9e52ecb83">
                                                <img class="w-full h-auto rounded-xl" src="{{asset('img/thumbnails/bc_diarrea_11012024.jpg')}}" alt="Biblioteca de Contenido DKP - Diarrea y Estreñimiento">
                                                <div class="p-2">
                                                <h3 class="font-bold">Diarrea y Estreñimiento</h3>
                                                <p class="text-sm text-gray-600">De cada 10 personas que inician el Método DKP  9 van a sufir de Estreñimiento y 1 de Diarrea, aprende a como manejarlo y mitigar estos efectos.</p>
                                                </div>
                                            </div>
                                            <!-- Video Item -->
                                            <div class="video-item" data-video-id="902004296?h=123a203496">
                                                <img class="w-full h-auto rounded-xl" src="{{asset('img/thumbnails/bc_suplementos_11012024.jpg')}}" alt="Biblioteca de Contenido DKP - Suplementos">
                                                <div class="p-2">
                                                <h3 class="font-bold">Suplementos</h3>
                                                <p class="text-sm text-gray-600">Los suplementos que toma tu Doctor Bayter, y te invitamos a usarlos en tu día a día, el doctor Bayter te explica cuando usarlos y cuando no.</p>
                                                </div>
                                            </div>
                                            <!-- Video Item -->
                                            <div class="video-item" data-video-id="902011748?h=b6f26b8964">
                                                <img class="w-full h-auto rounded-xl" src="{{asset('img/thumbnails/bc_calambres_11012024.jpg')}}" alt="Biblioteca de Contenido DKP - Calambres">
                                                <div class="p-2">
                                                <h3 class="font-bold">Calambres</h3>
                                                <p class="text-sm text-gray-600">Es muy común que a las personas que están haciendo el Método DKP les de calambres, esto se debe principalmente por deficit de un electrolito, en este video tu Doctor Bayter te explica por qué dan calambres y como puedes evitarlos.</p>
                                                </div>
                                            </div>
                                            
                                            </div>
                                        </div>
                                        
                                        <!-- Pop-up para el reproductor de video -->
                                        <div id="videoModal" class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto h-full w-full z-50">
                                            <div class="relative top-20 mx-auto p-5 border w-11/12 lg:w-6/12 shadow-lg rounded-md bg-white">
                                            <!-- Contenedor para el mensaje de carga -->
                                            <div id="loadingContainer" class="flex justify-center items-center pt-8 pb-4">
                                                <div class="loader"></div>
                                                <p class="ml-2">Espera un momento mientras carga el video...</p>
                                            </div>
                                            <div id="videoContainer" class="hidden video-responsive"></div>
                                            <button class="closeModal text-right"></button>
                                            </div>
                                        </div>

                                        
                                    </div>  
                                @endif
                                
                                <section class="">
                                    <div class=" mx-auto py-6 md:py-12">
                                        <h2 class=" font-bold text-6xl mb-6">Listado de <span class="text-red-700">Preguntas</span></h2>
                                        <p class="mb-4 text-justify">Aquí tienes un listado de preguntas y respuestas más comunes que hemos identificado en las más de 20.000 personas que han iniciado el Método DKP con tu doctor Bayter, si tienes alguna duda estamos muy seguros de que aquí la encontrarás ya que continuamente iremos agregando más contenido y respuestas a más preguntas interesantes, las cuales dividimos por categorias para que puedas acceder a ellas facilmente</p>
                                        <p class="mb-6 text-justify font-bold ">Esta biblioteca la iremos actualizando constantemente, así que recuerda visitarla periodicamente para ir explorando más información y más contenido que seguramente serán de gran ayuda para este hermoso proceso de construir salud.</p>
                                        <div class="mx-auto" x-data="{selected:null}">
                                            <ul class="text-gray-50">
                                                <li class="relative mb-4 rounded-lg bg-gray-800">
                                                    <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 2 ? selected = 2 : selected = null">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <span class="text-lg font-bold md:text-xl">Recetas del Método DKP</span>
                                                                <div>
                                                                    <small class="text-gray-400">Aquí encontrarás preguntas y respuestas sobre las recetas y alimentos del método DKP.</small>
                                                                </div>
                                                            </div>
                                                            <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                                                        </div>
                                                    </button>
                                                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                                        <div class="px-6 pt-4 pb-6 bg-gray-100">
                                                            <div class="text-gray-900">
                                                                <div class="">
                                                                    <ul class="list-decimal px-6 divide-y-2">
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿CÓMO REALIZO EL MÉTODO DKP?</b></p>
                                                                            <p><b class="pr-2">R:</b>Cada ciclo de las cuatro fases dura 70 días, y para completar el Método DKP y asegurar una sanación óptima, se recomienda realizar al menos tres ciclos de estas cuatro fases, lo que equivale a mantener el método durante 210 días.</p>
                                                                            <p class="my-2">El Método DKP es más que una dieta; es un cambio de estilo de vida que se centra en la salud y la prevención de enfermedades, utilizando la alimentación natural y evitando suplementos y alimentos procesados.</p>
                                                                            <p class="my-2">Este método busca enseñar a comer de manera que se alineen las hormonas para convertir el cuerpo en una máquina eficiente de quemar grasa.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿PORQUE SI COMEMOS QUESO  Y NO PODEMOS TOMAR LECHE?</b></p>
                                                                            <p><b class="pr-2">R:</b>Los lácteos se clasifican en 2 , la parte grasosa  que queda arriba y la parte de abajo donde queda la lactosa, es decir agua y azúcar por eso nosotros los ketoperfectos tomamos su parte grasosa de donde se obtienen los quesos.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ TIPOS DE QUESOS DEBO USAR?</b></p>
                                                                            <p><b class="pr-2">R:</b>No compartimos marcas ya que en todos los países existen variedades de quesos, ahora bien puedes usar machengo, gruyer, azul , cheddar , roqueford, camembert, parmesano estos son los más grasos pero puedes elegir los de tu preferencia o que encuentres en tu país
                                                                            </p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUE CANTIDAD DEBO CONSUMIR DE VERDURAS VERDES?
                                                                            </b></p>
                                                                            <p><b class="pr-2">R:</b>Las verduras aportan solo el 5 % de las vitaminas que tu cuerpo necesita  Ahora bien estas iniciando un estilo de vida cetogenico donde vas a consumir 5 %  en las verduras verdes , 25 % de proteínas y 70 % en grasa recuerda  dentro del método  Dkp estas verduras equivalen   a 25  gramos de carbohidratos  al día
                                                                            </p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SI NO TENGO UNA VERDURA POR CUAL LA PUEDO REMPLAZAR?</b></p>
                                                                            <p><b class="pr-2">R:</b>Dentro de tu página encontrarás una amplia lista de alimentos por cada fase donde podrás reemplazar tus verduras por cualquiera de la lista siempre contemplando un máximo de 25 gramos de carbohidratos exclusivamente de verduras verdes.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SI NO ME GUSTA LA PROTEÍNA DEL DIA POR CUAL LA PUEDO CAMBIAR?</b></p>
                                                                            <p><b class="pr-2">R:</b>Dentro de tu página web encontrarás una amplia lista de alimentos donde podrás reemplazar tus proteínas  por cualquiera de la lista, siempre contemplando un máximo para mujeres de 320 gramos al día y para hombre de 380 gramos al día ( puedes elegir la proteína natural que encuentres en tu país y que sea de tu preferencia ) ejemplo : pollo , carne , cerdo o  pescado</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿DEBO CONSUMIR FIBRA?</b></p>
                                                                            <p><b class="pr-2">R:</b>La mejor fuente de  fibra proveniente de las verduras verdes: Las verduras verdes son una excelente fuente de fibra, la cual es esencial para mejorar la regularidad intestinal. Asegúrate de incluir una buena cantidad de estas verduras en tu dieta diaria.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿PUEDO SALTARME LA CENA SI NO TENGO HAMBRE?</b></p>
                                                                            <p><b class="pr-2">R:</b>El Método DKP no está diseñado para ser personalizado o modificado por los usuarios.</p>
                                                                            <p class="my-2">Se espera que las personas que lo sigan lo hagan al pie de la letra, respetando las listas de alimentos permitidos y las recetas diarias para cada día de las 4 fases. Esto es crucial para alcanzar los objetivos de peso y salud propuestos por el método, minimizando o incluso evitando posibles efectos secundarios</p>
                                                                            <p class="my-2">Dentro del Método DKP, el ayuno intermitente solo se introduce en la Fase 3 (Ayuno Intermitente o fase INTER Bayter), donde se practica de forma específica y controlada Esto significa que, hasta alcanzar esa fase, se espera que sigas las pautas alimentarias establecidas, incluyendo las cenas</p>
                                                                            <p class="my-2">Por lo tanto, te recomendaría seguir las instrucciones del Método DKP tal como están planteadas, sin saltarte las cenas, hasta que llegues a la Fase 3 donde el ayuno intermitente se introduce de manera estructurada. Recuerda que cualquier cambio significativo en tu dieta, especialmente si tienes condiciones médicas preexistentes, debe ser discutido con tu médico de cabecera</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿ME PESE Y NO BAJE DE PESO AL CONTRARIO SUBI?</b></p>
                                                                            <p><b class="pr-2">R:</b>Silo haces perfecto jamás vas a subir de peso, puedes estar teniendo líquidos si estás próxima a tu periodo menstrual en el caso de las mujeres, has presentado cuadros de estresado, la recomendación más importante es que te peses en tu día 1 y tu día 21 para evaluar tu proceso, recuerda el método está diseñado para que te conviertas en una máquina quema grasa.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="relative mb-4 rounded-lg bg-gray-800">
                                                    <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 3 ? selected = 3 : selected = null">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <span class="text-lg font-bold md:text-xl">Efectos Secundarios</span>
                                                                <div>
                                                                    <small class="text-gray-400">Los efectos secundarios más comunes y como puedes mitigarlos</small>
                                                                </div>
                                                            </div>
                                                            <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 3 , 'fa-chevron-down': selected !== 3 }"></span>
                                                        </div>
                                                    </button>
                                                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                                        <div class="px-6 pt-4 pb-6 bg-gray-100">
                                                            <div class="text-gray-900">
                                                                <div class="">    
                                                                    <ul class="list-decimal px-6 divide-y-2">
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ PUEDO HACER PARA EL ESTREÑIMIENTO?</b></p>
                                                                            <p><b class="pr-2">R:</b>Es completamente normal que un porcentaje de los pacientes presentan estreñimiento y otro porcentaje diarrea. Tu cuerpo está poniendo toda tu microbiota intestinal perfecta, es importante te hidrates súper bien todo el tiempo, mínimo 3 litros de agua con sal rosada del himalaya, consume suficientes verduras verdes, toma  2 cucharaditas de aceite de ricino en la noche, toma tu magnesio de 400 mg en la noche , por ultimo debes ser paciente y disfrutar el proceso de sanación.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ PUEDO HACER PARA LA DIARREA?</b></p>
                                                                            <p><b class="pr-2">R:</b>Al iniciar la dieta puedes presentar diarrea o estreñimiento en tu caso te sugiero aumentes tu hidratación de 4 a 5 litros de agua con sal rosada del himalaya, si estás tomando magnesio debes suspenderlo por tres días, al cuarto dia reinicias con 200 mg y vas aumentando hasta llegar nuevamente a 400 mg y lo más importante ser muy paciente, es parte de tu proceso de sanación.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SE ME ESTÁ BROTANDO EL CUERPO ES NORMAL?</b></p>
                                                                            <p><b class="pr-2">R:</b>También llamando ketorash es uno de los efectos secundarios de la dieta keto,tu cuerpo produce cuerpos cetónicos y los expulsa por medio del sudor y este te produce una reacción alérgica, primero debes ser muy paciente, aumenta tu hidratación, aplica cualquier crema que tenga corticoides,  se te regulará después de tu semana 12 a 16 aproximadamente</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ PUEDO TOMAR PARA EL INSOMNIO?</b></p>
                                                                            <p><b class="pr-2">R:</b>El insomnio es completamente normal durante las primeras semanas de este cambio de alimentación, tu cuerpo se encuentra en un proceso de adaptación es importante evites tomar café después de las 05:00pm, tomar magnesio de 400 mg en tableta, consuman suficientes verduras durante el día y  ser pacientes</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ PUEDO HACER SI SE ME ESTA CALLENDO EL CABELLO?</b></p>
                                                                            <p><b class="pr-2">R:</b>El efluvio telógeno es un proceso donde los folículos pilosos se van cayendo esto debido al estrés que produce la dieta keto perfecta, se presenta al menos en el 10% de los pacientes que inician este  proceso, ahora bien si llegas a presentar efectos diferentes a la caída te sugiero visites a tu dermatólogo de cabecera.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ PUEDO HACER SI TENGO ANSIEDAD DE COMER DULCE?</b></p>
                                                                            <p><b class="pr-2">R:</b>Tranquilo! Entiendo perfectamente cómo te sientes, pero recuerda que estás haciendo un cambio significativo en tu vida hacia una mejor salud y bienestar. En estos momentos de crisis es crucial recordar el objetivo del Método DKP y los beneficios que traerá a largo plazo. Aquí tienes algunas estrategias para manejar esos antojos:</p>
                                                                            <ul class="my-2 ml-6 list-decimal space-y-2">
                                                                                <li><b>Distrae tu Mente:</b> Realiza alguna actividad que te guste y que te distraiga de los antojos. Puede ser una caminata, leer un libro, llamar a un amigo o cualquier otra actividad que disfrutes</li>
                                                                                <li><b>Hidratación:</b> A veces, los antojos pueden ser señales de deshidratación. Bebe un vaso de agua con una pizca de sal rosada del Himalaya. Esto puede ayudar a controlar el antojo</li>
                                                                                <li><b>Snacks Permitidos:</b> Si realmente necesitas comer algo, elige un tentempié que esté dentro de los alimentos permitidos en la Fase 1 del Método DKP. Por ejemplo, puedes optar por unos palitos de pepino o apio con salsa de queso crema, aceitunas, unos trozos de queso o unos huevos duros</li>
                                                                                <li><b>Refuerza tu Motivación:</b> Recuerda por qué empezaste este camino. Piensa en los beneficios que el Método DKP aportará a tu vida</li>
                                                                                <li><b>Evita Tentaciones:</b> Si es posible, elimina o evita estar cerca de los alimentos que te provocan más antojos</li>
                                                                            </ul>
                                                                            <p>Recuerda, es normal tener antojos al principio. Tu cuerpo se está adaptando a un nuevo estilo de vida más saludable. Mantente firme y enfocado en tus objetivos.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ HACER SI PRESENTO REFLUJO?</b></p>
                                                                            <p><b class="pr-2">R:</b>Entiendo completamente tu preocupación. El reflujo y el manejo del colesterol son temas importantes de salud, y es natural querer ver mejoras al seguir un nuevo plan nutricional como el Método DKP.</p>
                                                                            <p class="py-2">Primero, es esencial destacar que aunque el Método DKP ha demostrado ser efectivo para muchas personas, cada individuo es único y puede experimentar diferentes respuestas. En cuanto a tu situación específica con el reflujo, hay varios aspectos a considerar:</p>
                                                                            <ul class="my-2 space-y-2 list-decimal ml-8">
                                                                                <li><b>Ajuste del cuerpo:</b> Al cambiar a una dieta baja en carbohidratos y alta en grasas como el Método DKP, tu cuerpo pasa por un período de ajuste. Durante los primeros días, es común experimentar algunos síntomas mientras tu cuerpo se adapta a quemar grasas en lugar de carbohidratos.</li>
                                                                                <li><b>Tipos de grasas consumidas:</b> Es importante enfocarse en grasas saludables y evitar aquellas que pueden ser más difíciles de digerir o que podrían desencadenar reflujo. El Método DKP promueve el uso de grasas saludables como el aceite de oliva extra virgen y el consumo de pescados ricos en omega-3. Sin embargo, si ciertos alimentos grasos están exacerbando tu reflujo, podría ser útil revisar y ajustar las fuentes de grasa en tu dieta.</li>
                                                                                <li><b>Tamaño y frecuencia de las comidas:</b> Comer comidas más pequeñas y frecuentes en lugar de pocas comidas grandes puede ayudar a aliviar los síntomas del reflujo.</li>
                                                                                <li><b>Hidratación y sal:</b> Asegúrate de estar adecuadamente hidratado. El Método DKP sugiere el consumo de agua con una pequeña cantidad de sal rosada del Himalaya para mantener un equilibrio electrolítico adecuado, lo cual es vital durante la transición a una dieta cetogénica.</li>
                                                                            </ul>                                                                               
                                                                            <h3 class="my-2 font-bold">PASOS A SEGUIR:</h3>
                                                                            <ul class="my-2 space-y-2 list-disc ml-8">
                                                                                <li><b>Revisar la dieta:</b> Asegúrate de que estás siguiendo el plan de alimentos de la Fase 1 correctamente, enfocándote en las grasas saludables y evitando alimentos que puedan desencadenar el reflujo.</li>
                                                                                <li><b>Vinagre de sidra de manzana:</b> es importante diluir tu vinagre en un poco más de agua </li>
                                                                                <li><b>Consulta médico:</b> Si el reflujo persiste o se intensifica, es crucial consultar a un médico. Aunque el Método DKP es efectivo para muchos, la salud individual puede requerir un enfoque personalizado.</li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿PUEDO TOMAR ANTIACIDOS PARA EL REFLUJO?</b></p>
                                                                            <p><b class="pr-2">R:</b>NO necesitas darle antiácido a tu estómago ya que tu estómago es ácido y lo que necesitas es cuidar esa acidez. La microbiota solo se cuida dejando de darle alimento a las bacterias malas, y a ellas les encanta el carbohidrato.  En este proceso lo que estamos es restaurando todo tu sistema dejando de comer 💩 carbohidratos, frutas, no solo es un problema de comida procesada. La buena noticia es que estás en el camino correcto. Dale unos meses a tu cuerpo y vas a ver la mejoría en todo sentido.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿ES NORMAL QUE TENGA ALTERACIONES EN LA REGLA O PERIODO MENSTRUAL?</b></p>
                                                                            <p><b class="pr-2">R:</b>Al iniciar este cambio de alimentación  es completamente normal que tu periodo menstrual  presente irregularidad, recuerda tu cuerpo se encuentra en un proceso de adaptación, estás dejando tus hormonas, tu microbiota y tu metabolismo perfecto, ahora bien esto se te regulará después de tu semana 12 aproximadamente.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="relative mb-4 rounded-lg bg-gray-800">
                                                    <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 4 ? selected = 4 : selected = null">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <span class="text-lg font-bold md:text-xl">Suplementos</span>
                                                                <div>
                                                                    <small class="text-gray-400">Suplementos necesarios para tu día a día que te ayudarán a mitigar o incluso evitar la mayoria de los efectos secundarios que puedas tener.</small>
                                                                </div>
                                                            </div>
                                                            <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 4 , 'fa-chevron-down': selected !== 4 }"></span>
                                                        </div>
                                                    </button>
                                                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                                        <div class="px-6 pt-4 pb-6 bg-gray-100">
                                                            <div class="text-gray-900">
                                                                <div class="">
                                                                    <ul class="list-decimal px-6 divide-y-2">
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿PARA QUÉ SIRVE EL VINAGRE DE CIDRA DE MANZANA?</b></p>
                                                                            <p><b class="pr-2">R:</b>Importante es que sea vinagre de sidra de manzana orgánico, con "la madre " (partículas suspendidas de color marrón); éstas actúan como probióticos del sistema digestivo, entre sus beneficios más importantes están:</p>
                                                                            <div class="grid lg:grid-cols-3 gap-x-4">
                                                                                <ul class="list-disc px-6 mt-4">
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Mejora la salud</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Compensa las pérdidas de sodio y potasio.</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Regula la glucosa</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Tiene un efecto sobre la sensibilidad de la insulina.</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Ayuda ante el dolor de espalda.</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Beneficia a las articulaciones.</b></p>
                                                                                    </li>
                                                                                </ul>
                                                                                <ul class="list-disc px-6 mt-0 lg:mt-4">   
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Ayuda con los pies hinchados</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Mejora o ayuda a evitar los calambres</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Suaviza el insomnio</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Ayuda ante el hígado graso</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Mejora la hipertensión</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Ayuda en la Diabetes tipo 2</b></p>
                                                                                    </li>
                                                                                </ul>
                                                                                <ul class="list-disc px-6 mt-0 lg:mt-4">
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Coadyudante en la pérdida de peso</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Enlentece el vaciado gástrico</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Prepara el estómago para recibir mejor los alimentos </b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Ayuda en la absorción de nutrientes</b></p>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿PARA QUE SIRVE EL MAGNESIO?</b></p>
                                                                            <p><b class="pr-2">R:</b>Ayuda a aliviar los dolores de cabeza y las migrañas. El magnesio favorece la normalización de determinadas funciones cerebrales. Ésto tiene un efecto relajante en las paredes venosas y, por tanto, el citrato de magnesio ayuda a aliviar la presión de venas y arterias de la cabeza que provoca cefaleas y los dolores de las temidas migrañas. Estas propiedades relajantes favorecen, además, la circulación sanguínea y el sistema cardiovascular. También favorece la relajación y la regeneración muscular. Sufrir de manera habitual calambres durante la noche puede indicar que existe una deficiencia de magnesio. Y es que una de las propiedades del magnesio es que actúa en el organismo como un relajante muscular natural.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿COMO PREPARAR EL SHOT BAYTER?</b></p>
                                                                            <p><b class="pr-2">R:</b>Para preparar tu shot Bayter debes agregar:</p>
                                                                            <ul class=" list-disc px-6 mt-4">
                                                                                <li class="text-base mb-2">
                                                                                    <p><b>Una cucharada de vinagre de sidra de manzana con la madre.</b></p>                            
                                                                                </li>
                                                                                <li class="text-base mb-2">
                                                                                    <p><b>Media cucharadita de sal rosada del Himalaya</b></p>                                                
                                                                                </li>
                                                                                <li class="text-base mb-2">     
                                                                                    <p><b>unas 3 a 5 Gotas de limón</b></p>                                                 
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SE DEBE SUPLEMENTAR EL POTASIO?</b></p>
                                                                            <p><b class="pr-2">R:</b>El potasio sirve para la contracción muscular, Ayuda aliviar los calambres,Disminuir la presión arterial elevada, Prevenir la osteoporosis, ahora bien el potasio lo obtienes de la naturaleza especialmente del  aguacate, tiene 200 mg por cada 100 g, la acelga, brócoli, coles de Bruselas tiene 500 mg por cada 150 g, Champiñón tiene 550 por cada 150g y la espinaca tiene alrededor de 850 mg por cada 100</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿EN QUÉ MOMENTO DEBO TOMAR EL VINAGRE DE CIDRA DE MANZANA?</b></p>
                                                                            <p><b class="pr-2">R:</b>Al iniciar el dia vas a romper ayuno con tu shot bayter, esperar unos minutos y desayunos , ahora bien los dias de ayuno es decir en tu fase 3 vas a romper ayuno con el shot.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿CÓMO DEBO TOMAR EL VINAGRE DE SIDRA DE MANZANA?</b></p>
                                                                            <p><b class="pr-2">R:</b>El vinagre de sidra de manzana se introduce desde la Fase 1 del Método DKP. Se recomienda tomarlo en ayunas, disolviendo en 50 ml de agua 2 cucharadas de vinagre de sidra de manzana, 1 cucharada de zumo de limón, y 1 pizca de sal rosada del Himalaya. Puedes comenzar con solo 1 cucharadita de vinagre y aumentar gradualmente hasta llegar a 2 cucharadas para evitar molestias. Si no toleras bien esta cantidad, puedes aumentar la cantidad de agua. Si no te agrada, puedes suspender su consumo, pero tomarlo trae grandes beneficios .</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ ES MCT?</b></p>
                                                                            <p><b class="pr-2">R:</b>el mct es un triglicérido de cadena media, que se extrae del aceite de coco, se llama de cadena media porque es una energía rápida a diferencia de otros tipos de grasa que son de cadena larga, por eso uso mct para entrenamientos largos, es lo que es el carbohidrato para los atletas.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ COLAGENO PUEDO TOMAR?</b></p>
                                                                            <p><b class="pr-2">R:</b>la mejor fuente de  colágeno 100 % natural la obtienes de las patas de cerdo, patas de pollo, patas de res, espinas del pescado y las verduras verdes, solo debes seguir el plan perfecto ahora bien si en tu pais no encuentras estos alimentos puedes optar por comprar el más natural que encuentres en el mercado.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="relative mb-4 rounded-lg bg-gray-800">
                                                    <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 5 ? selected = 5 : selected = null">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <span class="text-lg font-bold md:text-xl">Salud, Alergias y Medicamentos</span>
                                                                <div>
                                                                    <small class="text-gray-400">Dudas sobre temas de salud, enfermedades, alergias a alimentos y medicamentos.</small>
                                                                </div>
                                                            </div>
                                                            <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 5 , 'fa-chevron-down': selected !== 5 }"></span>
                                                        </div>
                                                    </button>
                                                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container5" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container5.scrollHeight + 'px' : ''">
                                                        <div class="px-6 pt-4 pb-6 bg-gray-100">
                                                            <div class="text-gray-900">
                                                                <div class="">
                                                                    <ul class="list-decimal px-6 divide-y-2">
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUIENES NO PUEDEN REALIZAR EL METODO DKP?</b></p>
                                                                            <div class="grid lg:grid-cols-3 gap-x-4">
                                                                                <ul class="list-disc px-6 mt-4">
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Embarazadas</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Lactantes</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Secuelas de un infarto</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Pacientes en los que la epilepsia es secundaria a un trastorno estructural tipo tumor en el cerebro, malformación arteriovenosa, aneurisma o cualquier masa intracerebral</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b> Cuando tengan una enfermedad asociada a la epilepsia</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Obstrucción arterial (ya sea coronaria, cerebral o de cualquier arteria)</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Infartos previos (cerebral o corazón)</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Enfermedad coronaria reciente</b></p>
                                                                                    </li>
                                                                                </ul>
                                                                                <ul class="list-disc px-6 mt-0 lg:mt-4">   
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Trastornos hepáticos con encimas hepáticas alteradas</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Enfermedad hepática crónica</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Insuficiencia renal o hepática</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Diabéticos tipo 1</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Pacientes con stent coronario, carotideo o cerebral</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Pacientes que se hayan realizado angioplastia coronaria</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>acientes que se hayan realizado Angioplastia</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Pacientes diagnosticados con angina estable o inestable en el pasado</b></p>
                                                                                    </li>
                                                                                </ul>
                                                                                <ul class="list-disc px-6 mt-0 lg:mt-4">
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Pacientes con enfermedad cerebrovascular</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Pacientes con isquemia cerebral transitoria o permanente</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Pacientes con cirrosis o daño hepático</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Índice de masa corporal menor a 18</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Menores de 18 años</b></p>
                                                                                    </li>
                                                                                    <li class="text-base mb-2">
                                                                                        <p><b>Mayores de 80 años</b></p>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SI SOY ALÉRGICO AL HUEVO QUE DEBO HACER?</b></p>
                                                                            <p><b class="pr-2">R:</b>Tus alergias  mejoran después de mínimo  6 meses dentro del método perfecto, en este caso lo ideal es que uses otra proteína natural que encuentres en tu país y que sea grasosa.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SI SOY ALÉRGICO ALGÚN ALIMENTO QUE DEBO HACER?</b></p>
                                                                            <p><b class="pr-2">R:</b>En este caso debes seguir las indicaciones de tu médico de cabecera, dentro del método dkp solo guiamos tu alimentación, es tu médico tratante quien conoce tu historia clínica</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUÉ PASA SI TENGO MIS CETONAS EN 10?</b></p>
                                                                            <p><b class="pr-2">R:</b>Esto quiere decir que estás comiendo grasa para sanarte y no para acomularla, la usas como energía y el resto se va para el hígado a producir cuerpos cetónicos ahora bien tu sangre está llena de energía para tu cerebro y para tus músculos</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SI NO QUIERO BAJAR DE PESO QUE DEBO HACER?</b></p>
                                                                            <p><b class="pr-2">R:</b>En tu caso que no quieres bajar de peso, es importante sigas el método perfecto, consume suficiente proteína durante el día para mujeres entre 300-320 gramos para hombre entre 300-380 gramos o  hasta sentir saciedad, debes complementar tu alimentación con ejercicio de fuerza, ejercicio de peso es así como tu cuerpo empezará a producir músculo,te sugiero busca un buen coach de gimnasio que te pueda asesorar,sigue el  plan perfecto ahora bien si tu cuerpo sigue bajando de peso es porque aún tienes grasa acomulada y la vas a quemar.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿EN CUANTO DEBO TENER MIS NIVELES NORMALES DE COLESTEROL?</b></p>
                                                                            <p><b class="pr-2">R:</b>Los niveles de colesterol son completamente diferentes en cada uno de los pacientes que inician este cambio de alimentación  ahora bien lo ideal es que tus resultados entre 250-300</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿EN CUANTO DEBO TENER MIS NIVELES DE HDL?</b></p>
                                                                            <p><b class="pr-2">R:</b>Los niveles de colesterol HDL  son completamente diferentes en cada paciente que inicia este cambio de alimentación ahora bien lo ideal es que estén arriba de 70</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿EN CUANTO DEBO TENER MIS NIVELES DE TRIGLICÉRIDOS?</b></p>
                                                                            <p><b class="pr-2">R:</b>Los niveles de TRIGLICÉRIDOS  son completamente diferentes en cada uno de los pacientes que inician este cambio de alimentación ahora bien lo ideal es que sea menor de 90</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿QUIENES SÍ PUEDEN REALIZAR EL MÉTODO DKP?</b></p>
                                                                            <p><b class="pr-2">R:</b>Toda aquella persona mayor de 18 años y menor de 80 años que no aplica a la lista de personas que no pueden realizar el método y que quieran mejorar su salud, gozar de una mejor energía , quieran mejorar su composición corporal y usar su grasa como energía</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿CUÁLES SON LOS RIESGOS DE REALIZAR EL MÉTODO DKP?</b></p>
                                                                            <ul class="list-disc px-6 mt-4 font-normal">
                                                                                <li class="text-base mb-2 ">
                                                                                    <p>Dependen de las enfermedades previas que tengas , es importante recalcar que es un método que te ayudará a sanar, se basa en comer natural (pollo, cerdo, pescado, carne, huevo, queso y verduras)</p>
                                                                                </li>
                                                                                <li class="text-base mb-2">
                                                                                    <p>Es importante que tu médico avale,  porque hay ciertas enfermedades que tu no conoces, o no sabes que las tienes, que en los primero meses puede aflorar por  ejemplo ( hipertensión, azúcar, infarto, o hasta la muerte)</p>
                                                                                </li>
                                                                                <li class="text-base mb-2">
                                                                                    <p>Si haces mal el método, no sigues las recomendaciones en especial el tema de la hidratación, hay pacientes que han llegado a urgencias por episodios de deshidratación</p>
                                                                                </li>
                                                                                <li class="text-base mb-2">
                                                                                    <p>El método tiene efectos secundarios que aunque no son graves son molestos dolor de cabeza, gripe, estreñimiento severo, diarrea que pueden agravar condiciones como por ejemplo las hemorroides, por esta razón es importante el acompañamiento de tu médico de cabecera en la ciudad donde estés.</p>
                                                                                </li>
                                                                                <li class="text-base mb-2">
                                                                                    <p>El método no tiene seguimiento médico, es un método de alimentación para ser más saludable, el seguimiento debe ser hecho por tu. Médico tratante</p>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SI SOY HIPERTENSO PUEDO TOMAR AGUA CON SAL?</b></p>
                                                                            <p><b class="pr-2">R:</b>Dentro del método dkp no consumimos excesos de sal solo vas a  reponer la sal que pierde tu cuerpo, es por ello debes agregar 3 gramos de sal por cada litro de agua que tomes al dia (como minimo 3 litros diarios).Al iniciar este cambio de alimentación tu cuerpo pierde agua y sodio.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SI ESTOY TOMANDO MEDICAMENTOS DEBO SUSPENDERLO?</b></p>
                                                                            <p><b class="pr-2">R:</b>Debes seguir las indicaciones de tu médico tratante , dentro del método DKP vamos a guiar tu alimentación, es tu médico tratante quien conoce tu historia clínica y quien decide en qué momento te puede bajar la dosis o suspender completamente tu medicación </p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿PUEDO REALIZAR EL MÉTODO SI MI COLESTEROL ESTA ARRIBA DE 300?</b></p>
                                                                            <p><b class="pr-2">R:</b>Entiendo tu preocupación sobre el colesterol alto y la posibilidad de continuar con el Método DKP. Es crucial destacar que el Método DKP es más que una dieta para perder peso; es un enfoque metabólico integral que busca enseñar a tu cuerpo a usar eficientemente las grasas, tanto las de los alimentos como las corporales, para mejorar tu salud de manera general</p>
                                                                            <p class="py-2">En relación con el colesterol, es importante aclarar que seguir una dieta cetogénica, como la del Método DKP, no implica un riesgo de aumentar tus niveles de colesterol LDL o de desarrollar hígado graso, siempre y cuando sigas el método correctamente y consumas los tipos de grasas recomendadas. De hecho, el Método DKP se enfoca en reducir la activación de la insulina, lo que es beneficioso, ya que la función principal de la insulina es acumular grasa en el cuerpo y en las arterias, lo cual puede contribuir a elevar el colesterol LDL de mala calidad.</p>
                                                                            <p class="py-2">Sin embargo, es crucial señalar que personas con colesterol alto mayor a 300 no deben realizar el método. Dado que mencionas tener un nivel de colesterol de 310, te recomendaría considerar esto cuidadosamente. Es esencial que cualquier decisión sobre tu salud y dieta sea tomada en consulta con tu médico, quien puede ofrecerte un consejo personalizado basado en tu historial médico y tus necesidades específicas.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿PUEDO REALIZAR EL MÉTODO SI ME QUITARON LA VESICULA?</b></p>
                                                                            <p><b class="pr-2">R:</b>Es un mito común que no debes consumir grasa si no tienes vesícula. En realidad, el cuerpo aún puede digerir las grasas, aunque el proceso es un poco diferente.</p>
                                                                            <p class="my2">El Método DKP se basa en una alimentación cetogénica, que incluye grasas saludables. Estas grasas son fundamentales en el método y aportan muchos beneficios. Sin embargo, es importante que inicies el método con atención a cómo tu cuerpo responde a estos cambios en la dieta, especialmente en la Fase 1, que es más restrictiva y enfocada en la adaptación a un estilo de vida bajo en carbohidratos.</p>
                                                                            <p class="my2">Recuerda seguir el método según lo establecido, sin hacer modificaciones, y estar atenta a cualquier señal de tu cuerpo. Si en algún momento sientes malestar o tienes dudas específicas, sería recomendable consultar con un médico que conozca tu historial clínico detallado.</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿PUEDO HACER EL MÉTODO SI TENGO TRIGLICERIDOS ALTOS?</b></p>
                                                                            <p><b class="pr-2">R:</b>ELa clave aquí es entender cómo nuestro cuerpo maneja las grasas. Los triglicéridos se almacenan en nuestro cuerpo como reservas energéticas. En el Método DKP, al reducir la insulina en tu organismo, se activa una hormona llamada lipasa, que es esencial para romper los triglicéridos en ácidos grasos y glicerol, liberándolos de las células grasas.</p>
                                                                            <p class="my-2">Además, al limitar la ingesta de carbohidratos a menos de 25  gramos al día (para una óptima cetosis), no solo evitas activar la insulina, sino que también estimulas la liberación de triglicéridos desde las células grasas hacia la sangre. Estos ácidos grasos son transportados a los tejidos y células para ser utilizados como energía.</p>
                                                                            <p class="my-2">En resumen, al seguir el Método DKP, estás activando mecanismos naturales en tu cuerpo para movilizar y utilizar eficientemente las grasas almacenadas, lo cual puede ayudar en la reducción de triglicéridos</p>
                                                                            <p class="my-2">El Método DKP, creado por el Doctor Jorge Enrique Bayter, es una versión perfeccionada de la dieta cetogénica tradicional. </p>
                                                                            <p class="my-2">Este método se enfoca en la sanación del cuerpo y el metabolismo, utilizando un enfoque estructurado y dividido en fases para lograr resultados óptimos.</p>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="relative mb-4 rounded-lg bg-gray-800">
                                                    <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 6 ? selected = 6 : selected = null">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <span class="text-lg font-bold md:text-xl">Deporte</span>
                                                                <div>
                                                                    <small class="text-gray-400">Si eres un deportista o practicas algún deporte o diciplina deportiva o deseas iniciar a hacer ejercicio y estás haciendo el método.</small>
                                                                </div>
                                                            </div>
                                                            <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 6 , 'fa-chevron-down': selected !== 6 }"></span>
                                                        </div>
                                                    </button>
                                                    <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container6" x-bind:style="selected == 6 ? 'max-height: ' + $refs.container6.scrollHeight + 'px' : ''">
                                                        <div class="px-6 pt-4 pb-6 bg-gray-100">
                                                            <div class="text-gray-900">
                                                                <div class="">
                                                                    <ul class="list-decimal px-6 divide-y-2">
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿A PARTIR DE CUANTO TIEMPO  PUEDO INICIAR EJERCICIO?</b></p>
                                                                            <p><b class="pr-2">R:</b>Puedes iniciar  tus entrenamientos a partir de tu tercera semana dentro del método DKP,  debes tener en cuenta que tu cuerpo se encuentra en un proceso de adaptación, estás cambiando la energía del azúcar por la energía de la grasa y te puedes descompensar, en tu segunda fase puedes iniciar con ejercicios de baja intensidad tipo hit y vas aumenta paulatinamente, debes permanecer muy bien hidratada todo el tiempo antes, durante y después de tus entrenamientos. Ahora bien en el caso que ya vengas  realizando ejercicio puedes continuar siempre y cuando bajes su intensidad y te hidrates todo el tiempo,  tu cuerpo se puede descompensar</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿ ¿QUÉ EJERCICIO ES MEJOR REALIZAR?</b></p>
                                                                            <p><b class="pr-2">R:</b>El más importante es el ejercicio de fuerza. Lo ideal es que tu entrenamiento incluya ejercicio de cardio, pero que tu rutina esté enfocada en aumentar músculo, y eso solo se logra haciendo énfasis en el ejercicio de fuerza, levantar peso y poco a poco ir aumentando el peso (para esto debes conseguir un buen coach en el gym). Cuando construyes músculo, construyes mitocondrias, construyes vida. Por eso se dice que el ejercicio de fuerza, entre muchos beneficios, retarda el envejecimiento</p>
                                                                        </li>
                                                                        <li class="text-base py-6">
                                                                            <p class="text-red-700 text-xl mb-2"><b>¿SOY  DEPORTISTA DEBE CONSUMIR LAS MISMAS CANTIDADES?</b></p>
                                                                            <p><b class="pr-2">R:</b>El método dkp está diseñado con las porciones que tu cuerpo requiere para la energía diaria, lo ideal es que si eres hombre consumas entre 300-380 gramos de proteína y en el caso de las mujeres entre 300-320 gramos de proteína diaria</p>
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
    
                            </div>
                        </section>
                    </div>
                </section>
        </div>
    </div>
    <script>
        document.querySelectorAll('.video-item').forEach(item => {
  item.addEventListener('click', event => {
    const videoId = item.getAttribute('data-video-id');
    const modal = document.getElementById('videoModal');
    const videoContainer = document.getElementById('videoContainer');
    const loadingContainer = document.getElementById('loadingContainer');

    videoContainer.innerHTML = `<iframe src="https://player.vimeo.com/video/${videoId}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`;

    loadingContainer.classList.remove('hidden');
    videoContainer.classList.add('hidden');

    modal.classList.remove('hidden');

    videoContainer.querySelector('iframe').onload = function() {
      loadingContainer.classList.add('hidden');
      videoContainer.classList.remove('hidden');
    };
  });
});

// Función para cerrar el modal y eliminar el video
function closeModal() {
  const videoContainer = document.getElementById('videoContainer');
  videoContainer.innerHTML = ''; // Elimina el contenido del contenedor, deteniendo y eliminando el video
  document.getElementById('videoModal').classList.add('hidden');
}

document.querySelector('.closeModal').addEventListener('click', closeModal);

document.getElementById('videoModal').addEventListener('click', function(event) {
  const videoContainer = document.getElementById('videoContainer');
  const loadingContainer = document.getElementById('loadingContainer');

  if (!videoContainer.contains(event.target) && !loadingContainer.contains(event.target)) {
    closeModal();
  }
});

    </script>
    </x-app-layout>