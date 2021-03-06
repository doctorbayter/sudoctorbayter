<div x-data="{ openMenu: false }" >
    <div class="flex">
        <x-menu  :userPlan="$user_plan" />
        <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="bg-white  ml-auto">

            <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
                <div class="w-10/12 mx-auto py-10">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Listado de</h3>
                    <h2 class=" font-bold text-6xl">Snacks <span class="text-red-700">Keto</span></h2>
                </div>
            </header>
            <section class="bg-gradient-to-t from-gray-100 pb-14 ">
                <div class="w-10/12 mx-auto my-10" x-data="{selected:1}">
                    <section class="mt-16">
                        <div class="grid grid-cols-1 xl:grid-cols-2 gap-x-8 gap-y-12">

                            @foreach ($snacks as $snack)
                                <div class="border border-gray-100 shadow-md rounded-xl overflow-hidden w-full">
                                    <div class="w-full block">
                                        <div class="flex items-center">
                                            <figure class=" w-60 h-full overflow-hidden bg-gray-100 ">

                                                <img src="{{asset('img/'.$snack->image->url)}}" alt="" class=" h-full object-cover">
                                            </figure>
                                            <div class="ml-6 relative w-full flex-1">
                                                <h2 class="font-bold text-lg text-gray-900">{{$snack->name}}</h2>
                                                <div class="text-gray-400 text-sm pr-4 my-4">
                                                    {!!Str::limit($snack->descripcion, '300', '...')!!}
                                                </div>
                                                <p class="bg-green-500 mt-1 px-2 py-1 text-xs rounded-lg inline-block text-white">{{$snack->carbs}}g Carbs.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach




                        </div>
                    </section>
                </div>
            </section>
    </div>
</div>
