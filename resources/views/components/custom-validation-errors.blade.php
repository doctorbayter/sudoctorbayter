<!-- resources/views/components/custom-validation-errors.blade.php -->

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'tu-clase-personalizada-de-alerta']) }}>
        <div class="text-red-600 font-bold">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @if ($errors->email == true)
           <div class="mt-4">
                <small> Si crees que es un error por favor contacta a nuestro 👉 <a href="http://wa.me/573012579627" class=" font-bold underline hover:text-gray-900" target="_blank" rel="noopener noreferrer nofollow">equipo de soporte técnico vía WhatsApp</a> </small>
           </div>
        @endif
    </div>
@endif