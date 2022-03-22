<x-app-layout>
    <section>
        <div class="max-w-2xl  mx-auto px-6 lg:px-8 flex relative overflow-hidden py-16 md:py-16 text-center">

                <div class="bg-gray-900 text-gray-50 w-full py-8 px-8 rounded-xl shadow-sm">

                    <img  src="{{asset('img/logos/revolucion_transparent.png')}}" alt="Revolucion Logo">

                    <hr class="my-4">

                    @if ($plan)
                        <div>

                            <div class="mb-4 leading-none">
                                <p class="font-semibold ">Comprobante de Ingreso</p>
                                <small>Evento Revolución - Tu Salud A Otro Nivel Julio 16 2022</small>
                            </div>
                            <h2 class="text-4xl font-bold  py-4 rounded-xl bg-red-700 mb-6">{{$plan->plan->name}}</h2>
                            <div class="grid grid-cols-2 gap-4 text-left mb-2">
                                <p class="font-bold">Nombre participante:</p>
                                <p>{{$plan->user->name}}</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-left mb-2">
                                <p class="font-bold">Correo electrónico:</p>
                                <p>{{$plan->user->email}}</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-left mb-2">
                                <p class="font-bold">Fecha de compra:</p>
                                <p>{{$plan->created_at}}</p>
                            </div>

                        </div>

                        <div class="text-center my-8">
                            <img class="mx-auto" src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=www.doctorbayter.com/revolucion/qr/{{base64_encode($plan->user->email)}}" alt="" >
                        </div>

                        <footer class="leading-none opacity-70 italic">
                            <small class="text-xs"> Este código fue generado única y exclusivamente para el participante {{$plan->user->name}}. Válido para un solo ingreso, guerdelo muy bien y no lo comparta con nadie. Recuerde presentar este código QR y su carnet con el esquema completo de vacunación el día del evento.</small>
                        </footer>
                    @else
                        <div class="mb-4 leading-none">
                            <p class="font-semibold ">Lo sentimos...</p>
                            <small>No es posible validar su información</small>
                        </div>
                        <h2 class="text-4xl font-bold  py-4 rounded-xl bg-red-700 mb-6">No se ha podido generar el código de acceso.</h2>
                        <hr class="my-4">
                        <footer class="leading-none underline italic mt-8 hover:text-red-700">
                            <a href="{{route('event')}}">Adquiere tu entrada aquí</a>
                        </footer>
                    @endif
                </div>
        </div>
    </section>
</x-app-layout>
