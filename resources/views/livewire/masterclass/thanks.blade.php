<x-app-layout >
    <section class="bg-fixed bg-cover min-h-screen" >

        <div class="py-6 md:py-12 max-w-4xl mx-auto">
            <div class="">
                <header class="leading-tight text-center">
                    <p class="text-sm md:text-xl inline bg-red-700 px-1 md:px-4 text-gray-50">Muchas gracias por inscribirte al  {{$data['type']}}</p>
                    <h1 class="text-4xl md:text-7xl font-bold leading-none pt-2">{{$data['title']}}</h1>
                    <h2 class="text-base md:text-2xl">{{$data['subtitle']}}</h2>
                </header>
                <p class="my-4 text-center text-sm md:text-base">En los próximos minutos llegará al correo electrónico que registraste anteriormente toda la información para que puedas acceder al contenido de este <b>{{$data['type']}}</b> </p>
                @if ($data['video'])
                    <div>
                        <iframe src="https://player.vimeo.com/video/{{$data['video']}}?autoplay=1&amp;loop=0&amp;autopause=0" width="" height="550" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" class="w-full -my-16 md:my-0"></iframe>
                    </div>
                @else
                    <figure>
                        <img src="{{asset('img/billboards/banner_masterclass_thanks.jpg')}}" alt="">
                    </figure>
                @endif
                @if ($data['online'])
                    <div class="my-4 text-center">
                        <p class="text-sm md:text-base">Si quieres acceder ya al {{$data['type']}} <b>{{$data['title']}} {{$data['subtitle']}}</b> puedes hacerlo dando click en el siguiente botón: </p>
                        <div class="my-2 px-1"><a href="{{route('masterclass.replay', ['masterclass'=>$masterclass])}}" class="bg-red-700 rounded-lg font-bold text-white text-center inline-block md:px-8 py-4 transition duration-300 ease-in-out hover:bg-red-500  text-lg w-full" >¡Si quiero ver el {{$data['type']}} ya!</a></div>
                        <div class="leading-none">
                            <small class="text-xs">* Recuerda que este {{$data['type']}} estará disponible por poco tiempo</small>
                        </div>
                    </div>
                @else
                    <div class="my-4 text-center">
                        <p class="text-sm md:text-base">Recuerda revisar tu bandeja de correo electrónico <b>no deseado o spam</b>, en ocasiones el envio de correos electrónicos puede tardar hasta 10 minutos.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @push('footerText')
        <div class="leading-none">
            <small class="italic text-gray-100 font-thin text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
        </div>
    @endpush
    <script>
        fbq('track', 'Lead');
   </script>
</x-app-layout>
