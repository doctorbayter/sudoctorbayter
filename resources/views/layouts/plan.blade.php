<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600;700&display=swap" rel="stylesheet">       
        <style>
        body {
            font-family: 'Poppins' !important;
            }
        </style>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')


            <!-- Page Content -->
            <main>
            
                <div class="flex">
                    <x-menu :fases="$plan->fases" />
                    <div class="w-full bg-white">
                        {{$slot}}
                    </div>
                </div>

                <footer class=" bg-gray-50 border-t-4 border-red-700">
                    <div class="flex justify-around max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div>
                            <a href="/">
                                <img src="{{asset('img/logos/svg/logo-doctorbayter.png')}}" alt="Tu Doctor Bayter" class="w-52">
                            </a>
                            <p class="text-xs mt-2 max-w-md text-gray-600">Somo la comunidad Keto en español más grande, Únete y hagamos la <b>Dieta Keto Perfecta</b> juntos</p>
                        </div>
                        <ul class="text-right">
                            <li class="">
                                <a href="#" class="text-red-700 text-sm">Política de Privacidad</a>
                            </li>
                            <li class="">
                                <a href="#" class="text-red-700 text-sm">Política de Cookies</a>
                            </li>
                            <li class="">
                                <a href="#" class="text-red-700 text-sm">Terminos y Condiciones</a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
