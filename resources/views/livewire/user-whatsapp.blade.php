<div x-data="{ openMenu: false }" >
    <div class="flex">
        @can('enrolled', auth()->user()->subscriptions->whereIn('plan_id', [1, 2, 7, 8, 9, 10, 15, 16])->first())
            <x-menu :fases="$user_fases" :userPlan="$user_plan" />
            <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="w-11/12 bg-white">

                <section class="bg-gradient-to-t from-gray-100 " style="height: 100%">
                    <div class="w-10/12 mx-auto py-10">

                        <section class="grid grid-cols-1 gap-8 my-8 bg max-w-5xl mx-auto">

                            @if ($subscribed_whatsapp !== false)
                                <header class="bg-gray-50 py-4 px-6 border border-gray-100 rounded-xl">
                                    <p class="text-2xl " >Tu mensualidad de whatsapp vence:
                                        <span class="font-bold text-green-600">
                                            @if ($subscribed_whatsapp == 0) Hoy
                                            @elseif ($subscribed_whatsapp == 1) En {{$subscribed_whatsapp}} Día
                                            @else Dentro de {{$subscribed_whatsapp}} Días @endif
                                        </span>
                                    </p>
                                    <small class="leading-none mt-4"> <b>Nota:</b> Si adquieres más dias de chat se sumarán al total de días que tienes actualmente, por lo tanto no perderás ningún día de tu chat y podrás agregar más días cuando quieras.</small>
                                </header>
                            @endif

                            <div class="bg-gradient-to-r from-green-400 to-green-600 border py-12 px-6 rounded-lg inline-block shadow-sm relative">
                                <div class=" flex items-center">
                                    <div class="text-gray-50 flex-1 flex flex-col ">
                                        <div class="flex-1 flex flex-col">
                                            <p class=" mb-1">Adquiere 30 días de acceso al chat grupal</p>
                                            <h2 class="font-bold text-3xl md:text-5xl text-green-900">{{$planWhatsapp->name}}</h2>
                                            @if ($planWhatsapp->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($planWhatsapp->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                                <div>
                                                    <div class="ml-auto lg:flex items-center">
                                                        <p class="text-4xl md:text-2xl font-bold text-green-900">{{$planWhatsapp->finalPrice}} US$</p>
                                                        <span class=" text-base font-bold ml-2 line-through text-red-500">{{$planWhatsapp->price->name}}</span>
                                                    </div>
                                                    <small class="text-gray-100">{{$planWhatsapp->discount->name}}</small>
                                                    <p class="text-sm text-accent-400"> <i class="far fa-clock"></i> ¡Esta oferta termina <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($planWhatsapp->discount->expires_at))->diffForHumans() }}</b>!</p>
                                                </div>
                                            @else
                                                <p class="text-6xl md:text-5xl mt-2 font-bold text-gray-50">{{$planWhatsapp->price->name}}</p>
                                            @endif
                                        </div>
                                        <div class="">
                                            <a href="{{route('payment.checkout', $planWhatsapp)}}" class="block w-full lg:w-72  cursor-pointer mt-6 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                Adquiere 30 días más de chat
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-green-400 to-green-600 border py-12 px-6 rounded-lg inline-block shadow-sm relative">
                                <div class=" flex items-center">
                                    <div class="text-gray-50 flex-1 flex flex-col ">
                                        <div class="flex-1 flex flex-col">
                                            <p class=" mb-1">Ahora más. Adquiere 3 meses de acceso al chat grupal a un precio especial</p>
                                            <h2 class="font-bold text-3xl md:text-5xl text-green-900">{{$planWhatsapp3meses->name}}</h2>
                                            @if ($planWhatsapp3meses->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($planWhatsapp3meses->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                                <div>
                                                    <div class="ml-auto lg:flex items-center mt-2 ">
                                                        <p class=" text-4xl font-bold mr-4 leading-none text-red-500"><span class="line-through">{{$planWhatsapp3meses->price->name}}</span> <small class="block text-lg leading-none normal font-medium">Precio normal</small> </p>
                                                        <p class="text-6xl md:text-5xl font-bold text-gray-50">{{round($planWhatsapp3meses->finalPrice)}} US$ <br></p>
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-4xl md:text-5xl mt-2 font-bold text-gray-50">{{$planWhatsapp3meses->price->name}}</p>
                                            @endif
                                        </div>
                                        <div class="">
                                            <a href="{{route('payment.checkout', $planWhatsapp3meses)}}" class="block w-full lg:w-72  cursor-pointer mt-6 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                Adquiere 3 meses más de chat
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-green-400 to-green-600 border py-12 px-6 rounded-lg inline-block shadow-sm relative">
                                <div class=" flex items-center">
                                    <div class="text-gray-50 flex-1 flex flex-col ">
                                        <div class="flex-1 flex flex-col">
                                            <p class=" mb-1">Ahora más. Adquiere 6 meses de acceso al chat grupal a un precio especial</p>
                                            <h2 class="font-bold text-3xl md:text-5xl text-green-900">{{$planWhatsapp6meses->name}}</h2>
                                            @if ($planWhatsapp6meses->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($planWhatsapp6meses->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                                <div>
                                                    <div class="ml-auto lg:flex items-center mt-2 ">
                                                        <p class=" text-4xl font-bold mr-4 leading-none text-red-500"><span class="line-through">{{$planWhatsapp6meses->price->name}}</span> <small class="block text-lg leading-none normal font-medium">Precio normal</small> </p>
                                                        <p class="text-6xl md:text-5xl font-bold text-gray-50">{{round($planWhatsapp6meses->finalPrice)}} US$ <br></p>
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-4xl md:text-5xl mt-2 font-bold text-gray-50">{{$planWhatsapp6meses->price->name}}</p>
                                            @endif
                                        </div>
                                        <div class="">
                                            <a href="{{route('payment.checkout', $planWhatsapp6meses)}}" class="block w-full lg:w-72  cursor-pointer mt-6 text-center text-sm font-bold px-4 py-2 rounded-full border bg-green-300 border-green-900 text-green-900 uppercase transition-colors duration-300 ease-in-out  hover:bg-green-900 hover:text-gray-50">
                                                Adquiere 6 meses más de chat
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
</div>
