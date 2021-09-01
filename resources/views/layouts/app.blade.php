<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700;900&display=swap" rel="stylesheet">
        <style>
        body {
            font-family: 'Poppins' !important;
            }
        </style>
        @stack('style')
        @stack('scriptsHead')

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-8XKP69B28G"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-8XKP69B28G');
        </script>

        <!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1557165744425673');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1557165744425673&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
    </head>
    <body class="font-sans antialiased">



        <x-jet-banner />

        <div class="min-h-screen bg-white">
            @livewire('navigation-menu')


            <!-- Page Content -->
            <main>
                {{ $slot }}
                <footer class=" bg-gray-50 border-t-4 border-red-700">
                    <div class="flex md:flex-row flex-col justify-around max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div>
                            <a href="/">
                                <img src="{{asset('img/logos/svg/logo-doctorbayter.png')}}" alt="Tu Doctor Bayter" class="w-52">
                            </a>
                            <p class="text-xs mt-2 max-w-md text-gray-600">Somo la comunidad Keto en español más grande, Únete y hagamos la <b>Dieta Keto Perfecta</b> juntos</p>
                        </div>
                        <ul class="text-center md:text-right leading-none mt-4 md:mt-0 flex md:block items-center md:flex-col">
                            <li class="">
                                <a href="#" class="text-red-700 text-xs md:text-sm">Política de Privacidad</a>
                            </li>
                            <li class="">
                                <a href="#" class="text-red-700 text-xs md:text-sm">Política de Cookies</a>
                            </li>
                            <li class="">
                                <a href="#" class="text-red-700 text-xs md:text-sm">Terminos y Condiciones</a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </main>
        </div>

        @livewireScripts

        @stack('modals')
        @stack('scripts')


    </body>
</html>
