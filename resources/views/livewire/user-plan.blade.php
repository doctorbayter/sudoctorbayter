<div x-data="{ openMenu: false }" >
    <div class="flex">
        <x-menu :fases="auth()->user()->subscription->plan->fases" />
        <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="w-11/12 bg-white">
            
            <section class="bg-gradient-to-t from-gray-100 " style="height: 100%">
                <div class="w-10/12 mx-auto py-10">
                    <header>
                        <p>Tu plan actual es:</p>
                        <h2 class="text-3xl font-bold text-gray-900">{{auth()->user()->subscription->plan->name}}</h2>
                    </header>
                    <section class="grid grid-cols-1 xl:grid-cols-2 gap-8 my-8">
                        @if (auth()->user()->subscription->plan->id != 1)
                        <div class="bg-gray-50 border p-8 rounded-lg inline-block shadow-sm">
                            <div class=" flex">
                                <figure class="w-56 mr-6">
                                    <img src="{{asset('img/billboards/premium.jpg')}}" alt="" class="w-full object-cover">
                                </figure>
                                <div class="text-gray-900 flex-1 flex flex-col">
                                    <div class="flex-1 flex flex-col">
                                        <p class="mb-1">Actualiza tu plan</p>
                                        <h2 class="text-2xl font-bold text-yellow-300"><strong>{{$planPremium->name}}</strong></h2>
                                        @if ($planPremium->discount)
                                            <div>
                                                <div class="ml-auto flex items-center">
                                                    <p class="text-4xl md:text-2xl font-bold text-green-400">{{$planPremium->finalPrice}} US$</p>
                                                    <span class=" text-base font-bold ml-2 line-through text-red-500">{{$planPremium->price->name}}</span>
                                                </div>
                                                <small class="text-gray-500">{{$planPremium->discount->name}}</small>    
                                            </div>
                                        @else
                                            <p class="text-4xl md:text-2xl font-bold text-gray-400">{{$planPremium->price->name}}</p>
                                        @endif
                                    </div>
                                    <div class="cursor-pointer mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-red-700 border-red-700 text-gray-50 uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent  hover:text-red-700">Actualiza tu plan</div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($dkp == null)
                            <div class="bg-gray-900 border p-8 rounded-lg inline-block shadow-sm">
                                <div class=" flex">
                                    <figure class="w-56 mr-6">
                                        
                                        <img src="{{asset('img/billboards/dkp_2021.jpg')}}" alt="" class="w-full object-cover">
                                    </figure>
                                    <div class="text-gray-50 flex-1 flex flex-col">
                                        <div class="flex-1 flex flex-col">
                                            <p class="mb-1">Inscribete a nuestro próximo evento</p>
                                            <h2 class="text-2xl font-bold text-yellow-300"><strong>{{$planDkp->name}}</strong></h2>
                                            @if ($planDkp->discount)
                                                <div>
                                                    <div class="ml-auto flex items-center">
                                                        <p class="text-4xl md:text-2xl font-bold text-green-400">{{$planDkp->finalPrice}} US$</p>
                                                        <span class=" text-base font-bold ml-2 line-through text-red-500">{{$planDkp->price->name}}</span>
                                                    </div>
                                                    <small class="text-gray-50">{{$planDkp->discount->name}}</small>    
                                                </div>
                                            @else
                                                <p class="text-4xl md:text-2xl font-bold text-gray-400">{{$planDkp->price->name}}</p>
                                            @endif
                                        </div>
                                        <div class="cursor-pointer mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-transparent border-gray-50 text-gray-50 uppercase transition-colors duration-300 ease-in-out  hover:bg-yellow-400 hover:border-gray-900 hover:text-gray-900">Adquiere tu entrada</div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($whatsapp->count() > 0)

                            <div class=" bg-green-400 border p-8 rounded-lg inline-block shadow-sm">
                                <div class=" flex">
                                    <figure class="w-56 mr-6">
                                        <img src="{{asset('img/billboards/whatsapp.jpg')}}" alt="" class="w-full object-cover">
                                    </figure>
                                    <div class="text-gray-50 flex-1 flex flex-col ">
                                        <div class="flex-1 flex flex-col">
                                            <p class=" mb-1">Servicios adicionales</p>
                                            <h2 class="font-bold text-2xl text-green-900">{{$whatsapp->plan->name}}</h2>
                                            <p class=" mt-4">Actualmente estás suscrito al chat grupal con tu Doctor Bayter</p>
                                        </div>
                                        <div class="">
                                            <div class=" cursor-pointer mt-8 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                Termina en {{ \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @else
                            No tiene
                        @endif

                    </section>
                    
                </div>
            </section>
            
        </div>
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
            const PROMO_AD = sessionasset('img/m('promoAd');
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
