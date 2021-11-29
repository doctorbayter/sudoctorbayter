<x-app-layout>
    <section class="bg-fixed bg-black">
        <div class="max-w-6xl mx-auto px-6 py-4 lg:px-8 flex flex-col lg:flex-row relative overflow-hidden">
            <div class="max-w-lg mt-20 mb-4 lg:my-24">
                <header class="">
                    <h1 class="text-gray-50 leading-none font-black text-2xl md:text-6xl">CYBER <span class="text-red-700">LUNES</span></h1>
                    <p class="text-gray-50 mt-6 mb-4 md:text-xl">Llego el momento de tomar acción y dar el primer paso hacia tu nuevo estilo de vida lleno de mucha energía, más salud y sobre todo menos peso. <b class="block mt-2">Flash Sale por 24 horas en los planes y cursos del método DKP</b></p>

                    <img src="http://gen.sendtric.com/countdown/uyi7mp0o14" style="display: block;" />

                </header>
            </div>
            <figure class="lg:absolute right-0 bottom-0 w-full lg:w-6/12">
                <img src="{{asset('img/photos/doctor_bayter_dkp.png')}}" alt="" class="w-full object-cover">
            </figure>
        </div>
    </section>


    <section>

        <div class="max-w-5xl mx-auto relative py-12 px-6 md:px-0">
            <header>
                <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-5xl">Toma la decisión ahora</h2>
                <p class="text-center text-lg font-semibold">Da el primer paso. Yo te acompañaré el resto del camino.</p>
            </header>

            <section class="flex flex-col-reverse lg:flex-row items-center justify-center">
                <article class="lg:mr-8">
                    <div class="mt-12 border-red-700 border-8 max-w-md mx-auto px-8 py-6 rounded-2xl ">
                        <h2 class="text-gray-900 text-center leading-none font-black text-2xl md:text-3xl">Método <span class="text-red-700">DKP</span> Fase 1</h2>
                        <p class="text-center mt-4 font-bold text-3xl text-yellow-500">PAGO ÚNICO</p>

                        @if ($plan2->discount)

                            @if ($plan2->discount->value != 0 && \Carbon\Carbon::createFromTimeStamp(strtotime($plan2->discount->expires_at))->gt(\Carbon\Carbon::now()))

                                    <p class="text-center font-extrabold text-6xl">{{round($plan2->finalPrice)}} US$</p>
                                    <small class="text-center block font-semibold line-through text-red-700 text-xl">Precio Real {{$plan2->price->name}}</small>
                                <div class="text-center">
                                    <p class="text-base text-gray-700 mb-2">Oferta {{$plan2->discount->name}}</p>
                                    <p class="text-sm text-accent-400 hidden"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($plan2->discount->expires_at))->diffForHumans() }}</b>! </p>
                                </div>
                                @else
                                <p class="text-4xl text-accent-400 font-bold text-center">{{$plan2->price->name}}</p>
                            @endif
                        @else
                            <p class="text-4xl text-accent-400 font-bold text-center">{{$plan2->price->name}}</p>
                        @endif

                        <div class="mt-4">
                            <h3 class="font-bold text-xl mb-4 text-center">¿Que recibes con la <span class="text-red-700">Fase 1</span>?</h3>
                            <ul>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Acceso inmediato y de por vida a la fase 1 del método DKP<b class=" text-sm text-gray-600 block font-medium">(Precio normal 110 US$)</b></p></li>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Acceso al chat WhatsApp por 30 días <b class=" text-sm text-gray-600 block font-medium">(Precio normal 37 US$/mes)</b></p></li>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Recetas adicionales 7 días <b class=" text-sm text-gray-600 block font-medium">(Precio normal 20 US$)</b></p></li>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-50 rounded-lg">Recetas 5 desayunos sin huevo <b class=" text-sm text-gray-600 block font-medium">(Precio normal 10 US$)</b></p></li>
                            </ul>
                            <a href="{{route('payment.checkout', $plan2)}}" class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Únete Ahora!</a>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="mt-12 border-black border-8 max-w-md mx-auto px-8 py-6 rounded-2xl bg-gray-900 text-white ">
                        <h2 class="text-gray-50 text-center leading-none font-black text-2xl md:text-3xl">Método <span class="text-red-700">DKP</span> 4 Fases</h2>
                        <p class="text-center mt-4 font-bold text-3xl text-yellow-500">OFERTA PAGO ÚNICO</p>

                        @if ($plan->discount)

                            @if ($plan->discount->value != 0 && \Carbon\Carbon::createFromTimeStamp(strtotime($plan->discount->expires_at))->gt(\Carbon\Carbon::now()))

                                    <p class="text-center font-extrabold text-6xl">{{round($plan->finalPrice)}} US$</p>
                                    <small class="text-center block font-semibold line-through text-red-700 text-xl">Precio Real {{$plan->price->name}}</small>
                                <div class="text-center">
                                    <p class="text-base text-gray-400 mb-2">Oferta {{$plan->discount->name}}</p>
                                    <p class="text-sm text-accent-400 hidden"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($plan->discount->expires_at))->diffForHumans() }}</b>! </p>
                                </div>
                                @else
                                <p class="text-4xl text-accent-400 font-bold text-center">{{$plan->price->name}}</p>
                            @endif
                        @else
                            <p class="text-4xl text-accent-400 font-bold text-center">{{$plan->price->name}}</p>
                        @endif

                        <div class="mt-4">
                            <h3 class="font-bold text-xl mb-4 text-center">¿Que recibes con el Método <span class="text-red-700">DKP</span>?</h3>
                            <ul>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg">Acceso inmediato y de por vida al método DKP (4 Fases)<b class=" text-sm text-gray-400 block font-medium">(Precio normal 262 US$)</b></p></li>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg">Acceso al chat WhatsApp por 30 días <b class=" text-sm text-gray-400 block font-medium">(Precio normal 37 US$/mes)</b></p></li>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg ">Recetas adicionales 7 días <b class=" text-sm text-gray-400 block font-medium">(Precio normal 20 US$)</b></p></li>
                                <li><p class="font-bold mb-4 px-4 py-2 bg-gray-800 rounded-lg ">Recetas 5 desayunos sin huevo<b class=" text-sm text-gray-400 block font-medium">(Precio normal 10 US$)</b></p></li>
                            </ul>
                            <a href="{{route('payment.checkout', $plan)}}" class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Únete Ahora!</a>
                        </div>
                    </div>
                </article>
            </section>
        </div>

        <section class="bg-gray-900">
            <div class="max-w-5xl mx-auto px-6 lg:px-8 py-12 md:py-20  flex flex-col">
                <h2 class="text-xl md:text-3xl font-bold text-gray-50 text-center">
                   TODOS LOS CURSO DE LA PÁGINA <span class="text-red-700">KETO BAYTER ACADEMY</span> ESTÁN CON EL <span class="text-red-700">40%</span> DE DESCUENTO.</h2>
                   <a href="https://ketobayter.com/cursos/" target="_blank" class="block text-center mt-4 font-bold px-4 py-4 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out text-lg hover:bg-transparent hover:text-red-700">¡Adquiere tus cursos ahora!</a>
            </div>
        </section>

    </section>


</x-app-layout>
