<div>
    <div class="max-w-6xl px-6 mx-auto">
        <header class="text-center py-8">
            <h1 class="text-gray-900 leading-none font-black text-4xl md:text-5xl">Curso Dieta <span class="text-red-700">Keto</span> Gratis</h1>
            <p class="text-gray-900 mt-4 md:mt-4 mb-4 md:text-4xl">Para principiantes</p>
        </header>

        <section class="my-8">
            <h2 class="text-gray-900 leading-none font-black text-2xl md:text-3xl text-center">PASO 1:</h2>
            <p class="text-gray-900 mt-2 mb-4 md:text-2xl text-center">Suscríbete a este canal para recibir contenido de la Dieta Keto.</p>
            <div class="text-center">
                <script src="https://apis.google.com/js/platform.js"></script>
                <div class="g-ytsubscribe" data-channelid="UCHDctAK-3r_Rjg7j8ABuYeg" data-layout="full" data-count="default"></div>
            </div>
        </section>

        <section class="my-8">
            <h2 class="text-gray-900 leading-none font-black text-2xl md:text-3xl text-center">PASO 2:</h2>
            <p class="text-gray-900 mt-2 mb-4 md:text-2xl text-center">Mira este vídeo para empezar.</p>
            <div class="text-center">
                <iframe class="mx-auto w-full" src="https://player.vimeo.com/video/647836937?h=ee8144e882" width="640" height="600" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            </div>
        </section>

        <section class="my-8">
            <h2 class="text-gray-900 leading-none font-black text-2xl md:text-3xl text-center">¡DESCARGA TU REGALO KETO!</h2>
            <p class="text-gray-900 mt-2 mb-4 md:text-2xl text-center">Recibirás GRATIS la lista de secretos que necesitas para aprovechar al máximo este Curso Keto</p>
            <div class="relative">
                @if ($error_message)
                    <div class="px-4 py-6 bg-yellow-100 rounded-xl border border-yellow-400 text-sm">
                        <h3 class="text-lg font-bold mb-2"><i class="fas fa-exclamation-triangle text-red-400  mr-1"></i>Opps! no hemos logrado completar la inscripción</h3>
                        <p>{{$name}}, no hemos podido registrarte al taller online por que tu correo <b>{{$email}}</b> ya se encuentra inscrito.</p>
                        <h3 class="mt-4 text-lg font-bold">¿Qué debes hacer?</h3>
                        <p>Revisar tu correo electrónico, ahí encontrarás toda la información para que puedas acceder al taller.</p>
                        <small>(Recuerda revisar la carpeta de correo no deseado o spam)</small>
                    </div>
                @else
                    <div wire:loading.flex wire:target="confirmData" class="absolute w-full h-full bg-white bg-opacity-75 z-30 items-center justify-center ">
                        <div style="border-top-color:transparent" class="w-16 h-16 border-4 border-red-700 border-solid rounded-full animate-spin"></div>
                    </div>
                    <form>
                        @csrf
                        <div class="flex flex-wrap mb-2">
                            <div class="w-full">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                                Nombre Completo
                            </label>
                            <input wire:model="name" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="grid-name" type="text" placeholder="Escribe tu nombre"
                            @error('name') autofocus="autofocus" @enderror>
                            @error('name')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap mb-2">
                            <div class="w-full">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                                Correo electrónico
                            </label>
                            <input wire:model="email" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="grid-email" type="text" placeholder="Escribe tu correo"
                            @error('email') autofocus="autofocus" @enderror>
                            @error('email')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-4">
                            <div class="w-full">
                                <input type="checkbox" id="grid-terms" wire:model="terms" class="form-checkbox cursor-pointer">
                                <label for="grid-terms" >Acepto las <a href="#" class="hover:text-red-400 hover:underline"><b>políticas de privacidad</b></a></label>
                                @error('terms')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <button wire:click="confirmData"
                                wire:loading.attr="disabled"
                                type="button"
                                class=" bg-red-700 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-red-500  text-lg w-full">¡QUIERO SER KETO PERFECTO!</button>
                    </form>
                    <div class="mt-2 leading-none">
                        <small class="italic text-gray-500 ">* Este curso es 100% ONLINE Y<strong>Gratuito</strong></small>
                    </div>
                @endif
            </div>
        </section>

        <section class="my-12">
            <h2 class="text-gray-900 leading-none font-black text-2xl md:text-3xl ">CURSO KETO 100% GRATIS DE TU DOCTOR BAYTER</h2>
            <p class="text-gray-900 mt-2 mb-4 md:text-2xl ">Bienvenido al mejor curso de la Dieta Keto. Aquí encontrarás todas las lecciones del curso para que aprendas desde Cero todo lo que necesitas para iniciar este hermoso estilo de vida.</p>
        </section>


        <small class="italic text-gray-900 mb-4 block text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>

    </div>
</div>
