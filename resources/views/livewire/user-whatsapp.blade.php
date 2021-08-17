<div x-data="{ openMenu: false }" >
    <div class="flex">
        @can('enrolled', auth()->user()->subscriptions->whereIn('plan_id', [1, 2, 7, 8, 9])->first())
            <x-menu :fases="$user_fases" :userPlan="$user_plan" />
            <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="w-11/12 bg-white">

                <section class="bg-gradient-to-t from-gray-100 " style="height: 100%">
                    <div class="w-10/12 mx-auto py-10">

                        <section class="grid grid-cols-1 gap-8 my-8 bg max-w-5xl mx-auto">

                            @if ($whatsapp && $whatsapp->count() > 0 && auth()->user()->subscription->plan->id != 5 && \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->gt(\Carbon\Carbon::now()))
                                <div class="bg-gradient-to-r from-green-400 to-green-700 border py-12 px-6 rounded-lg inline-block shadow-sm relative">
                                    <div class=" flex items-center">

                                        <div class="text-gray-50 flex-1 flex flex-col ">
                                            <div class="flex-1 flex flex-col">
                                                <p class=" mb-1">Tu acceso al chat grupal termina dentro <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($whatsapp->expires_at))->diffForHumans() }}</b></p>
                                                <h2 class="font-bold text-3xl md:text-5xl text-green-900">{{$whatsapp->plan->name}}</h2>
                                                <small class="text-base">Compra 1 mes más</small>
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
                                                <a href="{{route('payment.checkout', $planWhatsapp)}}" class="block w-full lg:w-72  cursor-pointer mt-8 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                   Adquiere 30 días más de chat
                                                </a>
                                            </div>
                                        </div>
                                        <figure class=" hidden lg:block w-56 mr-6  overflow-hidden rounded-lg absolute bottom-0 right-24">
                                            <img src="{{asset('img/billboards/doctor_whatsapp.png')}}" alt="" class="w-full object-cover">
                                        </figure>
                                    </div>
                                </div>
                            @else
                                    <div class=" bg-gradient-to-r from-green-400 to-green-700 border py-12 px-6 lg:px-12 rounded-lg inline-block shadow-sm relative">
                                        <div class=" flex items-center ">

                                            <div class="text-gray-50 flex-1 flex flex-col ">
                                                <div class="flex-1 flex flex-col">
                                                    <p class=" mb-1">Nunca estarás solo aquiere mi acompañamiento inscríbete ya</p>
                                                    <h2 class="font-bold text-3xl lg:text-5xl text-green-900">{{$planWhatsapp->name}}</h2>
                                                    <h2 class="font-bold text-2xl text-green-900 mb-2"></h2>
                                                    <small class="text-base">Pagas 1 vez al mes</small>
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
                                                        <p class="text-4xl md:text-4xl font-bold text-gray-50">{{$planWhatsapp->price->name}}</p>
                                                    @endif
                                                </div>
                                                <div class="">
                                                    <a href="{{route('payment.checkout', $planWhatsapp)}}" class="block w-full lg:w-72  cursor-pointer mt-4 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                        Adquiere tu mensualidad
                                                    </a>
                                                </div>
                                            </div>
                                            <figure class=" hidden lg:block w-56 mr-6  overflow-hidden rounded-lg absolute bottom-0 right-24">
                                                <img src="{{asset('img/billboards/doctor_whatsapp.png')}}" alt="" class="w-full object-cover">
                                            </figure>
                                        </div>
                                    </div>
                            @endif
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
</div>
