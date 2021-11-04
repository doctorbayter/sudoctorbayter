<div  x-data="{$payMethod: 'stripe', $route : '{{route('payment.payu', $plan)}}' }">
    <div class="max-w-6xl px-6 mx-auto md:px-8 grid grid-cols-1 md:grid-cols-9 md:gap-8 mt-8 md:min-h-screen">
        <div class="md:col-span-5" >

            @if (auth()->user())

            @else
            <section class="mt-4">

                <header class=" mb-2 md:mb-4 ">
                    <h3 class="text-2xl font-bold text-gray-800 mb-1"><span class="text-red-700">Paso 1:</span> Crea tus datos de acceso a la página</h3>
                    <p class="text-gray-600 font-medium lowercase text-xs italic">Los datos que escribas aquí serán los que vas a usar para ingresar a la página una vez realices la compra</p>
                </header>

                    <form>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                            Nombre Completo
                          </label>
                          <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-name" type="text" placeholder="Escribe tu nombre"
                          @error('name') autofocus="autofocus" @enderror>
                          @error('name')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Correo electrónico
                          </label>
                          <input wire:model="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-email" type="text" placeholder="Escribe tu correo"
                          @error('email') autofocus="autofocus" @enderror>
                          @error('email')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-re-email">
                            Verifica tu correo
                          </label>
                          <input wire:model="email_confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-re-email" type="text" placeholder="Escribe tu correo otra vez"
                          @error('email_confirmation') autofocus="autofocus" @enderror>
                          @error('email_confirmation')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Crear Contraseña de ingreso
                            <p class="text-gray-600 font-medium lowercase text-xs italic">Esta será la contraseña con la que entrarás a la página</p>
                          </label>
                          <input wire:model="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************"
                          @error('password') autofocus="autofocus" @enderror>
                          @error('password')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-re-password">
                            Verificar contraseña
                          </label>
                          <input wire:model="password_confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-re-password" type="password" placeholder="******************"
                          @error('password_confirmation') autofocus="autofocus" @enderror>
                          @error('password_confirmation')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                </form>
            </section>
            @endif

            <div class="mt-4 md:mt-6">
                <h3 class="text-2xl font-bold mb-2 md:mb-4 text-gray-800"> <span class="text-red-700">Paso 2:</span> Elige tu medio de pago</h3>

                <style>
