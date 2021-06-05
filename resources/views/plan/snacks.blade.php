<x-app-layout>
    <div class="flex">
        <x-menu :fases="auth()->user()->subscription->plan->fases" />
        <div class="w-full bg-white">

            <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
                <div class="w-10/12 mx-auto py-10">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Listado de</h3>
                    <h2 class=" font-bold text-6xl">Salsitas <span class="text-red-700">Keto</span></h2>
                </div>
            </header>  

            <section class="bg-gradient-to-t from-gray-100 pb-14 ">
                <div class="w-10/12 mx-auto my-10" x-data="{selected:1}">
                    <section class="mt-16">
                        <div class="grid grid-cols-2 gap-x-8 gap-y-12">
                            <div class="border border-gray-100 shadow-md rounded-xl overflow-hidden w-full">
                                <div class="w-full block">
                                    <div class="flex items-center">
                                        <figure class=" w-60 h-full overflow-hidden bg-gray-100 ">
                                            <img src="{{Storage::url('recipes/aceitunas.jpg')}}" alt="" class=" h-full object-cover">
                                        </figure>
                                        <div class="ml-6 relative w-full flex-1">
                                            <h2 class="font-bold text-lg text-gray-900">Aceitunas</h2>
                                            <p class="text-gray-400 text-sm pr-4">Puedes comer entre 7 a 10 aceitunas <b>máximo</b></p>
                                            <p class="bg-green-500 mt-1 px-2 py-1 text-xs rounded-lg inline-block text-white">1g Carbs.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-100 shadow-md rounded-xl overflow-hidden w-full">
                                <div class="w-full block">
                                    <div class="flex items-center">
                                        <figure class=" w-60 h-full overflow-hidden bg-gray-100 ">
                                            <img src="{{Storage::url('recipes/quesillo.jpg')}}" alt="" class=" h-full object-cover">
                                        </figure>
                                        <div class="ml-6 relative w-full flex-1">
                                            <h2 class="font-bold text-lg text-gray-900">Quesillo</h2>
                                            <p class="text-gray-400 text-sm pr-4">50 gramos de queso <b>(que sea graso y cero carbohidratos)</b> con un pocillo de café o té verde
                                                </p>
                                            <p class="bg-green-500 mt-1 px-2 py-1 text-xs rounded-lg inline-block text-white ">0g Carbs.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>