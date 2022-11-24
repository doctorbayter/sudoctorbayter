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

{{--
    intl-tel-input CODE
<!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>
--}}
    </head>
    <body class="font-sans antialiased">

{{--
    intl-tel-input CODE
<div class="container">
<div class="col-md-8 mt-4">
<input type="text" id="phone" />
</div>
</div>
<script>
var input = document.querySelector("#phone");
intlTelInput(input, {
initialCountry: "auto",
preferredCountries:["us", "es", "mx", "co"],
geoIpLookup: function (success, failure) {
$.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
var countryCode = (resp && resp.country) ? resp.country : "us";
success(countryCode);
});
},
});
</script>
--}}
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

        <script type="text/javascript">
            (function(e,t,o,n,p,r,i){e.visitorGlobalObjectAlias=n;e[e.visitorGlobalObjectAlias]=e[e.visitorGlobalObjectAlias]||function(){(e[e.visitorGlobalObjectAlias].q=e[e.visitorGlobalObjectAlias].q||[]).push(arguments)};e[e.visitorGlobalObjectAlias].l=(new Date).getTime();r=t.createElement("script");r.src=o;r.async=true;i=t.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)})(window,document,"https://diffuser-cdn.app-us1.com/diffuser/diffuser.js","vgo");
            vgo('setAccount', '800184021');
            vgo('setTrackByDefault', true);

            vgo('process');
        </script>
    </body>
</html>
