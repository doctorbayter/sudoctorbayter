<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title') {{ config('app.name') }}</title>
        <link rel="icon" href="{{ asset('img/icons/iso-doctorbayter.png') }}" type="image/png">
        @stack('metaLinks')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700;900&display=swap" rel="stylesheet">
        <style>body {font-family: 'Poppins' !important;}</style>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-58QC4WL');</script>
        <!-- End Google Tag Manager -->
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
        <!-- Hotjar Tracking Code for https://doctorbayter.com -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:3889184,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
        <!-- End Hotjar Tracking Code for https://doctorbayter.com -->
        <!-- Styles -->
        @stack('style')
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        @livewireStyles
        <!-- Scripts -->
        @stack('scriptsHead')
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <!-- Google Tag Manager (noscript) --><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58QC4WL" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager (noscript) -->
        @stack('TopOfThePage')
        <x-jet-banner />
        <div class="min-h-screen bg-white">
            @livewire('navigation-menu')
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
                                <a href="{{route('terminos')}}" class="text-red-700 text-sm">Política de Privacidad</a>
                            </li>
                            <li class="hidden">
                                <a href="{{route('terminos')}}" class="text-red-700 text-sm">Política de Cookies</a>
                            </li>
                            <li class="">
                                <a href="{{route('terminos')}}" class="text-red-700 text-sm">Terminos y Condiciones</a>
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
