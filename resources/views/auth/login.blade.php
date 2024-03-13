<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-custom-validation-errors />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="font-medium text-green-600">Excelente! vas por buen camino.</div>
            <div class="mb-4 font-medium text-sm text-green-600">
                <b>{{ session('error') }}</b>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toLowerCase()" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col items-center justify-end mt-4">
                <x-jet-button class="flex-1 w-full justify-center">
                    {{ __('Login') }}
                </x-jet-button>
                @if (Route::has('password.request'))

                    <div class="mt-8 text-center">
                        <h2 class=" font-bold text-xl">¿Tu contraseña no funciona, o tienes problemas para ingresar?</h2>
                        <p class="mt-4 text-sm">Si intentaste ingresar a tu contenido con el correo y contraseña y tienes algún error, solo debes hacer click en el siguiente botón y sigue los pasos para actualizar tu contraseña de acceso.</p>
                    </div>

                    <a class="border px-4 py-2 rounded-xl font-bold bg-gray-500 text-sm text-gray-50 hover:text-gray-900 my-4" href="{{ route('password.request') }}">
                        Actualiza aquí tu contraseña
                    </a>
                @endif
            </div>
            <div class="_block mt-4 text-center hidden">
                <hr>
                <a href="{{ route('register') }}" class=" mt-6 w-full mb-2 block items-center px-4 py-3 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">{{ __('Create a new account') }}</a>
            </div>
        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    </x-jet-authentication-card>
</x-guest-layout>
