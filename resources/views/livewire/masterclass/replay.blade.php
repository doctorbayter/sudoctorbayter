<x-app-layout>
    @if ($data['online'])
    <section class="bg-fixed bg-cover min-h-screen" style="background-image: url({{asset('img/backgrounds/ea857aff-1a05-4f66.jpg')}})">
        <div class="w-full md:w-3/4 lg:w-3/4 text-center mx-auto py-12 ">
            <div class="w-full md:w-3/4 lg:w-3/4 text-center mx-auto">
                <p class="text-red-700 text-sm md:text-xl">TALLER ONLINE</p>
                <h1 class="text-gray-900 leading-none font-black text-2xl md:text-5xl">Dieta <span class="text-red-700">Keto</span> Perfecta</h1>
                <p class="text-gray-900 my-2 md:text-xl">
                    Método DKP de tu Doctor Bayter
                </p>
                <div class="mx-auto max-w-sm border-dotted border-b-4 my-4 border-accent-400"></div>
                <p class="text-sm md:text-base">
                    <i class="fas fa-arrow-alt-circle-down"></i> Para comenzar haz click en el botón del video.
                </p>
                <div class="my-8 mx-auto">
                    <iframe src="https://player.vimeo.com/video/589943074?h=074f9f6d80?autoplay=1&loop=0&autopause=1" class=" w-full h-52 md:h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </section>
    <section class="pb-12 pt-16 bg-gray-100">
        <div class="w-full md:w-3/4 lg:w-3/4 text-center mx-auto md:mb-8">

            <section class="text-center mb-24">
                <header class="md:mb-8">
                    <h2 class="font-bold text-xl md:text-2xl text-gray-900 leading-tight">¿Ya iniciaste la Dieta Keto?</h2>
                    <p>Cuentanos cómo ha sido tu experiencia.</p>
                </header>
                <div class="fb-comments" data-href="https://dietaketoperfecta.com/masterclass/dkp/replay" data-width="" data-numposts="7"></div>
            </section>

            <div class="flex__ hidden flex-col-reverse md:flex-row items-center max-w-3xl mx-auto shadow-2xl p-8 rounded-lg bg-gray-50 ">
                <div class="flex-1 pr-6 mt-4 md:mt-0 text-center md:text-left">
                    <p class="text-xl  md:text-2xl leading-tight mb-4">Ya está disponible el curso de <strong> </strong></p>
                    <a href="" target="_blank" class="bg-accent-400 py-2 px-4 text-lg md:text-xl font-bold rounded-full text-white inline-block border-2 border-accent-400 hover:bg-gray-50 hover:text-accent-400">¡Sí, quiero el curso!</a>
                </div>
                <div class="w-full md:w-48">
                    <img src="" class="w-full"/>
                </div>
            </div>
        </div>
    </section>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0" nonce="9GjBGApj"></script>
    @endif
</x-app-layout>
