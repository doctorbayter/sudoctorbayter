<div x-data="{ openMenu: false }" >
    <div class="flex">
        @can('enrolled', auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->first())
            <x-menu :userPlan="$user_plan" />
            <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="w-11/12 bg-white">

                <section class="bg-gradient-to-t from-gray-100 " style="height: 100%">
                    <div class="w-10/12 mx-auto py-10">

                        <section class="mb-24">
                            <header class="mb-12">
                                <p>Bievenido {{auth()->user()->name}}</p>
                                <h2 class="text-4xl font-bold text-gray-900">Ingresa a tu contenido</h2>
                            </header>

                            <section class="grid md:grid-cols-2 gap-12  max-w-screen-md">
                                @if ($user_fases->count() > 0)
                                    <article class="hover:opacity-90 overflow-hidden rounded-xl shadow-xl">
                                        <a href="{{route('plan.dkp')}}">
                                            <img src="{{asset('img/billboards/metodo_dkp_lg.jpg')}}" alt="">
                                        </a>
                                    </article>
                                @endif

                                <article class="hover:opacity-90 overflow-hidden rounded-xl shadow-x">

                                    @if (auth()->user()->subscriptions->whereIn('plan_id', [23, 24, 27])->first())
                                        <a href="{{route('plan.fitness')}}">
                                            <img src="{{asset('img/billboards/total_fitness_lg.jpg')}}" alt="">
                                        </a>

                                    @elseif (auth()->user()->fases->whereNotIn('id', [8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19])->first())
                                    <a href="{{route('payment.checkout', $thf_plan)}}" target="_blank">
                                        <img src="{{asset('img/billboards/no_total_fitness_lg.jpg')}}" alt="">
                                    </a>

                                    @endif
                                </article>
                            </section>
                        </section>

                        @if ($subscribed_reto_actual && auth()->user()->id == 13706)
                                        <aside class="my-8 ">
                                            <div class="py-8 px-8 rounded-2xl  border-dashed border-red-700 border-4 bg-gray-200">
                                                <h2 class="text-2xl md:text-4xl font-bold text-red-700">Próximas reuniones de Zoom</h2>
                                                <p class="mt-4">No te pierdas las reuniones de Zoom de Desafío 2024<b> 
                                                </b> A continuación encontrarás los datos de acceso a la reunión grupal de Zoom con tu doctor Bayter.</p>
                                                <div class="flex-col md:flex-row justify-around my-8">
                                                    <div class="bg-gray-300 p-8 rounded-xl border border-gray-700 mb-8">
                                                        <div class="hidden">
                                                            <h2>Repetición Reunión <b>Desafío 2024</b></h2>
                                                            <hr class="my-2 border-gray-700">
                                                            <p><b>La repetición estará disponible por tiempo limitado</b></p>
                                                            <a href="{{route('reto.replay', ['navidad-2023', 1])}}" target="_blank" class="cursor-pointer inline-block mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-red-700 border-red-700 text-gray-50 uppercase transition-colors duration-300 ease-in-out hover:bg-transparent  hover:text-red-700">Mira aquí la repetición</a>
                                                        </div>
                                                        <div class="">
                                                            <h2>Reunión en Vivo <b>Desafío 2024</b></h2>
                                                            <hr class="my-2 border-gray-700">
                                                            <p><b>Fecha: </b>12 de Enero 2024 1:00 p.m. Hora Colombia</p>
                                                            <a href="https://us02web.zoom.us/j/83573692015?pwd=S1dxNk5Da3kzczB5RFM5QjFwbFgwdz09" target="_blank" class="cursor-pointer inline-block mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-red-700 border-red-700 text-gray-50 uppercase transition-colors duration-300 ease-in-out hover:bg-transparent  hover:text-red-700">Link de acceso a la reunión</a>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </aside>
                                    @endif

                        @if ($user_retos->count() > 0)
                            <div>
                                <header>
                                    <h2 class="text-4xl font-bold text-gray-900">Tus Retos</h2>
                                </header>
                                <section class="">

                                    <div class="grid grid-cols-1 xl:grid-cols-2  gap-8 pt-8">

                                        @forelse($user_retos as $reto)
                                            <a href="{{route('plan.fase', $reto)}}" class=" px-8 py-12 shadow-sm rounded-lg bg-yellow-400 hover:bg-yellow-500 text-gray-900 transition-all ease-in-out">
                                                <div>
                                                    <small class="mb-2 text-base"> Entra aquí a la {{$reto->name}}</small>
                                                    <h2 class="text-3xl lg:text-5xl font-semibold mb-2">{!!$reto->sub_name!!}</h2>
                                                    <p>
                                                        {{$reto->descripcion}}
                                                    </p>
                                                </div>
                                            </a>
                                        @empty

                                        @endforelse

                                        @if ($re_desafio)
                                            <a href="{{route('plan.fase', $re_desafio)}}" class=" px-8 py-12 shadow-sm rounded-lg bg-yellow-400 hover:bg-yellow-500 text-gray-900 transition-all ease-in-out">
                                                <div>
                                                    <small class="mb-2 text-base"> Entra aquí a la {{$re_desafio->name}}</small>
                                                    <h2 class="text-3xl lg:text-5xl font-semibold mb-2">{!!$re_desafio->sub_name!!}</h2>
                                                    <p>
                                                        {{$re_desafio->descripcion}}
                                                    </p>
                                                </div>
                                            </a>
                                        @endif

                                    </div>

                                    
                                </section>
                            </div>
                            <hr class="my-16">
                        @endif

                        @if ($user_adicionales->count() > 0)
                            <div class="hidden">
                                <header>
                                    <h2 class="text-4xl font-bold text-gray-900">Adicionales</h2>
                                </header>
                                <section class="">

                                    <div class="grid grid-cols-1 xl:grid-cols-2  gap-8 pt-8">

                                        @forelse($user_adicionales as $adicional)
                                            <a href="{{route('plan.fase', $adicional)}}" class=" px-8 py-12 shadow-sm rounded-lg bg-gray-400 hover:bg-gray-500 text-gray-900 transition-all ease-in-out">
                                                <div>
                                                    <small class="mb-2 text-base"> Entra aquí a la {{$adicional->name}}</small>
                                                    <h2 class="text-3xl lg:text-5xl font-semibold mb-2">{!!$adicional->sub_name!!}</h2>
                                                    <p>
                                                        {{$adicional->descripcion}}
                                                    </p>
                                                </div>
                                            </a>
                                        @empty

                                        @endforelse
                                    </div>
                                </section>
                            </div>
                            <hr class="my-16">
                        @endif

                    </div>
                </section>

            </div>


            @if (!$subscribed_fase_week)
                <section class="pb-4 fixed bottom-0 mr-4 right-0  z-50 transition duration-500 delay-3000 ease-in-out opacity-0 hidden"
                    id="classAd"
                    x-data="{$open : true}"
                    x-show="$open"
                    x-cloak>
                    <div class=" w-11/12 md:w-full max-w-2xl mx-auto py-8 px-6 md:px-12  bg-yellow-400 rounded-2xl md:flex shadow-2xl bg-hero-pattern bg-cover bg-center">
                        <div class="md:mr-8 flex-1">
                            <h3 class="text-yellow-100 bg-red-700 uppercase font-bold inline-block text-base px-4 py-1 rounded-xl mb-4">¿Ya probaste las nuevas recetas?</h3>
                            <h2 class=" hidden text-accent-400 text-3xl mb-4 md:my-2 md:text-6xl font-extrabold leading-none">
                                LA <span class="text-red-700">MEJOR</span> DIETA
                            </h2>
                            <p class="text-gray-900 text-sm md:text-base mb-4">Hemos creado una deliciosa lista de recetas para <b>desayuno, almuerzo y cena </b> nuevas para toda una semana por solo <b>{{$plan_week->finalPrice}} US$</b></p>
                            <div class=" text-center md:flex items-center">
                                <a href="{{ route('payment.checkout', $plan_week )}}" target="_blank" class="inline-block font-bold px-8 py-2 text-lg border border-red-700  bg-red-700 bg-accent-400 text-yellow-400 rounded-xl hover:bg-transparent hover:text-red-700" >Aquierelas aquí</a>
                                <button x-on:click="$open = !$open; localStorage.setItem('classAd', false)" class=" mt-4 md:ml-3 md:mt-0 inline-block font-bold text-lg text-red-700 hover:underline outline-none" >No me interesa</button>
                            </div>
                        </div>

                    </div>
                </section>

                <script>
                    const CLASS_AD = localStorage.getItem('classAd');
                    let classAdDiv = document.getElementById("classAd");

                    if(CLASS_AD == "false"){
                        classAdDiv.remove();
                    } else{
                        classAdDiv.classList.add('opacity-100')
                    }
                </script>
            @endif


        @else
            @php
               return redirect()->route('dkp')
            @endphp
        @endcan
    </div>


    @push('styles')
        <style>
            #countdown{
                grid-template-columns: 1fr 10px 1fr 10px 1fr 10px 1fr;
            }
            #countdown > span{
                background-color: #fc0;
                text-align: center;
                height: 4rem;
                width: 4rem;
                line-height: 4rem;
                border-radius: .5rem;
            }
            #countdown >  i{
                height: 4rem;
                width: 4rem;
                line-height: 4rem;
                text-align: center;
                width: 0.5rem !important;
                font-style: normal !important;
            }
        </style>
    @endpush


    @push('scripts')

    @if ($planPremium->discount && true == false)
        <script>
            const PROMO_AD = false //sessionasset(`img/(${promoAd})`);
            let promoAdDiv = document.getElementById("promoAd");

            if(PROMO_AD == "false"){
                promoAdDiv.remove();
            } else{

                promoAdDiv.innerHTML= '<div data-countdown="'+promoAdDiv.dataset.date+'" id="countdown" class="font-bold text-center text-xl inline-flex items-center justify-center mb-2"></div>';

                // Set the date we're counting down to
                let countdown = document.getElementById('countdown');
                let countdownData = countdown.dataset.countdown;
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
                let daysHtml = "<div class='border-1 bg-gray-200 border-red-700 w-16 h-12 rounded-lg flex items-center justify-center text-red-700'><span>"+ days.toString().padStart(2, '0') + "<small>d</small> </span></div>";
                let hoursHtml = "<div class='border-1 bg-gray-200 border-red-700 w-16 h-12 rounded-lg flex items-center justify-center text-red-700'><span>"+ hours.toString().padStart(2, '0') + "<small>h</small> </span></div>";
                let minutesHtml = "<div class='border-1 bg-gray-200 border-red-700 w-16 h-12 rounded-lg flex items-center justify-center text-red-700'><span>"+ minutes.toString().padStart(2, '0') + "<small>m</small> </span></div>";
                let secondsHtml = "<div class='border-1 bg-gray-200 border-red-700 w-16 h-12 rounded-lg flex items-center justify-center text-red-700'><span>"+ seconds.toString().padStart(2, '0') + "<small>s</small></span></div>";
                // Display the result in the element with id="demo"
            countdown.innerHTML = daysHtml + "<span class='mx-2 text-gray-500'>:</span>" + hoursHtml + "<span class='mx-2 text-gray-500'>:</span>" + minutesHtml + "<span class='mx-2 text-gray-500'>:</span>" + secondsHtml;
                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    countdown.innerHTML = "<p class='col-span-7 mt-auto mb-auto'>EXPIRED</p>";
                }
                }, 1000);
            }
        </script>
    @endif
@endpush

</div>
