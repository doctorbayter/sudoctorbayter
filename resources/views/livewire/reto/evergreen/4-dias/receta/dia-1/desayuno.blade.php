<x-app-layout>
        <div class="flex">
            <div class="bg-white  mx-auto w-full">
                <header class="shadow-lg relative">
                    <div class="w-10/12 mx-auto py-10 relative z-10 max-w-7xl">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Receta de</h3>
                    <h2 class=" font-bold text-3xl md:text-6xl">Tradicional</h2>
                    <div class="flex text-xs items-center">
                        <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">0g Carbs.</p>
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
                <div class="absolute w-full h-full bg-fixed bg-center top-0 left-0 opacity-40" style="background-image: url({{asset('img/recipes/reto4-menu-dia-1-1.jpg')}})"></div>
            </header>
            <aside class="w-11/12 mx-auto mt-10 max-w-7xl">
                <a href="{{ url()->previous() }}" class="text-red-700 font-bold text-lg px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg"> <i class="fas fa-chevron-left mr-2"></i> Volver al menú</a>
            </aside>
            <div class="w-11/12 mx-auto my-10 max-w-7xl">
                <section class="mt-16">
                    <div class="flex flex-col xl:flex-row">
                        <div class=" w-full xl:w-4/12">
                            <figure class="rounded-t-xl overflow-hidden">
                                <img src="{{asset('img/recipes/reto4-menu-dia-1-1.jpg')}}" alt="" class=" w-full object-cover">
                            </figure>
                            <div class=" bg-gray-200 rounded-b-xl px-4 py-8">
                                <h3 class="text-3xl md:text-4xl text-gray-900 font-bold">Ingredientes</h3>
                                <ul class="mt-6 text-sm text-gray-600">
                                    <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>2 huevos fritos</li>
                                    <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>75 gramos de tocino o panceta o beicon</li>
                                    <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>35 gramos de queso manchego o cualquier queso que tengas, pero 100% graso </li>
                                    <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Café o té o aromática de hiervas naturales</li>
                                    <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Mantequilla de vaca 100% de pastoreo o Manteca de cerdo o aceite de coco</li>
                                    <li class="mb-6 leading-snug relative pl-6"> <i class="fas fa-check text-red-700 absolute left-0"></i>Salpimienta</li>
                                </ul>
                            </div>
                        </div>
                        <div class="xl:ml-16 mt-12 md:mt-0 flex-1">
                            <h3 class="text-4xl font-bold text-red-700">Preparación</h3>
                            <ul class=" divide-y mt-8">
                                <li class="flex pb-6 pt-4">
                                    <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">1</span>
                                    <p>En un sartén pones el tocino a so fritar</p>
                                </li>
                                <li class="flex pb-6 pt-4">
                                    <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">2</span>
                                    <p>Dejas en el sartén hasta que este crocante y retiras</p>
                                </li>
                                <li class="flex pb-6 pt-4">
                                    <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">3</span>
                                    <p>En este mismo sartén con el aceite que queda del tocino mas 1 cucharada de mantequilla si es necesario</p>
                                </li>
                                <li class="flex pb-6 pt-4">
                                    <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">4</span>
                                    <p>Pones a fritar los huevos sal pimentas y dejas por 5 minutos</p>
                                </li>
                                <li class="flex pb-6 pt-4">
                                    <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">5</span>
                                    <p>Hasta qué cuajen según tu gusto </p>
                                </li>
                                <li class="flex pb-6 pt-4">
                                    <span class="bg-red-700 text-white font-bold w-8 h-8 px-3 md:px-0 leading-8 text-center rounded-full mr-4 text-sm">6</span>
                                    <p>Servir de inmediato, con la porción de queso Café o té</p>
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
