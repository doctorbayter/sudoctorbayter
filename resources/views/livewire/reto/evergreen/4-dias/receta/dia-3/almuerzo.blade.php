<x-app-layout>
    <div class="flex">
        <div class="bg-white  mx-auto w-full">
            <header class="shadow-lg relative">
                <div class="w-10/12 mx-auto py-10 relative z-10 max-w-7xl">
                <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Receta de</h3>
                <h2 class=" font-bold text-3xl md:text-6xl">HamburKetoromana</h2>
                <div class="flex text-xs items-center">
                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">14,17g Carbs.</p>
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
            <div class="absolute w-full h-full bg-fixed bg-center top-0 left-0 opacity-40" style="background-image: url({{asset('img/recipes/reto4-menu-dia-3-2.jpg')}})"></div>
        </header>
        <aside class="w-11/12 mx-auto mt-10 max-w-7xl">
            <a href="{{ url()->previous() }}" class="text-red-700 font-bold text-lg px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg"> <i class="fas fa-chevron-left mr-2"></i> Volver al menú</a>
        </aside>
        <div class="w-11/12 mx-auto my-10 max-w-7xl">
            <section class="mt-16">
                <div class="flex flex-col xl:flex-row">
                    <div class=" w-full xl:w-4/12 ">
                        <figure class="rounded-t-xl overflow-hidden">
                            <img src="{{asset('img/recipes/reto4-menu-dia-3-2.jpg')}}" alt="" class=" w-full object-cover">
                        </figure>
                        <div class=" bg-gray-200 rounded-b-xl px-4 py-8">
                            <h3 class="text-3xl md:text-4xl text-gray-900 font-bold">Ingredientes</h3>
                            <ul class="mt-6 text-sm text-gray-600">
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>100 gramos de carne molida de res adobada al gusto</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>100 gramos de carne molida de cerdo adobaban al gusto</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>1 huevo</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>2 lonjas o lonchas (40 gramos) queso holandés o el que tengas en casa preferiblemente graso</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>2 lonjas o lonchas (50 gramos) de tocino o panceta, preferiblemente en tiras</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>2 (20 gramos) cucharadas crema agria</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>80 gramos de aguacate picada en cuadritos (8,5 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>50 gramos de tomate en rodajas en rodajas (1,95 gr. CH) </li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>40 gramos de cebolla en rodajas (3,72 gr. CH)</li>
                                <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>2 a 3 hojas grandes de lechuga lisa romana</li>
                            </ul>
                        </div>
                    </div>
                    <div class="xl:ml-16 mt-12 md:mt-0 flex-1">
                        <h3 class="text-4xl font-bold text-red-700">Preparación</h3>
                        <ul class=" divide-y mt-8">
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">1</span>
                                <p>Con anterioridad mezclas la carne de res, cerdo y la haces en forma de hamburguesa y dejas conservando</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">2</span>
                                <p>En un sarten pones a fritar el huevo según tu gusto</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">3</span>
                                <p>En otro sarten pones a so fritar la panceta durante 8 minutos, retiramos y dejamos a parte</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">4</span>
                                <p>En este mismo sarten con la grasita de la panceta y dos cucharadas de mantequilla pones la cebolla y el tomate</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">5</span>
                                <p>Salpimientas y dejas so fritar por 5 minutos o hasta que veas que el tomate a soltado color apagas y dejas tapado</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">6</span>
                                <p>En un sarten adicional y con un poco de mantequilla pones a sofreír la hamburguesa por lado y lado</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">7</span>
                                <p>Cuando este soltando los jugos de la carne le pones una lonja de queso</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">8</span>
                                <p>Seguido le agregas la cebolla y el tomate que tenias en el sarten y una lonja de queso adicional</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">9</span>
                                <p>Tapas y dejas que el queso derrita</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">10</span>
                                <p>Mientras esta lista la carne pones en un plato pando</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">11</span>
                                <p>Las hojas de lechugas en forma de cama, le agregas una cucharada de crema agria</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">12</span>
                                <p>Encima la hamburguesa que tienes lista, le agregas el tocino, el huevo</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">13</span>
                                <p>Le agregas el aguacate, salpimientas y una vez mas le agregas crema agria</p>
                            </li>
                            <li class="flex pb-6 pt-4">
                                <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">13</span>
                                <p>Sirves de inmediato</p>
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
