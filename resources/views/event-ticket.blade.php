<x-app-layout>
    <section>
        <div class="max-w-2xl  mx-auto px-6 lg:px-8 flex relative overflow-hidden py-16 md:py-16 text-center">
            <div class="bg-gray-900 text-gray-50 w-full py-8 px-8 rounded-xl shadow-sm">
                <img  src="{{asset('img/logos/revolucion_transparent.png')}}" alt="Revolucion Logo">
                <hr class="my-4">
                <div class="mb-4 leading-none">
                    <p class="font-semibold ">Valida tu entrada al evento</p>
                    <small>Escribe el correo exactamente como lo hiciste al momento de comprar tu entrada</small>
                </div>
                <form action="/revolucion/ticket/qr" method="GET">

                    <div class="form-group row">
                      <div class="col-sm-10">
                        <input name="ticket" type="text" class="form-control w-full border-none py-4 px-2 mb-4  rounded-xl text-black"  placeholder="Escribe tu correo aquí...">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="w-full font-bold  py-4 rounded-xl bg-red-700 mb-6">VALIDAR</button>
                      </div>
                    </div>
                  </form>
                <hr class="my-4">
                <footer class="leading-none mt-8 ">
                    <p>Si tienes problemas validando tu entrada por favor contacta con nuestro equipo de soporte.</p>
                    <a href="https://wa.me/573160441114" target="_blank" class="underline italic mt-4 block hover:text-red-700">Entra aquí para contactar a soporte</a>
                </footer>
            </div>
        </div>
    </section>
</x-app-layout>
