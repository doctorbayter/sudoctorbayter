<div x-data="{ openMenu: false }" >
    <div class="flex">
        @can('enrolled', auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->first())
            @can('enrolledFase', $fase)
                <x-menu :userPlan="$user_plan" />
                <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="bg-white  ml-auto">

                    <div class="w-11/12 sm:w-10/12 lg:w-7/12 mx-auto pt-10">
                        @if ($fase->id == 5)
                            <section class=" sm:flex-row-reverse items-center">
                                <figure class=" w-full">
                                     <!-- Imagen para dispositivos móviles -->
                                     <img src="{{asset('img/billboards/7_dias_keto.png')}}" alt="Descripción de la imagen" class="block sm:hidden">
                                     <!-- Imagen para tablets hacia arriba -->
                                     <img src="{{asset('img/billboards/7_dias_keto_large.png')}}" alt="Descripción de la imagen" class="hidden sm:block ">
                                </figure>

                                <section class=" bg-gradient-to-t from-black to-gray-700 px-8 py-12 text-gray-100">
                                    <div>
                                        <h2 class=" font-bold text-xl sm:text-3xl">{{auth()->user()->name}}, te damos la bienvenida a tus primeros 7 días <span class="text-red-700">Keto</span> Perfectos.</h2>
                                        <p class="mt-4 text-justify">Aquí puedes ver todo el contenido exlusivo para los miembros de nuestra comunidad KetoBayter, esta es la puerta de entrada y tendrás todo lo que necesitas para superar esos primeros 7 días.</p>
                                    </div>
                                    <div>
                                        <h2 class="text-xl text-red-700 font-bold mt-12 mb-4 sm:mt-6">Antes de comenzar</h2>
                                        <div>
                                            <p class="text-justify">Es importante que antes de iniciar con tus recetas veas detalladamente los <b>Secretos y Tips</b> que el Doctor Bayter ha revelado para que hagas este proceso perfecto y seguramente vas a necesitar.</p>
                                            <a href="{{asset($fase->resources()->find(9)->url)}}" target="_blank">
                                                <span class="w-full sm:w-96 text-center rounded-full mt-4 block text-xs sm:text-lg font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:border-gray-200 hover:text-gray-100">DESCARGA AQUí LOS SECRETOS</span>
                                            </a> 
                                        </div>
                                        <div class="mt-8">
                                            <p class="text-justify">Además tienes una lista de los alimentos, que vas a necesitar para está semana. Este listado contiene todos los alimentos esenciales para la primera semana de recetas. Solo se permiten los productos incluidos en la lista; por lo tanto, si no encuentras algún alimento específico aquí, significa que no está permitido o no será necesario.</p>
                                            <a href="{{asset($fase->resources()->find(8)->url)}}" target="_blank">
                                                <span class="w-full sm:w-96 text-center rounded-full mt-4 block text-xs sm:text-lg font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:border-gray-200 hover:text-gray-100">DESCARGA LA LISTA DE ALIMENTOS</span>
                                            </a> 
                                        </div>
                                    </div>
                                </section>
                            </section>
                            @if ($this->day->day !=8)
                                <section class="sm:w-12/12 mx-auto bg-gray-100 mt-8 sm:px-8 pt-2 pb-12 rounded-xl shadow-lg">
                                    <div class="px-8">
                                        <h2 class="text-3xl  font-bold mt-12 mb-4">Escucha el <span class="text-red-700"> audio del día {{$this->day->day}}</span></h2>
                                        <div>
                                            <p class="text-justify mb-4">Escucha a continuación el audio que el Doctor Bayter ha preparado para acompañarte en estos primero 7 días donde te explicará día a día como va avanzando tu proceso, cuales efectos puedes sentir y como mitigarlos.</p>

                                            @if ($this->day->video) 
                                                <div class="relative w-full mt-8 ">
                                                    {!! $this->day->video->iframe !!}
                                                </div> 
                                            @endif
                                        </div>
                                    </div>
                                </section>
                            @endif
                        @else
                            <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}}?v={{ time() }})">
                                <div class="w-12/12 mx-auto py-10">
                                    <h3 class="font-bold text-white text-lg md:text-xl px-2 inline-block bg-red-700"> {{$fase->name}}</h3>
                                    <h2 class=" font-bold text-3xl md:text-6xl"> {!!$fase->sub_name!!}</h2>
                                    <p class="text-base text-gray-600 mt-2">{{$fase->descripcion}}</p>

                                    @if ($fase->id != 19000 || auth()->user()->id == 13706)
                                        <section class=" flex items-center flex-col md:flex-row mt-4 ">
                                            @foreach ($fase->resources->sortBy('created_at') as $resource)
                                                    <a  href="{{asset($resource->url)}}" target="_blank" class="text-white text-xs mt-4 md:mt-0 md:text-sm xl:text-base border @if ($loop->first) md:mr-3 @endif cursor-pointer border-red-700 bg-red-700 hover:text-red-800 hover:bg-white inline-block font-bold px-6 py-2 rounded-full">Descargar {{$resource->name}}</a>
                                            @endforeach
                                        </section>
                                    @endif
                                </div>
                            </header>
                        @endif
    
                        <div class="hidden">{{$this->day->id}}</div>
                        @if ($fase->id == 19000 && auth()->user()->id != 13706 )
                            <div class="flex flex-col space-y-4 min-w-screen py-16 animated fadeIn faster  justify-center items-center outline-none focus:outline-none bg-gray-900">
                                <div class="flex flex-col p-8 bg-white shadow-md hover:shodow-lg rounded-2xl">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="hidden md:block w-16 h-16 rounded-2xl p-3 border border-yellow-100 text-yellow-400 bg-yellow-50" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <div class="flex flex-col ml-3">
                                                <div class=" leading-none font-bold text-red-700">¡Aviso Importante!</div>
                                                <p class="text-sm text-gray-600 leading-none mt-1">El reto <b>En Nevidad 2023</b> Dará inicio el <b>9 de Enero de 2024</b></p>
                                                <p class="text-sm text-gray-600 leading-none mt-1">por ahora puedes ingresar a <a class="text-white text-sm border cursor-pointer border-red-700 bg-red-700 hover:text-red-800 hover:bg-white inline-block font-bold px-4 py-2 rounded-full" href="https://doctorbayter.com/reto/desafio/whatsapp" target="_blank" rel="noopener noreferrer"><b>El grupo de Whatsapp</b></a> Dirigido por <b>El Equipo de Tu Doctor Bayter</b></p>
                                                <p class="text-sm text-gray-600 leading-none mt-1">Recurda que: <b>Toda la información del reto quedará activa el día viernes 5 de Enero de 2024 (Recetas, Lista de alimentos y Secretos)</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else

                            <section class="bg-gradient-to-t from-gray-100 pb-8 md:pb-14 ">
                                @php
                                    if ($fase->id == 5) {
                                        $selected = 0;
                                    }elseif (($this->day->day / 7) <=1) {
                                        $selected = 0;
                                    }elseif (($this->day->day / 7) <=2 && ($this->day->day / 7) >1) {
                                        $selected = 1;
                                    }elseif (($this->day->day / 7) <=3 && ($this->day->day / 7) >2) {
                                        $selected = 2;
                                    }
                                @endphp
                                <div class="w-12/12 mx-auto my-10" x-data="{selected:{{$selected}}}">

                                    <section class="mt-8 mb-20">
                                        <div class="grid grid-cols-{{$fase->weeks->count()}} text-center">
                                            @foreach ($fase->weeks as $key => $week)
                                                <div class="border border-gray-100 font-bold cursor-pointer bg-gray-50 rounded-tl-md relative">
                                                    <div class="text-red-700 border-b-4 text-xs md:text-base py-3 md:py-4  hover:text-red-700" @click="selected = {{$key}}" x-bind:class="{ 'bg-red-800 border-gray-700   ': selected == {{$key}}, 'border-gray-300 ': selected !== {{$key}} }">
                                                        <img src="{{asset('img/icons/gfx/calendar_color.svg')}}" alt="" class="w-3 md:w-5 mr-2 inline">
                                                        <span x-bind:class="{ ' text-gray-50  ': selected == {{$key}}, 'text-red-700': selected !== {{$key}} }">{{ $fase->id == 5 ? 'Recetas de la Semana' : $week->name }}</span>
                                                    </div>

                                                    @if ($week->pivot->resource)
                                                        <div>
                                                            <a href="{{asset($week->pivot->resource)}}" target="_blank" class=" font-semibold md:font-bold md:text-sm text-xs py-2 w-full block text-white" x-bind:class="{ 'bg-gray-900 ': selected == {{$key}}, 'bg-gray-200 ': selected !== {{$key}} }">
                                                                <span ><span class="hidden sm:inline">Descargar</span> lista de alimentos</span>
                                                            </a>

                                                        </div>
                                                    @endif

                                                    <div class="grid overflow-hidden h-0 md:h-auto grid-cols-{{$this->days}} text-center shadow-md  absolute w-full " x-bind:class="{ 'grid': selected == {{$key}} , 'hidden': selected !== {{$key}} }">
                                                        @foreach ($week->days->sortBy('day') as $day)

                                                            @if ($day->fase->id == $fase->id)
                                                                <div wire:click="setDay({{$day}})" class="font-semibold text-xs @if ($this->day->day == $day->day) bg-red-700 text-red-100 cursor-default @else bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer @endif  py-2   "><span class="hidden md:block xl:inline">Día</span> {{$day->day}} </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                            @foreach ($fase->weeks as $key => $week)
                                                <div class="w-10/12 grid md:hidden overflow-hidden grid-cols-{{$this->days}} text-center shadow-md absolute " x-bind:class="{ 'grid': selected == {{$key}} , 'hidden': selected !== {{$key}} }">
                                                    @foreach ($week->days as $day)

                                                        @if ($day->fase->id == $fase->id)
                                                            <div wire:click="setDay({{$day}})" class="font-semibold text-xs @if ($this->day->day == $day->day) bg-red-700 text-red-100 cursor-default @else bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer @endif  py-2 "><span class="hidden md:inline">Día</span> {{$day->day}}</div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endforeach
                                    </section>

                                    <section class="pt-16  ">
                                        @if ( $fase->id == 5 && $this->day->day == 8)
                                            @if ($subscriptionPlanExists == false)
                                                @if ($upsell21 == true)
                                                    <div class="bg-gradient-to-t from-black to-gray-900 w-full -mt-32 pt-16">
                                                        <section class="px-2 pb-16 sm:max-w-4xl mx-auto ">
                                                            <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/922071936?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;autoplay=1" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="DKP_Upsell_ 7_to_21"></iframe></div>
                                                            <div class="py-4">
                                                                <h2 class=" font-bold pt-4 mb-2 uppercase text-gray-50 text-2xl sm:text-4xl lg:text-6xl text-center">¿Qué sigue <span class="text-red-700">después</span> de estos 7 días?</h2>
                                                                <p class="text-xs sm:text-base text-justify text-gray-50">¡Bienvenido al próximo nivel de tu transformación! Si ya has comenzado tu viaje con nuestro plan de 7 días, sabes que el cambio es posible. Pero eso es solo el comienzo. El Reto DKP de 21 días está aquí para llevarte aún más lejos, hacia una transformación total que no solo cambiará tu cuerpo, sino también tu mente y tu salud a largo plazo.</p>
                                                            </div>
                                                            <section class="flex flex-col sm:flex-row items-center">
                                                                    <div class="sm:mr-4">
                                                                        <figure class=" overflow-hidden rounded-xl shadow-xl">
                                                                            <img src="{{asset('img/billboards/21_dias_keto.jpg')}}" alt="" class="sm:hidden">
                                                                            <img src="{{asset('img/billboards/21_dias_keto_4-5.png')}}" alt="" class="hidden sm:block">
                                                                        </figure>
                                                                    </div>
                                                                    <div class="pb-4">
                                                                        <h2 class=" font-black text-center py-4 uppercase text-gray-100 text-xl">Lo Que Obtienes Con El <span class="text-red-700"> Reto de 21 Días</span></h2>
                                                                        <ul class="text-xs space-y-5 text-gray-50">
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Plan Alimenticio Detallado:</b> Te daremos un plan diario con recetas deliciosas y fáciles de preparar que se alinean perfectamente con tus objetivos de salud y pérdida de peso para los 21 días</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Snacks:</b> Tendrás diferentes opciones de Snacks 100% Keto perfectos que podrás consumir entre comidas.</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Recetas de salsitas:</b> Preparación de salsas caseras keto perfectas para acompañar nuestras deliciosas recetas</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Recetas de bebidas:</b> Preparación de bebidas refrescantes keto perfectas para acompañar tus bebidas</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Biblioteca de contenido:</b> Despeja tus dudas con la biblioteca exclusiva de contenido donde encontrarás un listado con las preguntas más frecuentes de nuestra comunidad.</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Acceso Exclusivo a Secretos:</b> Consejos y trucos que el Doctor Bayter reserva para quienes están realmente comprometidos con su transformación.</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Soporte:</b> Acceso a nuestra comunidad exclusiva y soporte directo para resolver todas tus dudas y mantenerte motivado.</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p><b class="text-red-700">DESCUENTO ESPECIAL:</b> Premiamos tu compromiso y dedicación, te ofrecemos la oportunidad de avanzar a la Fase Uno del Método DKP a un precio exclusivo.</p>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                            </section>
                                                            <div class="mx-auto sm:mt-10 ">
                                                                <figure class="max-w-xl mx-auto z-50 mt-2 sm:hidden">
                                                                    <img src="{{asset('img/billboards/21_dias_keto.jpg')}}" alt="" class="w-full object-cover z-50">
                                                                </figure>
                                                                <div class=" bg-gradient-to-t from-gray-900 to-gray-800 -mt-16 sm:mt-2 z-0 pt-20 sm:pt-5 max-w-xl mx-auto overflow-hidden rounded-xl shadow-xl">
                                                                    <ul class="mt-2 text-white sm:text-base text-xs font-bold ">
                                                                        <li class="px-4 py-2"><i class="text-base sm:text-lg fas fa-check mr-2 sm:mr-4"></i> Acceso inmediato por 3 meses al contenido</li>
                                                                        <li class="px-4 py-2 bg-gray-700"><i class="text-base sm:text-lg fas fa-utensils mr-2 sm:mr-4"></i>Más de 60 recetas diferentes y lista de alimentos para los 21 días</li>
                                                                        <li class="px-4 py-2"><i class="text-base sm:text-lg fas fa-mug-hot  mr-2 sm:mr-4"></i> Recetas de Snacks, Bebidas y Salsitas</li>
                                                                        <li class="px-4 py-2 bg-gray-700"><i class="text-base sm:text-lg fas fa-book mr-2 sm:mr-4"></i>Biblioteca de contenido exclusiva</li>
                                                                        <li class="px-4 py-2"><i class="text-base sm:text-lg fas fa-comment mr-2 sm:mr-4"></i>Secretos exclusivos del Doctor Bayter de la fase uno</li>
                                                                        <li class="px-4 py-2 bg-gray-700"><i class="text-base sm:text-lg fas fa-video mr-2 sm:mr-4"></i>Contenido multimedia para guíarte durante los 7 días</li>
                                                                        <li class="px-4 py-2"><i class="text-base sm:text-lg fas fa-download mr-2 sm:mr-4"></i>Descargables: Lista de alimentos y Secretos</li>
                                                                        <li class="px-4 py-2 bg-gray-700"><i class="text-base sm:text-lg fas fa-info mr-2 sm:mr-4"></i>Soporte técnico</li>
                                                                    </ul>
                                                                    <div class="w-full my-4 mx-auto text-center px-8">
                                                                        <div class="mt-4 text-center">
                                                                            <div class="flex flex-col ">
                                                                                <span class=" text-gray-100 font-bold text-lg sm:text-4xl">Oferta Exclusiva<br><span class="text-red-700 text-xl">50% de descuento</span></span>
                                                                                <small class="text-center text-white" >Con el código DKP50OFF</small>
                                                                                <span class="text-red-700 font-semibold text-5xl sm:text-6xl">$47 USD</span>
                                                                            </div> 
                                                                            <div class="">
                                                                                <span class="text-xl text-gray-500">Precio Normal <span class="line-through">$97 USD</span></span>
                                                                            </div>
                                                                        </div>
                                                                        <a href="https://pay.hotmart.com/F90185342J?off=gomhrypb&checkoutMode=10&offDiscount=DKP50OFF&bid=1710187425178" target="_blank" class="hotmart-fb ">
                                                                            <span class="w-full rounded-full inline-block mt-4 sm:text-2xl font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out hover:border-white hover:bg-transparent hover:text-white cta-btn relative overflow-hidden">Sí, Quiero Iniciar</span>
                                                                        </a> 
                                                                    </div>
                                                                    <p class="text-xs sm:text-md text-center px-4 max-w-4xl mx-auto font-bold mt-4 mb-8 text-gray-100">Esta oferta es exclusiva para ti, y estará disponible por tiempo limitado.</p>
                                                                </div>
                                                            </div>         
                                                        </section>
                                                        <article class="w-full bg-gradient-to-t from-gray-900 to-black pt-8 pb-16 mt-8 px-4">
                                                            <div class="py-4 max-w-4xl mx-auto" >
                                                                <h2 class=" font-bold pt-4 mb-2 uppercase text-gray-50 0 text-2xl  lg:text-3xl text-center">O... ¿Quedaste Fascinado con el Método DKP?<br><span class="text-red-700">¡Es Hora de Abrazar el Cambio Completo!</span></h2>
                                                                <div class=" space-y-4 text-gray-50">
                                                                    <p class="mt-6 text-xs sm:text-base text-justify">Si el inicio de tu aventura con el Método DKP ha encendido una chispa en ti, prepárate para avivar esa llama hasta convertirla en un fuego arrollador. Para ti, que no te conformas con menos y aspiras a más, presentamos el Método DKP Completo: tu llave maestra para desbloquear el máximo potencial de transformación en este camino de <b>Comer Para Sanar.</b></p>
                                                                </div>
                                                                
                                                                <div class="flex flex-col sm:flex-row items-center">
                                                                    <div class="sm:mr-4 flex-1">
                                                                        <figure class=" overflow-hidden rounded-xl shadow-xl">
                                                                            <img src="{{asset('img/billboards/banner_masterclass_thanks.jpg')}}" alt="" class="sm:hidden mt-4">
                                                                            <img src="{{asset('img/billboards/metodo_dkp_lg.jpg')}}" alt="" class="hidden sm:block">
                                                                        </figure>
                                                                    </div>
                                                                    <div class=" sm:w-7/12">
                                                                        <h2 class=" font-black text-center py-4 uppercase text-gray-100 text-xl">Que incluye el Método DKP<span class="text-red-700"> Premium</span></h2>
                                                                        <ul class="text-sm space-y-5 text-gray-50 text-left">
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b class="text-red-700">Todo lo que está incluido en el Reto 21 o Fase Uno del Método DKP</b></p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Acceso por 1 años:</b> Acceso inmediato por 1 año a todo el contenido del Método DKP (4 Fases)</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Más de 100 recetas:</b> tendrás las recetas de desayuno almuerzo y cena para los 70 días del Método DKP</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Todas las preparaciónes:</b> tendrás acceso a la lista completa de recetas de nuestras Bebidas, Snacks y Salsitas</p>
                                                                            </li>
                                                                            <li class="flex items-start justify-start"> 
                                                                                <span class="flex-1 mr-1 sm:mr-2">
                                                                                    <svg class=" transform scale-75 flex-1 w-10" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M10 20 l10 10 l20 -20" stroke="#7CFC00" stroke-width="5" fill="none"></path></svg>
                                                                                </span>
                                                                                <p class="w-full"><b>Biblioteca Premium:</b> Además de las preguntas tendrás acceso a la biblioteca de contenido en video con los temás más importantes de la dieta keto para que hagas este método de manera perfecta.</p>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="w-full my-4 mx-auto text-center px-8">
                                                                            <div class="mt-4 text-center">
                                                                                <div class="flex flex-col ">
                                                                                    <span class=" text-gray-100 font-bold text-lg sm:text-xl">Oferta Exclusiva <span class="text-red-700 text-xl">30% de descuento</span></span>
                                                                                    <small class="text-center text-white" >Con el código DKP30OFF</small>
                                                                                    <span class="text-red-700 font-semibold text-5xl sm:text-6xl">$137 USD</span>
                                                                                </div> 
                                                                                <div class="">
                                                                                    <span class="sm:text-xl text-gray-500">Precio Normal <span class="line-through">$197 USD</span></span>
                                                                                </div>
                                                                            </div>
                                                                            <a href="https://pay.hotmart.com/F78337495Q?off=ugs80t2l&checkoutMode=10&offDiscount=DKP30OFF" target="_blank" class="hotmart-fb ">
                                                                                <span class="w-full rounded-full inline-block mt-4 sm:text-xl font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out hover:border-white hover:bg-transparent hover:text-white cta-btn relative overflow-hidden">Sí, Quiero Unirme al Método Completo</span>
                                                                            </a> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    </div>
                                                @else
                                                    <section class=" bg-left-top bg-cover w-full bg-no-repeat" _style="background-image: url({{asset('img/backgrounds/blur_bg_21dkp.png')}})">
                                                    
                                                        <div class="py-4 max-w-4xl mx-auto" >
                                                            <h2 class=" font-bold pt-4 mb-2 uppercase text-gray-90 0 text-2xl sm:text-4xl lg:text-6xl text-center">¿Qué sigue <span class="text-red-700">después</span> de estos 7 días?</h2>
                                                            <div class=" space-y-4">
                                                                <p class="mt-6 text-xs sm:text-base text-justify text-gray-900">Estamos emocionados de que te hayas embarcado en este viaje transformador con nosotros. Queremos que sepas que cada paso que das es importante. Por eso, antes de revelarte lo que te espera después del día 7, queremos que te concentres plenamente en estos primeros días cruciales.</p>
                                                                <p class="mt-6 text-xs sm:text-base text-justify text-gray-900 font-bold">Sigue el plan con calma y dedicación, asegurándote de implementar cada paso a la perfección. Tu compromiso y esfuerzo son esenciales pa ra obtener los resultados que deseas.</p>
                                                                <p class="text-xs sm:text-base text-justify text-gray-900">Mantén tu atención y energía en el aquí y el ahora, disfrutando y aprendiendo de cada parte de este proceso. Y recuerda, dentro de <span id="daysRemaining">{{$daysRemaining}} días</span> , una sorpresa especial te estará esperando, pero solo se desvelará después de que hayas completado con éxito al menos tus primeros 5 días.</p>
                                                                <p class="text-xs sm:text-base text-justify text-gray-900 font-bold">Confía en el proceso, y prepárate para la emocionante revelación que te impulsará aún más en tu camino hacia la transformación. ¡Lo que viene después del día 8 es solo para aquellos que están verdaderamente comprometidos con su cambio y éxito!"</p>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h2 class="font-bold pt-4 mb-2 uppercase text-red-700 text-xl text-center">Días restantes para activar el contenido</h2>
                                                            <div id="countdown" class="text-center font-bold text-6xl py-2"></div>
                                                        </div>                                             

                                                        <script>
                                                            // Establecer la fecha objetivo para la cuenta regresiva
                                                            var countDownDate = new Date("{{ $availableAt }}").getTime();
                                                            
                                                            // Actualizar el contador cada segundo
                                                            var x = setInterval(function() {

                                                                // Obtener la fecha y hora actuales
                                                                var now = new Date().getTime();

                                                                // Encontrar la distancia entre ahora y la fecha de cuenta regresiva
                                                                var distance = countDownDate - now;

                                                                // Cálculos de tiempo para días, horas, minutos y segundos
                                                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                                // Mostrar el resultado en el elemento con id="countdown"
                                                                document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
                                                                + minutes + "m " + seconds + "s ";
                                                            }, 1000);
                                                        </script>
                                                    </section>
                                                @endif
                                            @else
                                                <div class="py-4 max-w-4xl mx-auto" >
                                                    <h2 class=" font-bold pt-4 mb-2 uppercase text-gray-90 0 text-2xl sm:text-4xl lg:text-6xl text-center">Continua tus recetas en <span class="text-red-700">Fase Uno</span> día 8</h2>
                                                    
                                                </div>
                                                <div class="text-center">
                                                    <a href="/plan/fase/fase-1" target="_blank" class=" max-w-2xl mx-auto block">
                                                        <span class="rounded-full inline-block mt-4 sm:text-2xl font-bold px-4 py-2 border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out hover:border-black hover:bg-transparent hover:text-black cta-btn relative overflow-hidden">Ir a Fase Uno</span>
                                                    </a> 
                                                </div> 
                                            @endif
                                        @else
                                            <header class="md:mb-12">
                                                <h2 class="text-3xl md:text-5xl font-bold">Menú <span class="text-red-700">Día {{$this->day->day}}</span></h2>
                                                <p class="mb-4 text-gray-500"><img src="{{asset('img/icons/gfx/pie-chart.svg')}}" alt="" class="w-4 mr-1 inline opacity-40">Gramos de carbohidratos día <b>{{$this->carbs}}</b></p>
                                            </header>
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-10 divide-y-2 md:divide-y-0 ">

                                                @foreach ($this->day_recipes as $key => $recipe)

                                                    <div class="pt-12 md:pt-0">
                                                        <a href="{{route('plan.recipe', $recipe)}}">
                                                            <div class="relative h-62">
                                                                
                                                                <div class="absolute text-sm bg-gray-100 bottom-full px-4 py-2 font-bold leading-none text-gray-900  rounded-t-lg ml-2 ">

                                                                    @switch($recipe->pivot->meal)
                                                                        @case(1)
                                                                            <p>Desayuno</p>
                                                                            @break
                                                                        @case(2)
                                                                            <p>Almuerzo</p>
                                                                            @break
                                                                        @case(3)
                                                                            <p>Cena</p>
                                                                            @break
                                                                        @case(4)
                                                                            <p>Romper Ayuno</p>
                                                                            @break
                                                                    @endswitch

                                                                </div>
                                                                {{-- <img src="@if (Storage::exists($recipe->image->url)) {{Storage::url($recipe->image->url)}} @else {{asset('img/'.$recipe->image->url)}} @endif" alt="" class="rounded-2xl object-cover"> --}}
                                                                <img src="{{asset('img/'.$recipe->image->url)}}?v={{ time() }}" alt="" class="rounded-2xl object-cover">
                                                            </div>
                                                            <div class="mt-2 ml-4">
                                                                <p class="text-2xl mb-2 font-bold text-gray-900">{{$recipe->name}}</p>
                                                                <div class="flex md:flex-col xl:flex-row md:items-start  text-xs items-center xl:items-center">
                                                                <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">{{$recipe->carbs}} Carbs.</p>
                                                                <p class="text-gray-400 ml-2 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                                                    <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                                                    @if ($fase->id == 16 )
                                                                        <span>2 personas</span>
                                                                    @else
                                                                        <span>1 persona</span>
                                                                    @endif
                                                                    
                                                                </p>
                                                                <p class="text-gray-400 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                                                    <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                                                    <span>{{$recipe->time}} minutos</span>
                                                                </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <hr class="my-12">
                                            <div class="flex flex-col xl:flex-row" x-data="{ modalIsShowing: false }" >

                                                @if ($this->day->recipes->where('type', '==', 2)->count() > 0 )
                                                    <div class="w-full xl:w-5/12 xl:mr-16">
                                                        <h2 class="text-4xl text-gray-900 font-bold">
                                                            <span class="text-red-700">Snacks de </span> Día {{$this->day->day}} <span class="text-base text-gray-600 font-medium">(opcional)</span>
                                                        </h2>
                                                        <section class="my-4" >
                                                            @foreach ($this->day->recipes->where('type', '==', 2) as $snack)
                                                                <div _wire:click="toogleSnack('{{$snack->id}}')" wire:key="{{ $loop->index }}"   _x-on:click="modalIsShowing = true" id="snack{{$snack->id}}" class="border border-gray-100 shadow-md rounded-xl overflow-hidden w-full mb-6 cursor-pointer" title="click para ver más">
                                                                    <div class="w-full block">
                                                                        <div class="flex items-center">
                                                                            <figure class="w-20 md:w-48 h-28 overflow-hidden bg-gray-100 ">
                                                                                <img src="{{asset('img/'.$snack->image->url)}}?v={{ time() }}" alt="" class=" h-full object-cover">
                                                                            </figure>
                                                                            <div class="ml-6 relative w-full flex-1">
                                                                                <h2 class="font-bold text-lg text-gray-900">{{$snack->name}}</h2>
                                                                                <div class="text-gray-400 text-sm pr-4 mb-2 hidden md:block">{!!Str::limit($snack->descripcion, '500', '...')!!} </div>
                                                                                <div class="text-gray-400 text-sm pr-4 mb-2 md:hidden">{!!Str::limit($snack->descripcion, '500', '...')!!} </div>
                                                                                <p class="bg-green-500 mt-1 px-2 py-1 text-xs rounded-lg inline-block text-white">{{$snack->carbs}}g Carbs.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                            <aside x-show="modalIsShowing" x-cloak class="z-50 fixed delay-500 w-full h-full top-0 left-0 flex items-center justify-center"
                                                                x-transition:enter="transition ease-out duration-500"
                                                                x-transition:enter-start="opacity-0"
                                                                x-transition:enter-end="opacity-100"
                                                                x-transition:leave="ease-in duration-300"
                                                                x-transition:leave-end="opacity-0"
                                                                >
                                                                <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" x-on:click="modalIsShowing = false"></div>

                                                                <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                                                                    <div x-on:click="modalIsShowing = false" class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50"  >
                                                                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                                        </svg>

                                                                    </div>

                                                                    <!-- Add margin if you want to see some of the overlay behind the modal-->
                                                                    <div class="modal-content py-4 text-left px-6">

                                                                        @if ($this->snack != null)
                                                                            <!--Title-->
                                                                            <div class="flex justify-between items-center pb-3">
                                                                                <p class="text-2xl font-bold"><span class="mr-2 text-red-700">Snack</span>{{$this->snack->name}}</p>
                                                                                <div class="modal-close cursor-pointer z-50">
                                                                                <svg x-on:click="modalIsShowing = false" id="crossClose{{$this->snack->id}}" class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                                                </svg>
                                                                                </div>
                                                                            </div>
                                                                            <!--Body-->
                                                                            <div class="text-gray-400 text-sm" >
                                                                                <div>
                                                                                    <figure class="w-full h-36 overflow-hidden bg-gray-100 ">
                                                                                        <img src="{{asset('img/'.$this->snack->image->url)}}?v={{ time() }}" alt="" class=" w-full object-cover">
                                                                                    </figure>
                                                                                </div>
                                                                                <div class="py-4">
                                                                                    <h3 class="text-xl font-bold text-gray-900 mb-1">Preparación</h3>
                                                                                    {!!$this->snack->descripcion!!}
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </aside>
                                                        </section>
                                                    </div>
                                                @endif

                                                @if ($this->day->note != "<p></p>")
                                                    <div class=" flex-1 hidden">
                                                        <h2 class="text-4xl font-bold mb-4 text-red-700">¡Notas!</h2>
                                                        <div class="text-gray-600">
                                                            {!!$this->day->note!!}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>     
                                        @endif                               
                                    </section>
                                </div>
                            </section>
                        @endif
                    </div>
                </div>

                @if ($fase->id == 5)
                    <!-- Pop-up container -->
                    <div id="surveyPopup" class="hidden fixed z-50 left-0 top-0 w-full h-full overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
                        <!-- Pop-up -->
                        <div class="bg-white rounded-lg shadow-lg mt-20 mx-auto max-w-2xl p-5">
                        <div class="text-right">
                            <button id="closePopup" class="text-gray-700 focus:outline-none">
                            <span>&times;</span>
                            </button>
                        </div>
                        <div class="mt-3 text-center">
                            <h2 class="text-lg sm:text-2xl leading-6 text-gray-900 font-bold">{{auth()->user()->name}} ¡Nos encantaría conocer tu opinión!</h2>
                            <p class="mt-2 text-gray-600">Eres uno de los KetoBayter seleccionados por tu compromiso y progreso.</p>
                            <p class="mt-2 text-gray-600">Nos encantaría conocer tu opinión sobre el plan <b>7 Días Keto Perfectos</b> en una pequeña encuesta de satisfacción. Al dar tus valiosos comentarios, no solo ayudas a mejorar, sino que también te conviertes en parte de una comunidad exclusiva cuyas sugerencias son el motor de nuestra innovación.</p>
                            <p class="mt-2 text-gray-600 font-bold">Tu opinión porque es importante.</p>
                            <div class="mt-4 space-x-4">
                            <button id="fillSurvey" class="bg-red-700 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Comparte Tu Experiencia</button>
                            <button id="declineSurvey" class="bg-transparent hover:bg-gray-900 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">No me interesa</button>
                            </div>
                        </div>
                        </div>
                    </div>
                @endif

                @else
                    o.O
            @endcan
        @else
            @php
                return redirect()->route('dkp')
            @endphp
        @endcan
    </div>

    
    @push('style')
        <style>
            [x-cloak] {
                display: none !important;
            }

            .modal {
                transition: opacity 0.25s ease;
            }
            body.modal-active {
                overflow-x: hidden;
                overflow-y: visible !important;
            }
            .video-iframe iframe{
                width: 100%;
                height: 100%;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://player.vimeo.com/api/player.js"></script>

       @if ($fase->id == 5)
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                const userId = {{auth()->user()->id}}; // Ejemplo de cómo obtener el ID de usuario autenticado en Laravel Blade

                fetch(`/plan/check-survey-eligibility/${userId}`, {
                    headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        
                    if (data.eligible) {
                        
                        document.getElementById('surveyPopup').classList.remove('hidden');
                        
                        document.getElementById('fillSurvey').addEventListener('click', function () {
                            // Llamada al backend para marcar la encuesta como iniciada
                            fetch(`/plan/mark-survey-started/${userId}`, {
                                method: 'POST',
                                headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json',
                                'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                surveyId: data.surveyId, // Asegúrate de que el backend envíe el ID de la encuesta
                                })
                            })
                            .then(response => {
                                if (response.ok) {
                                    // Ahora que se ha marcado como iniciada, redirige al usuario a la encuesta
                                   window.open(data.surveyUrl, '_blank');
                                    
                                } else {
                                    alert('Hubo un problema al iniciar la encuesta. Por favor, inténtalo de nuevo.');
                                }
                            });
                        });



                        document.getElementById('closePopup').addEventListener('click', function () {
                        document.getElementById('surveyPopup').classList.add('hidden');
                        });

                        document.getElementById('declineSurvey').addEventListener('click', function () {
                        fetch(`/plan/decline-survey/${userId}`, {
                            method: 'POST',
                            headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                            surveyId: data.surveyId, // Asegúrate de que el backend envíe el ID de la encuesta en la respuesta
                            })
                        }).then(response => {
                            if (response.ok) {
                            document.getElementById('surveyPopup').classList.add('hidden');
                            // Aquí podrías mostrar un mensaje de agradecimiento o confirmación si lo deseas
                            }
                        });
                        });
                    }
                    });
                });
            </script>
       @endif
    @endpush
</div>
