<x-app-layout >
    <section class="bg-fixed bg-cover min-h-screen" >

        <div class="py-6 md:py-12 max-w-4xl mx-auto">
            <div class="">
                <header class="leading-tight text-center">
                    <h1 class="text-2xl md:text-5xl font-bold leading-none pt-2">{{$data['title']}}</h1>
                </header>

                <article class="my-8">
                    <h2 class="text-2xl md:text-6xl text-red-700 font-bold leading-none">Día {{$day}}</h2>
                    <div class="my-4 text-sm md:text-base">
                        {!!$day_data['text']!!}
                    </div>
                </article>

                <div class="flex flex-col md:flex-row justify-around my-8 px-6 py-8 border border-gray-300 rounded-2xl bg-gray-100">
                    @if ($day == 1)
                        <div>
                            <a href="https://doctorbayter.co/files/masterclass/reto-4/pdf/lista-de-alimentos-reto-4-doctor-bayter.pdf" target="_blank" class="inline-block mt-2 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Descarla aquí la lista de alimentos del Reto</a>
                        </div>
                    @endif
                    <div>
                        <a href="https://doctorbayter.co/files/masterclass/reto-4/pdf/menu-dia-{{$day}}-reto-4-doctor-bayter.pdf" target="_blank" class="inline-block mt-2 text-sm font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">Descarga aquí las recetas del día {{$day}}</a>
                    </div>
                </div>

                @if ($day ==4)
                    <div>
                        <p>👏 ¡Felicidades! Has terminado este hermoso Reto de 4 días <b>¿Quieres saber cual es el siguiente paso?</b></p>
                        <p>Es el momento de seguir por este camino que te llevará a cumplir tus objetivos sublimes. Y te invito a caminarlo de mi mano por 21 días porque necesito que esto, más que un reto, se convierta en tu nuevo estilo de vida.</p>
                        <p class="font-bold mt-4">¿Quieres saber cómo ingresar a los siguientes 21 días?</p>
                        <div class="text-center my-4">
                            <a href="https://doctorbayter.com/metodo-dkp/47" class="inline-block text-3xl mt-2 font-bold px-4 py-2 rounded-lg border bg-red-700 border-red-700 text-white uppercase transition-colors duration-300 ease-in-out  hover:bg-transparent hover:text-red-700">👉 Entra al siguiente link y descúbrelo.</a>
                        </div>
                    </div>
                @endif

                <section class="py-6 bg-gray-100">
                    <div class="w-full md:w-3/4 lg:w-3/4 text-center mx-auto md:mb-8">

                        <section class="text-center mb-24">
                            <header class="md:mb-8">
                                <h2 class="font-bold text-xl md:text-2xl text-gray-900 leading-tight">Comparte con nosotros</h2>
                                <p>Cuentanos cómo ha sido tu experiencia este día del reto.</p>
                            </header>
                            <div class="fb-comments" data-href="https://doctorbayter.com/masterclass/reto-4/dia-{{$day}}" data-width="" data-numposts="7"></div>
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

                <div class="my-8">
                    <p>También puedes ver directamente el contenido del PDF de las recetas del día {{$day}} a continuación:</p>
                    <small>(Si no puedes visualizar correctamente el contenido puedes descargar el contenido en los botones que encuentras arriba de este mensaje)</small>
                </div>

                <iframe src="https://docs.google.com/viewer?url=https://doctorbayter.co/files/masterclass/reto-4/pdf/menu-dia-{{$day}}-reto-4-doctor-bayter.pdf&embedded=true" style="width:100%; height:650px;" frameborder="0"></iframe>

                <div class="my-4 text-center">
                    <p class="text-sm md:text-base">Recuerda revisar tu bandeja de correo electrónico <b>no deseado o spam</b>, en ocasiones el envio de correos electrónicos puede llegar ahi.</p>
                </div>

            </div>
        </div>
    </section>


    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0" nonce="9GjBGApj"></script>
    @push('footerText')
        <div class="leading-none">
            <small class="italic text-gray-100 font-thin text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
        </div>
    @endpush
</x-app-layout>
