<x-app-layout >
    <section class="bg-fixed bg-cover min-h-screen" >

        <div class="py-6 md:py-12 max-w-4xl mx-auto">
            <div class="">
                <header class="leading-tight text-center">
                    <p class="text-sm md:text-xl inline bg-red-700 px-1 md:px-4 text-gray-50">Muchas gracias por inscribirte al </p>
                    <h1 class="text-4xl md:text-7xl font-bold leading-none pt-2">Curso Dieta Keto Gratis</h1>
                    <h2 class="text-base md:text-2xl">de tu Doctor Bayter</h2>
                </header>
                <p class="my-4 text-center text-sm md:text-base">En los próximos minutos llegará al correo electrónico que registraste anteriormente toda la información para que puedas acceder al contenido.</p>
                    <div>


                        <iframe src="https://player.vimeo.com/video/647855846?h=71cb13f4a3&autoplay=1&amp;loop=0&amp;autopause=0" width="" height="550" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" class="w-full -my-16 md:my-0"></iframe>
                    </div>

                    <div class="my-4 text-center">
                        <p class="text-sm md:text-base">Si quieres acceder ya al <b>curso</b> puedes hacerlo dando click en el siguiente botón: </p>
                        <div class="my-2 px-1"><a href="{{route('cursos.keto.go')}}" class="bg-red-700 rounded-lg font-bold text-white text-center inline-block md:px-8 py-4 transition duration-300 ease-in-out hover:bg-red-500  text-lg w-full" >¡Si quiero iniciar el curso ya!</a></div>
                        <div class="leading-none">
                            <small class="text-xs">* Recuerda que este XX estará disponible por poco tiempo</small>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    @push('footerText')
        <div class="leading-none">
            <small class="italic text-gray-100 font-thin text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
        </div>
    @endpush
</x-app-layout>
