<x-app-layout>
    <div class="flex">
        <div class="bg-white  mx-auto w-full">
            <header class="shadow-lg relative">
                <div class="w-10/12 mx-auto py-10 relative z-10 max-w-7xl">
                <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Receta de</h3>
                <h2 class=" font-bold text-3xl md:text-6xl">Sosbregrille</h2>
                <div class="flex text-xs items-center">
                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">18,84g Carbs.</p>
                    <p class="text-gray-50 ml-2 flex items-center">
                        <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                        <span>1 persona</span>
                    </p>
                    <p class="text-gray-50 ml-2 flex items-center">
                        <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                        <span>30 minutos</span>
                    </p>
                </div>
            </div>
            <div class="absolute w-full h-full bg-fixed bg-center top-0 left-0 opacity-40" style="background-image: url({{asset('img/recipes/reto4-menu-dia-1-2.jpg')}})"></div>
        </header>
        <aside class="w-11/12 mx-auto mt-10 max-w-7xl">
            <a href="{{ url()->previous() }}" class="text-red-700 font-bold text-lg px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg"> <i class="fas fa-chevron-left mr-2"></i> Volver al menú</a>
        </aside>
        <div class="w-11/12 mx-auto my-10 max-w-7xl">
            <section class="mt-16">
                <div class="flex flex-col xl:flex-row">
                    <div class=" w-full xl:w-4/12 ">
                        <figure class="rounded-t-xl overflow-hidden">
                            <img src="{{asset('img/recipes/reto4-menu-dia-1-2.jpg')}}" alt="" class=" w-full object-cover">
                        </figure>
                        <div class=" bg-gray-200 rounded-b-xl px-4 py-8">
                            <h3 class="text-3xl md:text-4xl text-gray-900 font-bold">Ingredientes</h3>
                            <ul class="mt-6 text-sm text-gray-600">
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Sobrebarriga o carne de falda entre 180 a 220 gramos para mujer y de 200 a 280 gramos para hombres</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>30 gramos de cebolla</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 (2 gramos) diente de ajo finamente picado (0,48 gramos de carbohidratos)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 taza de consomé de pollo </li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 cucharadita de perejil</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 cucharadita de tomillo</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 cucharadita de oregano</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Aceite de oliva extra virgen</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Salpimienta</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>INGREDIENTES ENSALADA</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>150 gramos de espinacas picada en trozos (2,1 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>60 gramos de rúcala picada en trozos (2,4 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>80 gramos de champiñones picados en laminas (2,64 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>100 gramos de lechuga romana picada en trozos (2,9 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>30 ml (2 cucharadas) de zumo de limón (2 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>30 ml (2 cucharadas) de zumo de limón (2 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>2 cucharadas de vinagre de sidra de manzana</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Aceite de oliva aromatizado</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Salpimienta</li>
                            </ul>
                        </div>
                    </div>
                    <div class="xl:ml-16 mt-12 md:mt-0 flex-1">
                        <h3 class="text-4xl font-bold text-red-700">Preparación</h3>
                        <ul class=" divide-y mt-8">
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">1</span>
                                <p>En un tazón poner la sobrebarriga con un buen chorro de aceite de oliva, tomillo, perejil, orégano, ajo y salpimienta </p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">2</span>
                                <p>Revuelve y deja conservar por lo menos 2 horas (esta es una manera de sazonar o lo puedes hacer a tu gusto)</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">3</span>
                                <p>Después de este tiempo en una olla a presión pones el caldo de pollo, sobre barriga con todas las especies</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">4</span>
                                <p>Y dejas cocinar por 1 hora o hasta que la carne ablande</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">5</span>
                                <p>Si debes anexar mas liquido y no tienes mas consomé puedes poner agua</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">6</span>
                                <p>Cuando ya esta blanda, la pones a la parrilla, ojo con un poco de mantequilla para evitar quemarse</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">7</span>
                                <p>Las asas por ambos lados hasta que este doradita</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">8</span>
                                <p>Sirves con una rica ensalada</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">9</span>
                                <p>PREPARACIÓN ENSALADA</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">10</span>
                                <p>Pones en un tazón las espinacas, rúcala, lechuga, champiñones, revuelves y salpimientas</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">11</span>
                                <p>Agregas el zumo de limón, vinagre, un chorrito de aceite y revolveos una vez mas</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">12</span>
                                <p>Agregas al aguacate, sal pimentas y pones otro poco de aceite de oliva</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">13</span>
                                <p>Sirves con tu plato sobregrille</p>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </section>
            <hr class="my-12">
        </div>
      </div>
</div>
@push('scripts')
    <script src="https://player.vimeo.com/api/player.js"></script>
@endpush
</x-app-layout>
