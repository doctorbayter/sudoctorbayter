<x-app-layout>
    @push('metaLinks')
    <meta name="robots" content="noindex, follow">
    @endpush
    <section class="bg-fixed bg-cover" style="background-image: url({{asset('img/backgrounds/hero.jpg')}})">
        <div class="max-w-6xl mx-auto px-6 lg:px-8 flex justify-end relative overflow-hidden">
            <div class="max-w-lg my-24">
                <header class="">
                    <h1 class="text-gray-900 leading-none font-black text-2xl md:text-4xl">Consulta<span class="text-red-700">Online</span> Personalizada con tu Doctor Bayter</h1>
                    <p class="text-gray-900 mt-8 mb-4 md:text-xl">Esta es una consulta cara a cara con su Doctor Bayter via Zoom donde podrás definir situaciones medicas que permitan iniciar una dieta keto, o todas esas dudas que te impiden iniciar la dieta cetogenica.</p>
                </header>
                <div class=" flex mt-6">
                    <a href="#agenda" class=" inline-block mt-2 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">¡Agenda tu cita ya!</a>
                </div>
            </div>
            <div class="absolute right-0 md:right-auto md:left-0 bottom-0">
                <figure class="w-48 md:w-full">
                    <img src="{{asset('img/photos/doctor_bayter_cita.png')}}" alt="" class="w-full object-cover">
                </figure>
            </div>
        </div>
    </section>
    <section class="bg-gradient-to-bl py-24" id="agenda">
        <h2 class="text-gray-900 leading-none font-black px-6 text-2xl md:text-5xl mb-14 max-w-6xl mx-auto">¿En que te puede ayudar esta consulta?</h2>
        <div class="flex flex-col md:flex-row max-w-6xl mx-auto px-6 lg:px-8 ">
            <div class="w-full md:w-7/12">
                <ul class="text-sm md:text-base">
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-3 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Exámenes medicos (por primera vez )</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Porqué no bajo de peso?</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Debo continuar con dieta keto?</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Qué suplementos puedo tomar?</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Qué deporte puedo parcticar siendo keto?</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Todas las dudas que puedas tener a cerca de este estilo de vida</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Definir si la dieta keto se ajusta a tu vida y a tus necesidades</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Definir si eres candidato a dieta keto</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Revisar examenes y laboratorios previos</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Definir si tu estado de salud permite que inicies este estilo de vida</p>
                    </li>
                    <li class="mb-2">
                        <p class="bg-gray-50 px-4 py-2 font-bold"><img src="{{asset('/img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-5 mr-2">  Revisar y analizar antescedentes médicos</p>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <div class=" mt-8 md:mt-0 md:ml-8">


                    @foreach ($planesWhatsapp as $plan)
                        <div class="flex items-center bg-gray-50 border border-gray-200 shadow-sm px-6 py-4 rounded-xl mb-8">
                            <div href="{{route('payment.pay', $plan)}}" class="block">
                                <h3 class="font-bold text-red-700">{{$plan->name}}</h3>
                                <p class="font-bold text-5xl">{{$plan->price->name}}</p>
                                <p class="my-2 text-gray-700 text-sm">La consulta vía zoom con tu doctor Bayter es ideal para ti si tienes dudas sobre este estilo de vida y definir si eres candidato a la dieta keto.</p>
                                <p><b>*Citas disponibles después del mes de octubre de 2022</b></p>
                                <a href="{{route('payment.pay', $plan)}}" class="hidden _inline-block mt-2 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Adquiere tu {{$plan->name}}</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
