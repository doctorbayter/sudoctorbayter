<x-app-layout>
    <div class="flex">
        <div class="bg-white  mx-auto w-full">
            <header class="shadow-lg relative">
                <div class="w-10/12 mx-auto py-10 relative z-10 max-w-7xl">
                <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Receta de</h3>
                <h2 class=" font-bold text-3xl md:text-6xl">Alitas verdosas</h2>
                <div class="flex text-xs items-center">
                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">13,34g Carbs.</p>
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
            <div class="absolute w-full h-full bg-fixed bg-center top-0 left-0 opacity-40" style="background-image: url({{asset('img/recipes/reto4-menu-dia-2-2.jpg')}})"></div>
        </header>
        <aside class="w-11/12 mx-auto mt-10 max-w-7xl">
            <a href="{{ url()->previous() }}" class="text-red-700 font-bold text-lg px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg"> <i class="fas fa-chevron-left mr-2"></i> Volver al menú</a>
        </aside>
        <div class="w-11/12 mx-auto my-10 max-w-7xl">
            <section class="mt-16">
                <div class="flex flex-col xl:flex-row">
                    <div class=" w-full xl:w-4/12 ">
                        <figure class="rounded-t-xl overflow-hidden">
                            <img src="{{asset('img/recipes/reto4-menu-dia-2-2.jpg')}}" alt="" class=" w-full object-cover">
                        </figure>
                        <div class=" bg-gray-200 rounded-b-xl px-4 py-8">
                            <h3 class="text-3xl md:text-4xl text-gray-900 font-bold">Ingredientes</h3>
                            <ul class="mt-6 text-sm text-gray-600">
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>3 alas de pollo grandes para mujer o 4 alas de pollo para hombre</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 (4 gramos) diente de ajo finamente picado (0,98 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 cucharadita de tomillo seco en polvo</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 cucharadita de perejil fresco finamente picado</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Aceite de oliva extra virgen</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 tasa de caldo de pollo natural</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>100 gramos de aguacate (8,5 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>20 gramos de cebolla finamente picada (1,86 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 cucharadita de cilantro finamente picado</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>2 (30 ml) cucharadas de zumo de limón (2 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Aceite de oliva extra virgen</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Gotas de ají o chili (opcional)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Salpimienta</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>INGREDIENTES ENSALADA</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>7 a 10 aceitunas partidas a la mitad (1 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>35 gramos de pepino picados a la juliana (1,26 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>30 gramos de apio en rama picado en cuadritos (0,93 gr. CH) </li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>50 gramos de col rizado (2,1 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>40 gramos de lechuga morada o crespa (1,16 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>30 gramos de rábano picado a la juliana (1.02 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Aceite de oliva extra-virgen aromatizado</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 cucharada de vinagre balsámico </li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Salpimienta</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="xl:ml-16 mt-12 md:mt-0 flex-1">
                        <h3 class="text-4xl font-bold text-red-700">Preparación</h3>
                        <ul class=" divide-y mt-8">
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">1</span>
                                <p>Antes de hacer las alitas debes preparar la salsa verde</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">2</span>
                                <p>Pon en una licuadora el aguacate, cebolla, cilantro, limón, aceite y las gotas de ají y licuas </p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">3</span>
                                <p>Si notas que este espeso le puedes agregar un poquito de agua</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">4</span>
                                <p>Sal pimentas, revuelves nuevamente y conservar hasta que estén las alitas</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">5</span>
                                <p>En un tazón pones una buena cantidad de aceite de oliva, el ajo, tomillo y perejil</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">6</span>
                                <p>Pones las alitas sal pimentas, revuelves para que se penetre todo y dejas marinando por 1 hora</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">7</span>
                                <p>Pasado este tiempo pones en un sarten un poco de mantequilla y pones las alas a fuego bajo</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">8</span>
                                <p>Agregas el caldo y dejas cocinar por 45 minutos o hasta que las alitas estén cocidas y ya este totalmente reducido el caldo</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">9</span>
                                <p>Agregas la salsa verde sobre las alitas y dejas calentar por 5 minutos para servir todo bien caliente.</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">10</span>
                                <p>PREPARACION ENSALADA</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">11</span>
                                <p>Pones en un tazón todos los ingredientes, salpimientas y revuelves muy bien</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">12</span>
                                <p>Agregas vinagre, aceite de oliva, sal pimienta y revuelves una vez mas</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">13</span>
                                <p>Sirves con tus alitas verdosas</p>
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
