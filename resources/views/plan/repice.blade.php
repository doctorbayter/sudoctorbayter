<x-app-layout>
    <div class="flex">
        <x-menu :fases="auth()->user()->subscription->plan->fases" />
        <div class="w-full bg-white">
            <header class="shadow-lg relative">
                
                <div class="w-10/12 mx-auto py-10 relative z-10">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Receta de</h3>
                    <h2 class=" font-bold text-6xl">Omelet semi primaveral</h2>
                    <div class="flex text-xs items-center">
                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">1g Carbs.</p>
                        <p class="text-gray-50 ml-2 flex items-center">
                            <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                            <span>1 persona</span>
                        </p>
                        <p class="text-gray-50 ml-2 flex items-center">
                            <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                            <span>10 minutos</span>
                        </p>
                    </div>
                </div>
                <div class="absolute w-full h-full bg-fixed bg-cover top-0 left-0 opacity-40" style="background-image: url({{Storage::url('repices/omelet-semi-primaveral.jpg')}})"></div>
            </header>  
              <div class="w-10/12 mx-auto my-10">
                    <section class="mt-16">
                        <div class="flex">
                            <div class=" w-6/12">
                                <figure class="rounded-t-xl overflow-hidden">
                                    <img src="{{Storage::url('repices/omelet-semi-primaveral.jpg')}}" alt="" class=" object-cover h-full">
                                </figure>

                                <div class=" bg-gray-200 rounded-b-xl px-4 py-8">
                                    <h3 class="text-4xl text-gray-900 font-bold">Ingredientes</h3>
                                    <ul class="mt-6 text-sm text-gray-600">
                                        <li class="mb-6 leading-snug"> <img src="{{asset('img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-4 mr-2">3 huevos</li> 
                                        <li class="mb-6 leading-snug"> <img src="{{asset('img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-4 mr-2">10 gramos de cebolla finamente picada (0,93 gramos de carbohidratos).</li>
                                        <li class="mb-6 leading-snug"> <img src="{{asset('img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-4 mr-2">10 gramos de tomate, finamente picado (0,78 gramos de carbohidratos).</li>
                                        <li class="mb-6 leading-snug"> <img src="{{asset('img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-4 mr-2">40 gramos de espinacas, finamente picada (0,56 gramos de carbohidratos).</li>
                                        <li class="mb-6 leading-snug"> <img src="{{asset('img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-4 mr-2">20 gramos de queso parmesano o 2 cucharadas grandes rebozadas.</li>
                                        <li class="mb-6 leading-snug"> <img src="{{asset('img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-4 mr-2">Manteca de cerdo o mantequilla de vaca 100% de pastoreo o aceite de coco.</li>
                                        <li class="mb-6 leading-snug"> <img src="{{asset('img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-4 mr-2">1 cucharada de aceite de oliva extra virgen.</li>
                                        <li class="mb-6 leading-snug"> <img src="{{asset('img/icons/gfx/checked-box.svg')}}" alt="" class="inline w-4 mr-2">Sal pimienta.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ml-16">
                                <h3 class="text-4xl font-bold text-red-700">Preparación</h3>
                                <ul class=" divide-y mt-8">
                                    <li class="flex mb-8 mt-4">
                                        <span class="bg-red-700 text-white font-bold w-8 h-8 leading-8 text-center rounded-full mr-4 text-sm">1</span>
                                        <p>Calienta a fuego bajo el sartén con la mantequilla, manteca de cerdo o aceite de coco.  </p>
                                    </li>
                                    <li class="flex mb-8">
                                        <span class="bg-red-700 text-white font-bold w-8 h-8 leading-8 text-center rounded-full mr-4 mt-8 text-sm">2</span>
                                        <p class="mt-8">Con anterioridad, puedes batir los huevos o si deseas directamente en el sartén.</p>
                                    </li>
                                    <li class="flex mb-8">
                                        <span class="bg-red-700 text-white font-bold w-8 h-8 leading-8 text-center rounded-full mr-4 mt-8 text-sm">3</span>
                                        <p class="mt-8">Cuando esté, espera unos segundos, no más de 20, e incorpora la cebolla, el tomate, espinacas y sal pimienta al gusto.</p>
                                    </li>
                                    <li class="flex mb-8">
                                        <span class="bg-red-700 text-white font-bold w-8 h-8 leading-8 text-center rounded-full mr-4 mt-8 text-sm">4</span>
                                        <p class="mt-8">Deja calentar según tu preferencia (blando o duro) y antes de cerrar la tortilla agrega el queso.</p>
                                    </li>
                                    <li class="flex mb-8">
                                        <span class="bg-red-700 text-white font-bold w-8 h-8 leading-8 text-center rounded-full mr-4 mt-8 text-sm">5</span>
                                        <p class="mt-8">Si deseas, antes de servir puedes espolvorear más queso y un chorrito de aceite de oliva.</p>
                                    </li>
                                    
                                </ul>

                                <div class="mt-12">
                                    <h2 class="text-4xl font-bold mb-4 text-red-700">
                                        ¡Tips!
                                    </h2>
                                    <div class="text-gray-600">
                                        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut possimus veniam cumque dicta repudiandae distinctio sunt error culpa voluptatum? Recusandae delectus eos, error harum minus ut pariatur eaque sequi quam?</p>
                                    </div>
                                </div>
                                <div class="mt-12">
                                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/519124306?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="D&amp;iacute;a 1 Reto 7 A Otro Nivel"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
                                </div>

                            </div>
                            
                        </div>
                    </section>

                   <hr class="my-12">
              </div>
          </div>
    </div>
</x-app-layout>