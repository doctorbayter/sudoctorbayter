<div x-data="{ openMenu: false }" >
    <div class="flex">
        @can('enrolled', auth()->user()->subscription)
            <x-menu :fases="$user_fases" />
            <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="w-11/12 bg-white">
                
                <section class="bg-gradient-to-t from-gray-100 " style="height: 100%">
                    <div class="w-10/12 mx-auto py-10">
                        <header>
                            <p>Tu plan actual es:</p>
                            <h2 class="text-4xl font-bold text-gray-900">{{auth()->user()->subscription->plan->name}}</h2>
                        </header>
                        <section class="">
                            
                            <div class="grid grid-cols-1 xl:grid-cols-{{$user_fases->count()}}  gap-8 pt-8">
                                
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

                        <hr class="my-16">

                        <section class="grid grid-cols-1 xl:grid-cols-2 gap-8 my-8 bg">
                            @if (auth()->user()->subscription->plan->id != 1)
                                <div class="bg-gradient-to-r from-gray-900 to-blue-900 border py-12 px-6 rounded-lg inline-block shadow-sm ">
                                    <div class=" flex items-center">
                                        <figure class="hidden lg:block w-56 mr-6 overflow-hidden rounded-lg">
                                            <img src="{{asset('img/billboards/premium.jpg')}}" alt="" class="w-full object-cover">
                                        </figure>
                                        <div class="text-gray-50 flex-1 flex flex-col">
                                            <div class="flex-1 flex flex-col">
                                                <p class="mb-1">Actualiza tu plan y disfruta de todo el contenido</p>
                                                <h2 class="text-2xl  text-blue-300 mb-2"><strong>{{$planUpdate->name}}</strong></h2>
                                                <small>Pago único de</small>
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
                            
                            @if ($whatsapp && $whatsapp->count() > 0 && auth()->user()->subscription->plan->id != 4 && \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->gt(\Carbon\Carbon::now()))

                                <div class="bg-gradient-to-r from-green-400 to-green-700 border py-12 px-6 rounded-lg inline-block shadow-sm">
                                    <div class=" flex items-center">
                                        <figure class="hidden lg:block w-56 mr-6 overflow-hidden rounded-lg">
                                            <img src="{{asset('img/billboards/whatsapp.jpg')}}" alt="" class="w-full object-cover">
                                        </figure>
                                        <div class="text-gray-50 flex-1 flex flex-col ">
                                            <div class="flex-1 flex flex-col">
                                                <p class=" mb-1">Tu acceso al chat grupal termina dentro <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->diffForHumans() }}</b></p>
                                                <h2 class="font-bold text-2xl text-green-900">{{$whatsapp->plan->name}}</h2>
                                                <small>Compra 1 mes más</small>
                                                @if ($planWhatsapp->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($planWhatsapp->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                                    <div>
                                                        <div class="ml-auto flex items-center">
                                                            <p class="text-4xl md:text-2xl font-bold text-green-900">{{$planWhatsapp->finalPrice}} US$</p>
                                                            <span class=" text-base font-bold ml-2 line-through text-red-500">{{$planWhatsapp->price->name}}</span>
                                                        </div>
                                                        <small class="text-gray-100">{{$planWhatsapp->discount->name}}</small>
                                                        <p class="text-sm text-accent-400"> <i class="far fa-clock"></i> ¡Esta oferta termina <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($planWhatsapp->discount->expires_at))->diffForHumans() }}</b>!</p>    
                                                    </div>
                                                @else
                                                    <p class="text-4xl md:text-3xl font-bold text-gray-50">{{$planWhatsapp->price->name}}</p>
                                                @endif
                                            </div>
                                            <div class="">
                                                <a href="{{route('payment.checkout', $planWhatsapp)}}" class="block cursor-pointer mt-8 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                   Adquiere 30 días más de chat
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class=" bg-gradient-to-r from-green-400 to-green-700 border py-12 px-6 rounded-lg inline-block shadow-sm">
                                <div class=" flex items-center">
                                    <figure class="hidden lg:block w-56 mr-6 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/billboards/whatsapp.jpg')}}" alt="" class="w-full object-cover">
                                    </figure>
                                    <div class="text-gray-50 flex-1 flex flex-col ">
                                        <div class="flex-1 flex flex-col">
                                            <p class=" mb-1">Nunca estarás solo aquiere mi acompañamiento inscríbete ya</p>
                                            <h2 class="font-bold text-2xl text-green-900">{{$planWhatsapp->name}}</h2>
                                            <h2 class="font-bold text-2xl text-green-900 mb-2"></h2>
                                            <small>Pagas 1 vez al mes</small>
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
                                                <p class="text-4xl md:text-3xl font-bold text-gray-50">{{$planWhatsapp->price->name}}</p>
                                            @endif
                                        </div>
                                        <div class="">
                                            <a href="{{route('payment.checkout', $planWhatsapp)}}" class=" block cursor-pointer mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                Adquiere tu mensualidad
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    @if ($planPremium->discount)
        <script>
            const PROMO_AD = sessionasset('img/('promoAd');
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
