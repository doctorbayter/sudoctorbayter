<x-app-layout>
<div class="bg-gradient-to-b min-h-screen from-gray-700 to-gray-900">

    <section class="grid grid-cols-6">
        <div class="col-span-6 order-first md:col-span-2">
            <img class="md:hidden" src="{{asset('img/billboards/total_fitness.jpg')}}" alt="">
            <img class="hidden md:inline-block sticky top-0 " src="{{asset('img/billboards/total_fitness_lg.jpg')}}" alt="">
        </div>
        <div class="col-span-6 md:col-span-4">
            <div class="px-6 md:px-12 py-8 md:py-16">
                <header class="text-center md:text-left mb-8 md:mb-10">
                    <h2 class="title font-bold text-xl md:text-5xl">Crear nuevo cliente</h2>
                    <a href="{{route('plan.fitness.reseller')}}" class="text-xs md:text-base text-blue-100 hover:underline font-bold">🡸 Volver a listado de clientes</a>
                </header>
                <div class=" mx-auto mt-4 rounded-sm shadow ">
                    <div class="bg-white rounded-xl">
                        <div class="py-6 px-4">
                            {!! Form::open(['route' => 'plan.fitness.store', 'files' => true]) !!}
                            {!! Form::hidden('user_id', Auth::user()->id) !!}

                            <div class="mb-4">
                                {!! Form::label('name', 'Nombre del cliente') !!}
                                {!! Form::text('name', null, ['autocomplete' => 'off', 'placeholder' => 'Escriba un nombre', 'class' => 'border-gray-400 rounded-xl block w-full mt-1 ' . ($errors->has('name') ? 'border-red-600' : '') ]) !!}
                                @error('name')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>
                            <div class="mb-4">
                                {!! Form::label('email', 'Correo electrónico') !!}
                                {!! Form::text('email', null, ['autocomplete' => 'off', 'placeholder' => 'Escriba un correo electrónico', 'class' => 'border-gray-400 rounded-xl block w-full mt-1 ' . ($errors->has('email') ? 'border-red-600' : '')]) !!}
                                @error('email')
                                    <strong class="text-xs text-red-600">{{$message}}</strong>
                                @enderror
                            </div>




                            <div class="flex justify-start">
                                {!! Form::submit('Crear cliente', ['class' => 'cursor-pointer inline-block leading-6 text-center transition rounded-full font-bold shadow ripple hover:shadow-lg focus:outline-none bg-yellow-500 text-gray-50  py-2 px-4 rounded-full font-bold hover:bg-gray-900 hover:text-yellow-500']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@push('style')
    <style>
        .title{
            color: #d29c46 !important;
        }
    </style>
@endpush
</div>
</x-app-layout>
