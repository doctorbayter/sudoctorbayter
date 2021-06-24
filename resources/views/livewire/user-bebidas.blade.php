<div x-data="{ openMenu: false }" >
    <div class="flex">
        <x-menu :fases="$user_fases" />
        <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="bg-white  ml-auto">

            <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
                <div class="w-10/12 mx-auto py-10">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Listado de</h3>
                    <h2 class=" font-bold text-6xl">Bebidas <span class="text-red-700">Keto</span></h2>

                </div>

            </header>  

            <section class="bg-gradient-to-t from-gray-100 pb-14 ">
                <div class="w-10/12 mx-auto my-10" x-data="{selected:1}">
                    <section class="mt-16">
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-12">
                            
                            
                            @foreach ($bebidas as $bebida)
                                <div>
                                    <a href="{{route('plan.recipe', $bebida)}}">
                                        <div class="relative h-62"> 
                                            <img src="{{asset('img/'.$bebida->image->url)}}" alt="" class="rounded-2xl object-cover">
                                        </div>
                                        <div class="mt-2 ml-4">
                                            <p class="text-2xl mb-2 font-bold text-gray-900">{{$bebida->name}}</p>
                                            <div class="flex text-xs items-center">
                                            <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">{{$bebida->carbs}}g Carbs.</p>
                                            <p class="text-gray-400 ml-2 flex items-center">
                                                <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                                <span>1 persona</span>
                                            </p>
                                            <p class="text-gray-400 ml-2 flex items-center">
                                                <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                                <span>{{$bebida->time}} minutos</span>
                                            </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                           
                            
                        </div>
                    </section>
                </div>
            </section>
    </div>
</div>