.active-animation {
    background-image: linear-gradient(90deg, red 50%, transparent 50%), linear-gradient(90deg, red 50%, transparent 50%), linear-gradient(0deg, red 50%, transparent 50%), linear-gradient(0deg, red 50%, transparent 50%);
    background-repeat: repeat-x, repeat-x, repeat-y, repeat-y;
    background-size: 15px 2px, 15px 2px, 2px 15px, 2px 15px;
    background-position: left top, right bottom, left bottom, right   top;
    animation: border-dance 1s infinite linear;
  }
  @keyframes border-dance {
    0% {
      background-position: left top, right bottom, left bottom, right   top;
    }
    100% {
      background-position: left 15px top, right 15px bottom , left bottom 15px , right   top 15px;
    }
  }
}
                </style>
                <div class="px-4 py-4 lg:max-w-5xl mx-auto mb-6  active-animation">
                    <h3 class="font-bold mb-2">Información importante</h3>
                    <p class="text-sm mb-2"><i class="fas fa-info-circle mr-1 text-red-700"></i> Si deseas pagar con <b>tarjeta de crédito o débito</b> selecciona el método de pago <b class=" text-purple-600">Stripe</b> o <b class=" text-green-500">PayU</b></p>
                    <p class="text-sm mb-2"><i class="fas fa-info-circle mr-1 text-red-700"></i> Si deseas pagar con <b>PSE</b> y <b>otros métodos de pago</b> selecciona el método de pago <b class=" text-green-500">PayU</b></p>
                </div>

                <ul class=" mb-4 flex flex-col lg:flex-row w-full items-center justify-between sm:justify-start flex-wrap">

                    <li class="max-w-200 lg:mr-4 ">
                        <div
                            x-on:click="$payMethod = 'stripe' ; $dispatch('route-change', { value: '{{route('payment.payu', $plan)}}' }) "
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'stripe' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            name="Paga con Stripe">
                            <img class="h-10 object-cover" src="{{asset('/img/checkout/stripe_logo.png')}}" alt="">
                        </div>
                    </li>

                    <li class="max-w-200 lg:mr-4 mt-6 lg:mt-0 ld:mt-0">
                        <div
                            x-on:click="$payMethod = 'paypal' ; $dispatch('route-change', { value: '{{route('payment.paypal', $plan)}}' }) "
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'paypal' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            name="Paga con PayPal">
                            <img class="h-6 object-cover" src="{{asset('/img/checkout/paypal_logo.png')}}" alt="">
                        </div>
                    </li>

                    <li class="max-w-200 lg:mr-4 ">
                        <div
                            x-on:click="$payMethod = 'payu' ; $dispatch('route-change', { value: '{{route('payment.payu', $plan)}}' }) "
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'payu' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            name="Paga con PayU">
                            <img class="h-10 object-cover" src="{{asset('/img/checkout/payu_logo.png')}}" alt="">
                        </div>
                    </li>



                </ul>


                <div class=" mt-6 md:mt-8">

                    <h3 class="text-2xl font-bold mb-2 md:mb-8 text-gray-800"> <span class="text-red-700">Paso 3:</span> Pagar</h3>


                    <div class="flex items-center flex-wrap md:flex-no-wrap py-8 bg-gray-50 pl-4 rounded-xl mt-4">
                        <h2 class="text-gray-700 text-3xl font-bold w-full md:w-auto">Total a pagar:</h2>
                        <div class="md:ml-4">
                            {{-- @if ($plan->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($plan->discount->expires_at))->gt(\Carbon\Carbon::now()))--}}
                            @if ($flash_sale)
                                <div class="ml-auto flex items-center">
                                    <p class="text-4xl md:text-2xl font-bold text-accent-400">{{round($flash_sale)}} US$</p>
                                    <span class=" text-base ml-2 line-through text-gray-500">{{$plan->price->name}}</span>
                                </div>
                            @else
                                <p class="text-4xl md:text-2xl font-bold text-accent-400">{{$plan->price->name}}</p>
                            @endif
                        </div>
                    </div>

                        @can('enrolled', $suscription)
                            <div class="flex flex-col justify-start w-full mt-2">
                                <h3 class="text-lg font-bold text-gray-600"> <i class="fas fa-info-circle mr-1 text-blue-400"></i>Ya estás inscrito a este plan</h3>
                            </div>
                            <a
                            class="disabled w-full mt-2 cursor-default bg-gray-300 rounded-lg font-bold text-white text-center inline-block px-8 py-4 text-lg ">No puedes comprar este plan</a>
                        @else
                            <div class="my-6">
                                <label class="inline-flex items-center text-sm">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-secundary-400 " checked disabled><span class="ml-2 text-gray-700">Al completar la compra, aceptas estos <a href="#" class="text-secundary-400 font-bold underline"> Términos y condiciones</a></span>
                                </label>
                            </div>




                            @if ($can_continued)
                            <div>

                                <div x-show="$payMethod == 'stripe'" >
                                    <div class="relative">

                                        <div wire:loading.flex class="absolute w-full h-full bg-white bg-opacity-75 z-30 items-center hidden"></div>

                                        <form id="card-form">
                                        <div class="flex flex-wrap -mx-3 mb-3">
                                            <div class="w-full  px-3">
                                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="card-holder-name">
                                                Nombre en la tarjeta
                                              </label>
                                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="card-holder-name" type="text" placeholder="Escribe el nombre que aparece en la tarjeta" required>
                                            </div>
                                        </div>

                                        <div class="flex flex-wrap -mx-3 mb-3">
                                            <div class="w-full  px-3">
                                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="card-element">
                                                Datos de la tarjeta
                                              </label>
                                              <!-- Stripe Elements Placeholder -->
                                              <div id="card-element" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"></div>
                                              <span id="card-error" class="text-red-500 text-xs italic font-bold"></span>
                                            </div>
                                        </div>
                                        <button id="card-button" type="submit"
                                            class=" bg-purple-600 outline-none rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-purple-800  text-lg w-full">Procesar pago con Stripe</button>
                                        </form>

                                        <script>stripe();</script>

                                    </div>

                                </div>

                                <div x-show="$payMethod == 'paypal'" >

                                    <form action="{{config('services.paypal.base_uri')}}" method="post">
                                        @csrf
                                        <x-paypal-form :plan="$plan" :dataSend="$data_send" :flashSale="$flash_sale"/>
                                        <button type="submit"
                                        class="bg-blue-700 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-blue-800  text-lg w-full">Ya puedes continuar tu compra con PayPal</button>
                                    </form>

                                </div>

                                <div x-show="$payMethod == 'payu'" >
                                    <form action="{{config('services.payu.base_uri')}}" method="post">
                                        @csrf
                                        <x-payu-form :plan="$plan" :dataSend="$data_send" :flashSale="$flash_sale"/>
                                        <button type="submit"
                                        class=" bg-green-600 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-green-700  text-lg w-full">Ya puedes continuar tu compra con PayU</button>

                                    </form>
                                </div>
                            </div>
                            @else
                                <button
                                wire:click="confirmData"
                                class=" bg-red-500 rounded-lg font-bold text-white cursor-pointer text-center inline-block px-8 py-4 text-base lg:text-lg w-full">{{$error_button}}</button>
                                @if($errors->all())
                                    <span class="text-red-500 text-sm mt-2 inline-block font-semibold ">{{$error_message}}</span>
                                @endif
                            @endif
                        @endcan

                    <div class="mt-8 flex items-center cursor-default mb-8">
                        <div class="bg-gray-100 border border-gray-200 rounded-full p-3 mr-3">
                            <i class="fas fa-shield-alt text-3xl text-secundary-400"></i>
                        </div>
                        <p class="text-secundary-400 font-extrabold leading-4" >Tu pago es 100% seguro<br/><span class="text-sm text-secundary-400 font-normal">protegemos tus datos.</span></p>
                    </div>

                    <div class="my-12 cursor-default  text-center w-full">
                        <p class="text-secundary-400 text-2xl lg:text-3xl  font-bold text-center">Si tuviste problemas con tu compra o tu tarjeta escríbenos</p>
                        <div class="my-4">
                            <a href="https://wa.me/573147281252" target="_blank" class=" inline-flex px-6 py-4 rounded-full text-white font-bold bg-green-600 text-xl lg:text-4xl">
                                <i class="fab fa-whatsapp mr-4"></i>
                                <p class="">+57 314 728 1252</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="md:col-span-4 my-6 md:my-0">
            <div class="bg-white shadow px-4 md:px-8 py-4">
                <article class="flex flex-wrap md:flex-no-wrap items-start text-gray-600">
                    <div class="mt-2 md:mt-0">
                        <small>Estás comprado:</small>
                        <h2 class="text-2xl font-bold">{{$plan->name}}</h2>
                    </div>
                </article>
                <hr class="my-8">
                <div class="flex_ items-center hidden">
                    <img src="{{asset('/img/checkout/garantia.png')}}" alt="">
                    <p class="text-xs ml-4">Si tu experiencia con la compra no es lo que esperabas, te haremos un reembolso del 100% de tu pago. Por favor revisar nuestras <a href="#" class="text-accent-400 font-bold underline ">Políticas de Reembolso</a></p>
                </div>
                <p class="text-xs my-4">Los precios base que manejamos son en dólares americanos.</p>
                <p class="text-xs">(1) Acepto expresamente todos los Términos y Condiciones de Membresías. Del mismo, modo acepto las Políticas y Avisos de Protección y Tratamiento de Datos Personales de Doctor Bayter SAS</p>
            </div>
        </div>
    </div>

    @push('scriptsHead')

    <script src="https://js.stripe.com/v3/"></script>




    @endpush

    @push('scripts')


    <script>
        document.addEventListener('livewire:load', function(){
            stripe();
        })

        Livewire.on('resetStripe', function(){
            document.getElementById('card-form').reset();
            stripe();
        })

        Livewire.on('errorStripePayment', function(){
            document.getElementById('card-form').reset();
            stripe();
            let error = 'Hubo un error al procesar el pago. intentelo de nuevo';
            alert(error);
            document.getElementById('card-error').textContent = error
        })


    </script>

    <script>
        function stripe(){
            const stripe = Stripe("{{env('STRIPE_KEY')}}");
            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            //Método de pago
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const cardForm = document.getElementById('card-form');

            cardForm.addEventListener('submit', async (e) => {

                e.preventDefault();

                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', cardElement, {
                        billing_details: { name: cardHolderName.value }
                    }
                );

                if (error) {
                    document.getElementById('card-error').textContent = error.message
                } else {
                    // The card has been verified successfully...
                    Livewire.emit('paymentMethodCreate', paymentMethod.id)
                }
            });
        }
    </script>

    @endpush

</div>
