<x-app-layout>
    @section('title', 'Reto Ayuno Intermitente 5Mer |')
    
    <section class="bg-gradient-to-t from-black to-gray-900 pb-16 pt-4 sm:pt-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex relative overflow-hidden py-8 items-center bg-gray-100 rounded-xl">
            <div class="flex  md:flex-row flex-col ">
                <div class="flex-1 mb-8 sm:mb-0">
                    <figure class="flex-1 overflow-hidden ">
                        <img src="{{asset('img/billboards/banner_5mer_2024_4-5.png')}}" alt="" class="w-full object-cover rounded-xl flex-1 overflow-hidden shadow-sm hidden sm:block">
                        <img src="{{asset('img/billboards/banner_5mer_2024_16-9.png')}}" alt="" class="w-full object-cover rounded-xl flex-1  shadow-sm sm:hidden">
                    </figure>
                    
                    <div class="text-center sm:text-left">
                        
                        <h1 class="text-gray-900 mt-4 mb-0 leading-none font-black text-4xl md:text-6xl">RETO <b class="text-red-700">5</b>MER</h1>
                        <p class="mb-6 font-bold text-xl sm:text-2xl">EL RETO DEL AYUNO</p>
                    </div>
                    <div class="text-justify space-y-2 text-base">
                        <p>Durante 5 días te voy a llevar de la mano, donde juntos vamos a conseguir lo que por separado no has logrado:</p>
                        <p>Cambiar tus hábitos alimenticios, que dejes de satanizar las grasas, logres disminuir los carbohidratos a su mínima expresión, dejes la adicción al azúcar y hagas un ayuno PERFECTO</p>
                        <p>Aprovechando todos los beneficios en salud que este trae. Te voy a demostrar que tan solo en 5 días se desinflamará tu cuerpo, mejorarás tu digestión, mejorarás tu energía y lo más increíble: BAJARÁS DE PESO.</p>
                        <p class="font-bold">Haz clic y únete ahora: y aprende a hacer el ayuno intermitente como lo hace tu Doctor Bayter</p>
                    </div>
                     <div class="w-full mt-4 mx-auto text-center">
                        <div class="mt-4 text-left">
                            <div class="flex flex-col ">
                                <div class="text-center sm:text-left">
                                    <div class="hidden">
                                        <small class="text-base">Precio Sin Descuento</small>
                                        <p class="text-gray-400 line-through font-semibold text-5xl ">$49 USD</p>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-black text-center sm:text-left font-bold text-2xl sm:text-4xl">Aparta tu cupo <span class="text-red-700">Hoy</span></p>
                                        <p class="text-red-700 font-semibold text-5xl sm:text-7xl">$11.99 USD</p>
                                    </div>
                                </div>
                            </div> 
                            <div class="flex">
                                <span class="text-sm sm:text-base text-gray-500  text-center  sm:text-left w-full">PRECIO DE LANZAMIENTO VÁLIDO POR <span class="font-bold text-gray-900">TIEMPO LIMITADO</span></span>
                            </div>
                          </div>
                     </div>
                </div>
                
                <div class="w-full md:w-6/12 px-0 sm:px-4 sm:ml-4 ">

                    <script src="https://checkout.hotmart.com/lib/hotmart-checkout-elements.js"></script>

                    <!--- The div that the checkout should be loaded --->
                    <div id="inline_checkout" class="overflow-hidden h-full"></div>

                    <!--- Configuration --->
                    <script>
                    const elements = checkoutElements.init('inlineCheckout', {
                        offer: 'lx82l6sg',
                    })
                    elements.mount('#inline_checkout')
                    </script>

                    
                </div>
            </div>
        </div>
        <div class="px-4 pt-8 mx-auto w-11/12 sm:w-4/12">
            <figure>
                <img src="{{asset('img/gfx/warranty_badge.png')}}" alt="" class="h-52 w-52 mx-auto">
            </figure>
            <div class="text-center space-y-6 text-white">
                <h3 class="font-bold">Tu inversión segura con garantía de satisfacción de 7 días</h3>
                <p class="text-sm ">Te ofrecemos nuestra garantia de 7 días. Si dentro de este tiempo sientes que no es lo que esperabas o no cumple con tus necesidades, puedes solicitar el reembolso inmediato, sin explicaciones.</p>
                <a href="https://pay.hotmart.com/D91820293W?off=mk5eml4k&checkoutMode=10" target="_blank" class="hotmart-fb sm:hidden">
                    <span class="w-full rounded-full inline-block mt-8  sm:text-2xl font-bold px-4 py-2 border bg-yellow-500 border-yellow-500 text-red-700 uppercase transition-colors duration-300 ease-in-out hover:border-white hover:bg-transparent hover:text-white cta-btn relative overflow-hidden">¡Aparta tu cupo ya!</span>
                </a> 
                <small class="inline mt-0 sm:mt-4"><i class="text-base fas fa-shield-alt"></i> Compra segura y autenticada</small>
            </div>
        </div>
    </section>
    
    <section class="bg-white mb-8">
        <div class="max-w-5xl mx-auto px-6 lg:px-8 pb-12 pt-16">
            
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <header>
                            <h2 class="text-2xl md:text-4xl mb-4 font-bold text-gray-900">¿Qué vas a aprender de este <span class="text-red-700">Reto</span>?</h2>
                        </header>
                        <ul class="mt-8 space-y-8">
                            <li class="mb-4">                    
                                <h3 class="font-bold flex uppercase mb-2"><i class="text-red-700 fas fa-check inline-block mr-2"></i> Recetas Deliciosas y Saciantes</h3>
                                <p class="text-justify">Todas las recetas: desayuno, almuerzo, cena de tu día a día, junto a lista de alimentos y los mejores secretos para hacer un KETO AYUNO PERFECTO</p>
                            </li>
                            <li class="mb-4">                    
                                <h3 class="font-bold flex uppercase mb-2"><i class="text-red-700 fas fa-check inline-block mr-2"></i> Apoyo y Orientación</h3>
                                <p class="text-justify">No estarás solo en este viaje. Tendrás acceso a un grupo CERRADO de Whatsapp (unidireccional, solo envío de información) dirigido por el EQUIPO de tu Doctor Bayter para acompañarte durante estos 5 días.</p>
                            </li>
                            <li class="mb-4">                    
                                <h3 class="font-bold flex uppercase mb-2"><i class="text-red-700 fas fa-check inline-block mr-2"></i> Reunión en Vivo</h3>
                                <p class="text-justify">Tendrás acceso a una reunión grupal a través de link privado para evaluar el progreso de los participantes en el reto, compartir experiencias y continuar por este camino de construir salud.</p>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <figure class="w-full">
                            <!-- Imagen para dispositivos móviles -->
                            <img src="{{asset('img/photos/dr_002.png')}}" alt="Descripción de la imagen" class="block sm:hidden">
                            <!-- Imagen para tablets hacia arriba -->
                            <img src="{{asset('img/photos/dr_001.png')}}" alt="Descripción de la imagen" class="hidden sm:block ">
                       </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="bg-gray-100 py-8">
        <article class="max-w-6xl mx-auto px-6 lg:px-8">
            <h2 class="text-xl md:text-4xl font-bold text-gray-900 text-center my-8 uppercase">Conoce y Domina lo que realmente es hacer un <span class="text-red-700">Ayuno Keto Perfecto</span></h2>
            <p class="text-justify sm:text-center mb-8 text-base sm:text-lg">No solo serán 5 días de recetas, serán 5 días de un acompañamiento exclusivo con el Equipo Keto Bayter, además de todo el material para hacerlo perfecto.</p>
            <h3 class="font-bold text-base sm:text-lg text-center">¿Te surgen dudas? ¿No sabes qué alimentos comprar? ¡No te preocupes! Contarás con una lista de alimentos para estos 5 días. Además, contarás el acceso completo de los mejores secretos para que hagas el ayuno perfecto como lo hace tu Doctor Bayter.</h3>
            <a href="https://pay.hotmart.com/D91820293W?off=hmoo7p81&checkoutMode=10" target="_blank" class="hotmart-fb">
                <span class="w-full my-8 text-center rounded-full inline-block mt-4 text-base sm:text-2xl font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700 ">¡Únete al mejor reto de ayuno!</span>
            </a> 
        </article>
    </section>
    <section class="bg-gray-50 pt-12 pb-24">
        <div class="max-w-7xl mx-auto relative px-6 md:px-0">
            <header class="mb-12">
                <h2 class="text-xl md:text-3xl text-center font-bold text-gray-900">¿PARA QUIEN ES ESTE <span class="text-red-700">RETO</span>?</h2>
                <p class="text-center my-4 text-lg">Este reto está diseñado especialmente para aquellos que están decididos a transformar su vida a través de la alimentación y el ayuno.</p>
            </header>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-9">
                <div class="px-6 py-4 overflow-hidden rounded-xl transition-all duration-300 ease-in-out hover:shadow-xl hover:bg-gray-200 hover:scale-110">
                    <i class="text-5xl text-red-700 mb-4 fa fa-user-plus"></i> 
                    <p class="text-2xl mb-4"><b>Principiantes en Ayuno</b></p>
                    <p class="text-justify">Si estás explorando el Ayuno Intermitente por primera vez y buscas una guía confiable para empezar con el pie derecho, este reto te proporcionará las bases sólidas que necesitas para un inicio exitoso y sostenible.</p>
                </div>
                <div class="px-6 py-4 overflow-hidden rounded-xl transition-all duration-300 ease-in-out hover:shadow-xl hover:bg-gray-200 hover:scale-110">
                    <i class="text-5xl text-red-700 mb-4 fa fa-sync-alt"></i> 
                    <p class="text-2xl mb-4"><b>Intentador Recurrente</b></p>
                    <p class="text-justify">Para aquellos que han intentado hacer Ayunos en el pasado sin éxito y se encuentran listos para darle una nueva oportunidad con una estrategia clara y apoyo constante, este reto es la oportunidad de reescribir su historia con el Ayuno.</p>
                </div>
                <div class="px-6 py-4 overflow-hidden rounded-xl transition-all duration-300 ease-in-out hover:shadow-xl hover:bg-gray-200 hover:scale-110">
                    <i class="text-5xl text-red-700 mb-4 fa fa-lightbulb"></i> 
                    <p class="text-2xl mb-4"><b>Buscador de Claridad</b></p>
                    <p class="text-justify">Si te sientes abrumado por la cantidad de información contradictoria sobre el Ayuno y deseas un enfoque claro, basado en evidencia y fácil de seguir, este reto te brindará la claridad y dirección que necesitas para avanzar con confianza.</p>
                </div>
            </div>
        </div>
    </section>

  
    <section class=" bg-gradient-to-t from-gray-900  to-black px-4 text-white pt-16 pb-8 sm:pb-20">
        <div class="mx-auto w-11/12 sm:w-5/12">
            <h3 class="text-center text-2xl sm:text-4xl font-black mb-5 sm:mb-12">EL CAMINO COMPROBADO PARA LOGRAR UNA VIDA SANA, ENERGÉTICA Y FELIZ, ENSEÑADO POR EL CREADOR DE LA DIETA KETO PERFECTA</h3>
            <div class="grid grid-rows-1  sm:grid-cols-5 sm:gap-x-12 w-full">
                <figure class="w-full overflow-hidden rounded-xl col-span-5 sm:col-span-2">
                    <img src="{{asset('img/photos/dr_003.png')}}" alt="" class="object-cover w-full">
                </figure>
                <div class="mt-4 col-span-3">
                    <h2 class="text-red-700 font-bold text-2xl mb-2">DOCTOR BAYTER</h2>
                    <h3 class="text-lg font-bold">Médico especialista en medicina crítica y cuidado intensivo, lider latinoamericano Bestseller del Libro Comer para Sanar.</h3>
                    <hr class=" h-1 w-28 my-4 border-red-700 border-2">
                    <div class="mt-2 space-y-4 text-lg text-justify">
                        <p>El Doctor Bayter es un destacado médico y cirujano Colombiano lider y referente en la transformación de la salud a través de la alimentación.</p>
                        <p>Con una amplia experiencia en medicina crítica y anestesia, ha redefinido el enfoque hacia la prevención de enfermedades y el mejoramiento de la calidad de vida.</p>
                        <p>Como deportista 100% Keto Perfecto ha realizado más de 28 carreras de triatlón de larga distancia del circuito Ironman.</p>
                        <p>Su innovador Método DKP ha inspirado a miles de personas a adoptar un estilo de vida sanador, demostrando que el poder transformador de una nutrición adecuada puede llevarte a vivir una vida sana, energética y feliz.</p>
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
                        <h2 class="text-white uppercase leading-none font-black text-2xl md:text-3xl">Si de verdad anhelas recuperar tu salud y revertir tu enfermedad. <span class="text-red-700">debes estar dispuesto a dejar atrás lo que te enfermó.</span></h2>
                        <p class="text-white mt-2 mb-4 text-xl font-bold">-Tu Doctor Bayter</p>
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
    <section class="bg-white" >
        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
            <h3 class="text-gray-900 text-center leading-none font-black text-xl md:text-2xl uppercase">Existen dos mejores días para iniciar un cambio en tu vida:</h3>
            <h3 class="text-gray-900 text-center leading-none font-black text-xl md:text-4xl uppercase">Uno fue ayer y el otro es hoy</h3>
            <h3 class="text-red-700 text-center leading-none font-black text-xl md:text-3xl uppercase">Y hoy ya se está acabando</h3>
            <div>
                <div class="text-gray-900">
                    <div id="countdown" class="text-center font-bold text-6xl py-2">
                        <span id="hours">00</span>h : <span id="minutes">00</span>m :<span id="seconds">00</span>s
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                      function updateCountdown() {
                        const now = new Date();
                        const endOfDay = new Date(now);
                        endOfDay.setHours(23, 59, 59, 999); // Establece la hora al final del día
                  
                        const diff = endOfDay - now; // Diferencia en milisegundos
                  
                        const hours = Math.floor(diff / 1000 / 60 / 60);
                        const minutes = Math.floor(diff / 1000 / 60) % 60;
                        const seconds = Math.floor(diff / 1000) % 60;
                  
                        document.getElementById('hours').innerText = hours.toString().padStart(2, '0');
                        document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
                        document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');
                      }
                  
                      updateCountdown(); // Actualiza el contador inmediatamente
                      setInterval(updateCountdown, 1000); // Y luego cada segundo
                    });
                  </script>
            </div>      
            
           <div class="mx-auto" id="comprar">
            <figure class="max-w-xl mx-auto z-50 mt-2">
                <img src="{{asset('img/billboards/banner_5mer_2024_16-9.png')}}" alt="" class="w-full object-cover z-50">
            </figure>
            <div class="bg-gradient-to-t from-gray-900 to-gray-800 -mt-16 z-0 pt-20 max-w-2xl mx-auto overflow-hidden rounded-xl shadow-xl">
                <h3 class="px-4 pb-4 uppercase font-bold text-yellow-500 text-center text-xl">DI SÍ HOY Y OBTÉN TODO LO SIGUIENTE</h3>
                <hr class="border-gray-700">
                <ul class="mt-2 text-white sm:text-xl font-bold">
                    <li class="py-4 px-4 sm:px-8">
                        <div class="flex items-baseline">
                            <i class="text-base sm:text-lg fas fa-check mr-2"></i> 
                            <p>Acceso inmediato por 3 meses al contenido</p>
                        </div>
                        <p class="text-sm font-normal text-justify mt-1">Obtendrás acceso por 45 días a todo nuestro contenido del reto. Esto significa que tendrás la flexibilidad de revisar y aplicar las estrategias una y otra vez, asegurándote de absorber al máximo todos los conocimientos y aplicarlos de manera efectiva que te ayudarán a cumplir tus objetivos.</p>
                    </li>
                    <li class="py-4 px-4 sm:px-8 bg-gray-700">
                        <div class="flex items-baseline">
                            <i class="text-base sm:text-lg fas fa-book mr-2"></i>
                            <p>Recetas y lista de alimentos para los 5 días</p>
                        </div>
                        <p class="text-sm font-normal text-justify mt-1">Deliciosas recetas con la cantidad perfecta de Grasa, Proteina y Carbohidratos para cada comida del día, todas nuestras recetas están diseñadas para disfrutar de platos deliciosos y fáciles de preparar. Además, te proporcionaremos una lista de alimentos esenciales que podrás tener siempre a mano para facilitar tu experiencia.</p>
                    </li>
                    <li class="py-4 px-4 sm:px-8">
                        <div class="flex items-baseline">
                            <i class="text-base sm:text-lg fas fa-lock mr-2"></i>
                            <p>Secretos exclusivos del Doctor Bayter</p>
                        </div>
                        <p class="text-sm font-normal text-justify mt-1">Descubre los secretos y estrategias que el Doctor Bayter ha desarrollado. Estos secretos incluyen desde cómo manejar los antojos hasta consejos para mantenerse en ayuno, todo lo que neceistas para superar este reto con éxito.</p>
                    </li>
                    <li class="py-4 px-4 sm:px-8 bg-gray-700">
                        <div class="flex items-baseline">
                            <i class="text-base sm:text-lg fas fa-comment mr-2"></i>
                            <p>Acceso al Grupo de WhatsApp</p>
                        </div>
                        <p class="text-sm font-normal text-justify mt-1">Acceso a un grupo CERRADO de Whatsapp (unidireccional, solo envío de información) dirigido por el EQUIPO de tu Doctor Bayter para acompañarte durante estos 5 días.</p>
                    </li>
                    <li class="py-4 px-4 sm:px-8">
                        <div class="flex items-baseline">
                            <i class="text-base sm:text-lg fas fa-download mr-2"></i>
                            <p>Descargables: Lista de alimentos y Secretos</p>
                        </div>
                        <p class="text-sm font-normal text-justify mt-1">Para que tu experiencia sea aún más cómoda y accesible, te ofreceremos materiales descargables que podrás consultar en cualquier momento. Esto incluye la lista de alimentos recomendados para seguir el reto sin complicaciones y un compendio de los secretos exclusivos del Doctor Bayter.</p>
                    </li>
                </ul>
                <div class="w-full my-4 mx-auto text-center px-8">
                    <div class="mt-4 text-center">
                        <div class="flex flex-col ">
                            <span class="text-gray-100 font-bold text-xl sm:text-4xl">Oferta Exclusiva <span class="text-red-700">HOY</span></span>
                            <span class="text-red-700 font-semibold text-5xl sm:text-6xl">$11.99 USD</span>
                        </div> 
                        <div class="">
                            <span class="text-xl text-gray-500">Precio Normal <span class="line-through">$15 USD</span></span>
                        </div>
                    </div>
                    <a href="https://pay.hotmart.com/D91820293W?off=hmoo7p81&checkoutMode=10" target="_blank" class="hotmart-fb ">
                        <span class="w-full rounded-full inline-block mt-4 sm:text-2xl font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out hover:border-white hover:bg-transparent hover:text-white cta-btn relative overflow-hidden">Sí, Me uno al reto</span>
                    </a> 
                </div>
                <p class="text-sm sm:text-md text-center px-4 max-w-4xl mx-auto font-bold mt-4 mb-8 text-gray-100">No dejes pasar esta oportunidad. ¡Actúa ya!</p>
            </div>
           </div>
        </div>
    </section>

    <section class="bg-white text-gray-50 pb-8 pt-8 sm:pt-16 ">
        <h2 class="font-bold text-3xl sm:text-5xl text-gray-900 text-center">UNA COMPRA 100% LIBRE DE RIESGO</h2>
       <div class="text-xs sm:text-sm px-4 sm:max-w-4xl mx-auto py-8 text-justify text-gray-800">
            <p><b>Tu inversión segura con nuestra garantía de satisfacción de 7 días.</b> Estamos completamente seguros de nuestro reto y sabemos que va a ser inicio de tu transformación, Si decides que este reto no es para ti o no cumple tus expectativas, puedes solicitar un reembolso completo antes de finalizar los 7 días de garantía que te ofrecemos. Para ello, deberás contactarnos directamente al correo equipodoctorbayter@gmail.com, proporcionando tus datos y la razón para la solicitud de reembolso y emitiremos tu reembolso inmediatamente sin condiciones. Recuerda que estamos comprometidos con la mejora continua para garantizar tu satisfacción.</p>
       </div>
    </section>

    <section class="bg-gray-900" id="preguntas">
        <div class="max-w-5xl mx-auto py-12 md:py-20 faqs-section" id="faqs">
            <h2 class="text-center font-extrabold px-4 text-xl md:text-4xl max-w-2xl mx-auto leading-none text-gray-50 mb-12">Posiblemente tienes alguna de las siguientes dudas</h2>
            <div class="max-w-4xl mx-auto" x-data="{selected:null}">
                <ul class="text-gray-50">
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 1 ? selected = 1 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Cuando inicia este reto?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 1 , 'fa-chevron-down': selected !== 1 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container1" x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-sm md:text-base">Este reto es en vivo tiene una duración de 5 días, inica el día lunes 8 de abril y finaliza el viernes 12 de abril.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 2 ? selected = 2 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Qué me llega al pagar?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-sm md:text-base">Al momento del pago, les llegará un correo de confirmación (al correo registrado al momento del pago) para ingresar al grupo de WhatsApp. La información del reto la tendrás disponible el día viernes 5 de abril en la cuenta registrada. Para acceder a esta, debes iniciar sesión en doctorbayter.com con el correo y contraseña que registraste al momento de realizar el pago.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 3 ? selected = 3 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿A qué hora será la reunión de zoom?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 3 , 'fa-chevron-down': selected !== 3 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-sm md:text-base">La reunión de zoom será a la 1:00 p.m. hora Colombia. el día jueves 11 de abril has lo posible por conectarte y verlas en vivo, en caso de no poder asistir, serán grabadas y enviadas a través de un link tanto por el grupo de WhatsApp como por el correo electrónico que registraron.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800 ">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 4 ? selected = 4 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Qué pasa si no puedo asistir al zoom en vivo?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 4 , 'fa-chevron-down': selected !== 4 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-sm md:text-base">En caso de no poder asistir, la reunión será grabada y enviada a través de un link tanto por tu grupo de WhatsApp como por el correo electrónico que registraste.</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 5 ? selected = 5 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Que pasa si soy alergico a algún alimento?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 5 , 'fa-chevron-down': selected !== 5 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container5" x-bind:style="selected == 5 ? 'max-height: ' + $refs.container5.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-sm md:text-base">En la lista de alimentos que tendrás al adqurir el plande 7 días encontrarás diferentes opciones de alimentos por los que los podrás reemplazar</p>
                            </div>
                        </div>
                    </li>
                    <li class="relative mb-4 rounded-lg bg-gray-800">
                        <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 6 ? selected = 6 : selected = null">
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold md:text-xl">¿Hasta cuando tendré acceso al material del reto?</span>
                                <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 6 , 'fa-chevron-down': selected !== 6 }"></span>
                            </div>
                        </button>
                        <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container6" x-bind:style="selected == 6 ? 'max-height: ' + $refs.container6.scrollHeight + 'px' : ''">
                            <div class="px-6 pt-4 pb-6">
                                <p class="text-sm md:text-base">Finalizado el reto, la información seguirá estando disponible por 3 meses más dentro de la cuenta registrada en doctorbayter.com</p>
                            </div>
                        </div>
                    </li>
                    
                   
                </ul>
            </div>
        </div>
    </section>

    <div class="text-center bg-gray-900 text-gray-200">
        <small class="italic w-full text-center block text-xs  pb-2" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
    </div>


    @push('style')   
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <style>
            .grid-video {
            display: grid;
            }
            .grid-video iframe {
            width: 100%;
            grid-area: 1 / 1 / 2 / 2;
            }
            .grid-video::before {
            width: 0;
            padding-bottom: 56.25%; /* Proporción para 16:9 */
            grid-area: 1 / 1 / 2 / 2;
            content: "";
            }
            .cta-btn:after{
                content: " ";
                display: block;
                position: absolute;
                top: 0;
                left: -120px;
                height: 100%;
                width: 90px;
                background: hsla(0,0%,100%,.4);
                -webkit-transition: all .15s linear;
                transition: all .15s linear;
                -webkit-transform: skewX(-20deg) translateX(0);
                transform: skewX(-20deg) translateX(0);
                -webkit-animation: buttonShine 4s infinite;
                animation: buttonShine 4s infinite;

                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            @-webkit-keyframes buttonShine {
                0% {
                    -webkit-transform: skewX(-20deg) translateX(0);
                    transform:skewX(-20deg) translateX(0)
                }

                90% {
                    -webkit-transform: skewX(-20deg) translateX(0);
                    transform:skewX(-20deg) translateX(0)
                }

                95% {
                    -webkit-transform: skewX(-20deg) translateX(900px);
                    transform:skewX(-20deg) translateX(900px)
                }
            }

            @keyframes buttonShine {
                0% {
                    -webkit-transform: skewX(-20deg) translateX(0);
                    transform:skewX(-20deg) translateX(0)
                }

                90% {
                    -webkit-transform: skewX(-20deg) translateX(0);
                    transform:skewX(-20deg) translateX(0)
                }

                95% {
                    -webkit-transform: skewX(-20deg) translateX(900px);
                    transform:skewX(-20deg) translateX(900px)
                }
            }
        </style>
    @endpush
    @push('scriptsHead')
    @endpush
</x-app-layout>
