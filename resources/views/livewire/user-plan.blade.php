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

                        <section class="grid grid-cols-1 gap-8 my-8 bg">

                            <div class=" bg-gradient-to-b from-gray-700 to-gray-900 border py-12 px-6 rounded-lg inline-block shadow-sm">
                                <div class=" flex items-center">
                                   
                                    <div class="text-gray-50 flex-1 flex flex-col pl-8 ">
                                        <div class="flex-1 flex flex-col">
                                            <p class=" mb-1">¿Estás iniciando el Método DKP y tienes dudas?</p>
                                            <h2 class="font-bold text-4xl text-red-700">Mira la Biblioteca de contenido aquí</h2>
                                            <h2 class="font-bold text-2xl text-red-700 mb-2"></h2>
                                            <p class="text-base  text-gray-50">Aquí encontrarás la biblioteca de contenido exclusiva de tu doctor Bayter para los miembros del Método DKP. Si estás iniciando en el Método DKP te recomendamos dar una leida a todo el contenido de esta biblioteca para despejar tus dudas. </p>
                                        </div>
                                        <div class="">
                                            <a href="{{route('plan.biblioteca')}}" class=" max-w-xs block cursor-pointer mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-red-700 border-red-700 text-gray-50 uppercase transition-colors duration-300 ease-in-out  hover:bg-red-500 hover:text-gray-50">
                                                Entra aquí para aprender
                                            </a>
                                        </div>
                                    </div>
                                    <figure class="hidden lg:block  w-80 mr-6 overflow-hidden rounded-lg">
                                        <img src="{{asset('img/billboards/tutorial.jpg')}}" alt="" class="w-full object-cover">
                                    </figure>
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
