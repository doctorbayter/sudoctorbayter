<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            <b>¿Olvidaste tu contraseña o no sabes cual es?</b> No te preocupes. Escribe aquí abajo el correo electrónico con el que hiciste tu compra y le enviaremos a ese correo un link para que puedas restablecer o crear tu nueva contraseña para que puedas acceder inmediatamente al contenido.
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
                <p class="text-red-500 mt-4">
                    <b>IMPORTANTE:</b> En ocasiones el mensaje puede tarde hasta <b>10 minutos</b> en llegar a tu correo. si no recibes el mensaje recuerda revisar tu <b>correo no deseado</b> o <b>Spam</b>
                </p>
            </div>
        @endif

        <x-custom-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toLowerCase()" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
