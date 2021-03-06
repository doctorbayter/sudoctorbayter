<x-app-layout>
    <div class="max-w-6xl px-6 mx-auto md:px-8 grid grid-cols-1 md:grid-cols-9 md:gap-8 mt-8 md:min-h-screen">
        <div class="md:col-span-5">
            

            <section class="mt-4">
                <header class=" mb-2 md:mb-4 ">
                    <h3 class="text-2xl font-bold text-gray-800 mb-1"><span class="text-red-700">Paso 1:</span> Crea tus datos de acceso a la página</h3>
                    <p class="text-gray-600 font-medium lowercase text-xs italic">Los datos que escribas aquí serán los que vas a usar para ingresar a la página una vez realices la compra</p>
                </header>
                <form autocomplete="off">
                    
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                            Nombre Completo
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-name" type="text" placeholder="Escribe tu nombre">
                          <p class="text-red-500 text-xs italic">Por favor ecribe tu nombre.</p>
                        </div>
                    </div>


                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Correo electrónico
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-email" type="text" placeholder="Escribe tu correo">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-re-email">
                            Verifica tu correo
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-re-email" type="text" placeholder="Escribe tu correo otra vez">
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Crear Contraseña de ingreso
                            <p class="text-gray-600 font-medium lowercase text-xs italic">Esta será la contraseña con la que entrarás a la página</p>
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                          
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-re-password">
                            Verificar contraseña
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-re-password" type="password" placeholder="******************">
                          
                        </div>
                    </div>
                      
                </form>
            </section>


            <div 
                x-data="{$payMethod: 'payu', $route : '{{route('payment.payu', $plan)}}' }"    
                class="mt-4 md:mt-6">
                <h3 class="text-2xl font-bold mb-2 md:mb-8 text-gray-800"> <span class="text-red-700">Paso 2:</span> Elige tu medio de pago</h3>
                <ul class=" mb-4 flex w-full items-center justify-between sm:justify-start">

                    <li class="max-w-200 mr-4 ">
                        <div 
                            x-on:click="$payMethod = 'payu' ; $dispatch('route-change', { value: '{{route('payment.payu', $plan)}}' }) " 
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'payu' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            name="Paga con PayU">
                            <img class="h-10 object-cover" src="{{asset('/img/checkout/payu_logo.png')}}" alt="">
                        </div>
                    </li>

                    <li class="max-w-200 mr-4 ">
                        <div 
                            x-on:click="$payMethod = 'paypal' ; $dispatch('route-change', { value: '{{route('payment.paypal', $plan)}}' }) " 
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'paypal' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            name="Paga con PayPal">
                            <img class="h-6 object-cover" src="{{asset('/img/checkout/paypal_logo.png')}}" alt="">
                        </div>
                    </li>

                    <li class="max-w-200 mr-4 ">
                        <div 
                            x-on:click="$payMethod = 'epayco' ; $dispatch('route-change', { value: '{{route('payment.epayco', $plan)}}' }) " 
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'epayco' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            name="Paga con PayPal">
                            <img class="h-6 object-cover" src="{{asset('/img/checkout/epayco_logo.png')}}" alt="">
                        </div>
                    </li>
                   
                </ul>

                

                <div class=" mt-6 md:mt-8">

                    <h3 class="text-2xl font-bold mb-2 md:mb-8 text-gray-800"> <span class="text-red-700">Paso 3:</span> Pagar</h3>

                    <div class="flex items-center flex-wrap md:flex-no-wrap py-8 bg-gray-50 pl-4 rounded-xl mt-4">
                        <h2 class="text-gray-700 text-3xl font-bold w-full md:w-auto">Total a pagar:</h2>
                        <div class="md:ml-4">
                            @if ($plan->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($plan->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                <div class="ml-auto flex items-center">
                                    <p class="text-4xl md:text-2xl font-bold text-accent-400">{{$plan->finalPrice}} US$</p>
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
                            <div x-show="$payMethod == 'payu'" >
                                <form action="{{config('services.payu.base_uri')}}" method="post">
                                    @csrf

                                    <x-payu-form :plan="$plan"/>
                                                            
                                    <button type="submit"
                                    class=" bg-green-600 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-green-700  text-lg w-full">Comprar ahora con PayU</button> 

                                </form>
                            </div>
                            <div x-show="$payMethod == 'paypal'" >
                                
                                <form action="{{config('services.paypal.base_uri')}}" method="post">
                                    @csrf

                                    <x-paypal-form :plan="$plan"/>
                                    

                                    <button type="submit"
                                    class="bg-blue-700 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-blue-800  text-lg w-full">Comprar ahora con PayPal</button> 

                                </form>

                            </div>
                            <div x-show="$payMethod == 'epayco'"> 
                                <button x-on:click="handler.open(data)"
                                    type="button"
                                    class="bg-yellow-600 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-yellow-700  text-lg w-full">Comprar ahora con Epayco</button> 
                            </div>
                        @endcan

                        

                    <div class="mt-8 flex items-center cursor-default mb-8">
                        <div class="bg-gray-100 border border-gray-200 rounded-full p-3 mr-3">
                            <i class="fas fa-shield-alt text-3xl text-secundary-400"></i>
                        </div>
                        <p class="text-secundary-400 font-extrabold leading-4" >Pago 100% seguro<br/><span class="text-sm text-secundary-400 font-normal">protegemos tus datos.</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-4 my-6 md:my-0">
            <div class="bg-white md:shadow md:px-8 py-4">
                <article class="flex flex-wrap md:flex-no-wrap items-start text-gray-600">
                    <div class="ml-4 mt-4 md:mt-0">
                        <small>Estás comprado:</small>
                        <h2 class="text-2xl font-bold">{{$plan->name}}</h2>
                    </div>
                </article>
                <hr class="my-8">
                <div class="flex items-center hidden">
                    <img src="{{asset('/img/checkout/garantia.png')}}" alt="">
                    <p class="text-xs ml-4">Si tu experiencia con la compra no es lo que esperabas, te haremos un reembolso del 100% de tu pago. Por favor revisar nuestras <a href="#" class="text-accent-400 font-bold underline ">Políticas de Reembolso</a></p>
                </div>
                <p class="text-xs my-4">Los precios base que manejamos son en dólares americanos.</p>
                <p class="text-xs">(1) Acepto expresamente todos los Términos y Condiciones de Membresías. Del mismo, modo acepto las Políticas y Avisos de Protección y Tratamiento de Datos Personales de Doctor Bayter SAS</p>
            </div>
        </div>
    </div>
    
    @push('scripts')
    
        <script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>
        <script>
            let handler = ePayco.checkout.configure({
                key: '{{config('services.epayco.public_key')}}',
                test: false
            })
            let data={
            //Parametros compra (obligatorio)
            name: "{{$plan->name}}",
            description: "{{$plan->name}}",
            invoice: "{{Str::random(8)}}",
            currency: "{{config('services.epayco.currency')}}",
            amount: "{{$plan->finalPrice}}",
            tax_base: "0",
            tax: "0",
            country: "co",
            lang: "es",
            external: "false",
            //Atributos opcionales
            extra1: "", //Client id
            extra2: "{{$plan->id}}", // plan id
            confirmation: "{{route('payment.epayco.approved')}}",
            response: "{{route('payment.epayco.response', $plan)}}",
            //atributo deshabilitación metodo de pago
            methodsDisable: ["SP","CASH", "MPD", "DP"],
            }
            
        </script>
    @endpush

</x-app-layout>