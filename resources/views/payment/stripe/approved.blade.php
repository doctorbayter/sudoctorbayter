<x-app-layout :plan="$plan">
    <div class="max-w-7xl mx-auto px-8 mt-8 lg:mt-16 relative" style="height : calc(100vh - 16.1rem);">
      <div class="absolute left-6/12 top-6/12 transform -translate-x-6/12 -translate-y-6/12 w-full">
          <div class="mx-auto max-w-4xl shadow-lg rounded-md overflow-hidden flex">
            <div class="bg-green-500 px-12 text-white max-w-sm flex-col flex justify-center items-center">
              <div>
                <div class="text-white">
                  <svg class="w-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <p class="text-xl mt-2 mb-4">Hola {{$request->name}},</p>
                <h3 class="text-4xl leading-10 font-extrabold">Muchas gracias por tu compra.</h3>
                <p class="mt-4">Enviaremos a tu correo electrónico <b>{{$request->email}}</b> los detalles de compra en los próximos minutos.</p>

              </div>
            </div>
            <div class="bg-gray-50 p-12 text-gray-700 w-full flex-col flex justify-center items-center">
                <div>
                  <div class="flex mb-8">

                    <div class="">
                      <p>Has comprado en plan</p>
                      <p class="text-base font-bold">{{$plan->name}} </p>
                    </div>
                  </div>
                  <hr class="my-8">
                  <div class="mb-4 text-gray-500">
                    <p class="mb-4 text-sm text-gray-500 font-bold">Detalles de tu compra:</p>
                    <p class="text-xl mt-2"><b class="text-base text-gray-700">Pago final:</b> <br> {{$plan->finalPrice}} $US</p>
                  </div>

                  <hr class="my-8">
                  <div>
                    @can('enrolled', $plan)
                      <a class="block text-center w-full bg-green-500 hover:bg-green-600 text-white font-bold p-4 rounded" href="{{route('plan.index', $plan )}}">
                        Entra aquí para iniciar
                      </a>
                    @else
                      <p><b>Tu pago se ha procesado correctamente</b>, en las próximas horas tendrás acceso al contenido. Ingresa la página de <a href="{{route('plan.index')}}" class="font-bold underline">tu plan</a> con tu correo y contraseña.</p>
                    @endcan
                  </div>
                </div>
            </div>
          </div>
          <div
          x-data="{$open : true}"
          x-show="$open" class="flex items-center justify-center">
          <div class="mt-8 bottom-4 inline-flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md py-5 pl-6 pr-8 sm:pr-6">
            <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
              <div class="text-green-500">
                <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              </div>
              <div class="text-green-500 text-sm font-medium ml-3">Pago con éxito.</div>
            </div>
            <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">Su pago se ha procesado exitosamente.</div>
            <div x-on:click="$open = !$open" class="ml-4 absolute sm:relative sm:top-auto sm:right-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </div>
          </div>
        </div>

        </div>

    </div>
  <x-slot name="js"></x-slot>
</x-app-layout>
