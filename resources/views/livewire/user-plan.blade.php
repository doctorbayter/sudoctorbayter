<div x-data="{ openMenu: false }" >
    <div class="flex">
        @can('enrolled', auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->first())
            <x-menu :userPlan="$user_plan" />
            <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="w-11/12 bg-white">

                <section class="bg-gradient-to-t from-gray-100 " style="height: 100%">
                    <div class="w-10/12 mx-auto py-10">

                        @if ($user_fases->count() > 0)
                            <div>
                                <header>
                                    <p>Tu plan actual es:</p>
                                    <h2 class="text-4xl font-bold text-gray-900">{{$user_plan_data->name}}</h2>
                                </header>
                                <section class="">

                                    <div class="grid grid-cols-1 xl:grid-cols-2  gap-8 pt-8">

                                        @foreach ($user_fases as $fase)
                                        <a href="{{route('plan.fase', $fase)}}" class=" px-8 py-12 shadow-sm rounded-lg bg-gray-900 hover:bg-gray-800 text-gray-50 transition-all ease-in-out">
                                                <div>
                                                    <small class="mb-2 text-base"> Entra aquí a la {{$fase->name}}</small>
                                                    <h2 class="text-3xl lg:text-5xl font-semibold mb-2">{!!$fase->sub_name!!}</h2>
                                                    <p>
                                                        {{$fase->descripcion}}
                                                    </p>
                                                </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </section>
                            </div>
                            <hr class="my-16">
                        @endif
                        @if ($user_adicionales->count() > 0)
                            <div class="hidden">
                                <hr class="my-16">
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

                        <section class="grid grid-cols-1 xl:grid-cols-2 gap-8 my-8 bg">

                            @if ($user_plan != 7 && $user_plan != 17 && $user_plan != 18  && $user_plan != 19  && $user_plan != 36  && $user_plan != 47 && $user_plan != 49 && $user_plan != 50 && $user_plan != 51 && $user_plan != 52)

                                @if ($is_premium->count() == 0)
                                    <div class="bg-gradient-to-r from-gray-900 to-blue-900 border py-12 px-6 rounded-lg inline-block shadow-sm ">
                                        <div class=" flex items-center">
                                            <figure class="hidden lg:block w-56 mr-6 overflow-hidden rounded-lg">
                                                <img src="{{asset('img/billboards/premium.jpg')}}" alt="" class="w-full object-cover">
                                            </figure>
                                            <div class="text-gray-50 flex-1 flex flex-col">
                                                <div class="flex-1 flex flex-col">
                                                    <p class="mb-1">Actualiza tu plan y disfruta de todo el contenido</p>
                                                    <h2 class="text-2xl  text-blue-300 mb-2"><strong>{{$planUpdate->name}}</strong></h2>
                                                    <small>Actualiza tu plan a PREMIUM y adquiere las fases 2 3 y 4 por un pago único de</small>
                                                    @if ($planUpdate->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($planUpdate->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                                        <div>
                                                            <div class="ml-auto flex items-center">
                                                                <p class="text-4xl md:text-2xl font-bold text-green-400">{{$planUpdate->finalPrice}} US$</p>
                                                                <span class=" text-base font-bold ml-2 line-through text-red-500">{{$planUpdate->price->name}}</span>
                                                            </div>
                                                            <small class="text-gray-100">{{$planUpdate->discount->name}}</small>
                                                            <p class="text-sm text-accent-400"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($planUpdate->discount->expires_at))->diffForHumans() }}</b>!</p>
                                                        </div>
                                                    @else
                                                        <p class="text-4xl md:text-3xl font-bold text-gray-50">{{$planUpdate->price->name}}</p>
                                                    @endif
                                                </div>
                                                <a href="{{route('payment.checkout', $planUpdate)}}" class="cursor-pointer inline-block mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-red-700 border-red-700 text-gray-50 uppercase transition-colors duration-300 ease-in-out hover:bg-transparent  hover:text-red-700">Actualiza tu plan</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class=" bg-gradient-to-r from-green-400 to-green-700 border py-12 px-6 rounded-lg inline-block shadow-sm">
                                    <div class="flex items-center">
                                        <figure class="hidden lg:block w-56 mr-6 overflow-hidden rounded-lg">
                                            <img src="{{asset('img/billboards/whatsapp.jpg')}}" alt="" class="w-full object-cover">
                                        </figure>
                                        <div class="text-gray-50 flex-1 flex flex-col ">
                                            <div class="flex-1 flex flex-col">
                                                <p class=" mb-1">¿Ya estás inscrito al <b>Chat</b>?</p>
                                                <h2 class="font-bold text-2xl text-green-900">{{$planWhatsapp->name}}</h2>
                                                <h2 class="font-bold text-2xl text-green-900 mb-2"></h2>
                                                <small>Súmale más dias a tu acompañamiento grupal del Dr. Bayter.</small>
                                                @if ($planWhatsapp->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($planWhatsapp->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                                    <div>
                                                        <div class="ml-auto flex items-center">
                                                            <p class="text-4xl md:text-2xl font-bold text-green-900">{{$planWhatsapp->finalPrice}} US$</p>
                                                            <span class=" text-base font-bold ml-2 line-through text-red-500">{{$planWhatsapp->price->name}}</span>
                                                        </div>
                                                        <small class="text-gray-100">{{$planWhatsapp->discount->name}}</small>
                                                        <p class="text-sm text-accent-400"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($planWhatsapp->discount->expires_at))->diffForHumans() }}</b>!</p>
                                                    </div>
                                                @else
                                                    <p class="text-4xl md:text-2xl  text-gray-50">Desde <b>{{$planWhatsapp->price->name}}</b> al mes</p>
                                                @endif
                                            </div>
                                            <div class="">
                                                <a href="{{route('plan.whatsapp')}}" class=" block cursor-pointer mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                    @if ($subscribed_whatsapp)
                                                        Agrega más días a tu chat
                                                    @else
                                                        Adquiere tu mensualidad
                                                    @endif

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (!$subscribed_fase_week)
                                <div class="bg-gradient-to-r from-gray-900 to-blue-900 border py-12 px-6 rounded-lg __inline-block shadow-sm hidden">
                                    <div class=" flex items-center">
                                        <figure class="hidden lg:block w-56 mr-6 overflow-hidden rounded-lg">
                                            <img src="{{asset('img/billboards/plan_week.jpg')}}" alt="" class="w-full object-cover">
                                        </figure>
                                        <div class="text-gray-50 flex-1 flex flex-col">
                                            <div class="flex-1 flex flex-col">
                                                <p class="mb-1">Disfruta de las nuevas recetas adicionales</p>
                                                <h2 class="text-2xl  text-blue-300 mb-2"><strong>{{$plan_week->name}}</strong></h2>
                                                <small>Prueba 21 recetas diferentes por un pago único de</small>
                                                @if ($plan_week->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($plan_week->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                                    <div>
                                                        <div class="ml-auto flex items-center">
                                                            <p class="text-4xl md:text-2xl font-bold text-green-400">{{$plan_week->finalPrice}} US$</p>
                                                            <span class=" text-base font-bold ml-2 line-through text-red-500">{{$plan_week->price->name}}</span>
                                                        </div>
                                                        <small class="text-gray-100">{{$plan_week->discount->name}}</small>
                                                        <p class="text-sm text-accent-400"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($plan_week->discount->expires_at))->diffForHumans() }}</b>!</p>
                                                    </div>
                                                @else
                                                    <p class="text-4xl md:text-3xl font-bold text-gray-50">{{$plan_week->price->name}}</p>
                                                @endif
                                            </div>
                                            <a href="{{route('payment.checkout', $plan_week)}}" class="cursor-pointer inline-block mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-red-700 border-red-700 text-gray-50 uppercase transition-colors duration-300 ease-in-out hover:bg-transparent  hover:text-red-700">Adquieres ya</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endif

                            <div class=" bg-gradient-to-r from-gray-800 to-gray-900 border py-12 px-6 rounded-lg inline-block shadow-sm">
                                <div class=" flex items-center">
                                    <figure class="hidden lg:block w-56 mr-6 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/billboards/tutorial.jpg')}}" alt="" class="w-full object-cover">
                                    </figure>
                                    <div class="text-gray-50 flex-1 flex flex-col ">
                                        <div class="flex-1 flex flex-col">
                                            <p class=" mb-1">¿Estás perdido o no sabes donde empezar?</p>
                                            <h2 class="font-bold text-2xl text-red-700">Mira los tutoriales aquí</h2>
                                            <h2 class="font-bold text-2xl text-red-700 mb-2"></h2>
                                            <p class="text-base  text-gray-50">Aquí encontrarás la guía básica de uso de nuestra página para que no te pierdas ningún detalle.</p>
                                        </div>
                                        <div class="">
                                            <a href="{{route('plan.tutorial')}}" class=" block cursor-pointer mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-red-700 border-red-700 text-gray-50 uppercase transition-colors duration-300 ease-in-out  hover:bg-red-500 hover:text-gray-50">
                                                Entra aquí para aprender
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>

                    </div>
                </section>

            </div>


            @if (!$subscribed_fase_week)
                <section class="pb-4 fixed bottom-0 mr-4 right-0  z-50 transition duration-500 delay-3000 ease-in-out opacity-0"
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
