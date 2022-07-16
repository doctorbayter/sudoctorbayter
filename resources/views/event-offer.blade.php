<x-app-layout>
    <section>
        <div class="max-w-2xl  mx-auto px-6 lg:px-8 flex relative overflow-hidden py-16 md:py-16 text-center">
            <div class="bg-gray-900 text-gray-50 w-full py-8 px-8 rounded-xl shadow-sm">
                <img  src="{{asset('img/logos/revolucion_transparent.png')}}" alt="Revolucion Logo">
                <hr class="my-4">
                <div class="mb-4 leading-none">
                    <p class="font-semibold ">Estos son tus beneficios</p>
                    <small>Elije una de las imagenes de abajo segun la oferta que más te interese</small>
                </div>
                <hr class="my-4">
                <div class="mt-10">
                    <h2 class="text-2xl font-bold text-red-700">Si aún no tienes el Método DKP de 4 fases</h2>
                    <div class="mt-8">
                        <a href="{{route('payment.checkout', $promo_plan)}}">
                            <img src="{{asset('img/billboards/ofertas/promo_plan.png')}}" alt="">
                        </a>
                    </div>
                    <hr class="my-4">
                    <h2 class="text-2xl font-bold text-red-700">Adquiere estas ofertas si ya tienes el Método DKP</h2>
                    <div class="mt-8">
                        <a href="{{route('payment.checkout', $promo_chat21)}}">
                            <img src="{{asset('img/billboards/ofertas/promo_chat21.png')}}" alt="">
                        </a>
                    </div>
                    <div class="mt-8">
                        <a href="{{route('payment.checkout', $promo_chat70)}}">
                            <img src="{{asset('img/billboards/ofertas/promo_chat70.png')}}" alt="">
                        </a>
                    </div>
                    <div class="mt-8">
                        <a href="{{route('payment.checkout', $promo_chat140)}}">
                            <img src="{{asset('img/billboards/ofertas/promo_chat140.png')}}" alt="">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-app-layout>
