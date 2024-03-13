<x-app-layout> 

    <section class=" bg-gradient-to-t from-black to-gray-800 pb-16">
        <header class="max-w-7xl mx-auto">
            <h2 class="text-white font-bold text-center pt-16 sm:pt-24 pb-12 text-2xl sm:text-6xl px-4 uppercase">Te damos la Bienvenida a nuestras <span class="text-red-700">#HistoriasKetoBayter</span></h2>
            <div class="text-gray-100 px-4 text-justify text-sm sm:text-2xl sm:text-center space-y-5">
                <p>Con nuestras Historias Ketobayter, celebramos cada paso, cada desafío superado y cada logro obtenido en el camino hacia una vida llena de salud, energía y felicidad. Este es un lugar donde las voces de los KetoPerfectos resuenan, compartiendo sus experiencias personales, sus luchas, sus victorias y cómo el Método DKP ha iluminado su camino hacia una vida más saludable y plena.</p>
                <p>Te invitamos a sumergirte en estas experiencias, a sentirte inspirado, y quizás, a ver un reflejo de tu propio viaje en ellos. Si estás listo para comenzar tu transformación, para ser parte de una comunidad que apoya y celebra cada paso del camino, estás en el lugar correcto.</p>
                    
                <h3 class=" italic">¿Eres un KetoBayter con una historia para contar? Anímate a compartirla con nosotros. Tu viaje puede ser el catalizador que alguien necesita para dar el primer paso hacia una vida más saludable. Juntos, podemos inspirar a más personas a unirse a este movimiento de comer para sanar, de vivir plenamente y de redescubrir la alegría de una vida en armonía con nuestros mismos.</h3>
                <a href="#opinion">
                    <span class=" max-w-xl rounded-full block mt-8 text-center text-xl sm:text-4xl font-bold px-4 py-4 mx-auto border bg-yellow-500 border-yellow-500 text-red-700 uppercase transition-colors duration-300 ease-in-out hover:border-white hover:bg-transparent hover:text-white cta-btn relative overflow-hidden">Escribe tu opinión</span>
                </a> 
                <small class="block mt-0 sm:mt-4">Bienvenido a <b>Comer para Sanar</b> ¡Tu historia comienza hoy!</small>
            </div>
        </header>
        <article class="my-8">
            
            <!-- Swiper -->
            <div class="swiper swiperTestimonials">
                <div class="swiper-wrapper">
                    @for ($i = 1; $i <= 16; $i++)
                        @php
                            $imageNumber = str_pad($i, 3, '0', STR_PAD_LEFT);
                        @endphp
                        <div class="swiper-slide">
                            <img src="{{ asset('img/testimonios/testimonio_dkp_' . $imageNumber . '.jpg') }}" alt="Imagen {{ $imageNumber }}">
                        </div>
                    @endfor
                </div>
            </div>
            
            <script>
                var swiper = new Swiper('.swiperTestimonials', {
                     loop: true,
                     slidesPerView: 2, // Número predeterminado de diapositivas para pantallas más grandes
                     spaceBetween: 20, // Espacio entre diapositivas
                     autoplay: {
                         delay: 1, // Mantiene el carrusel moviéndose continuamente
                         disableOnInteraction: true,
                     },
                     speed: 4000, // Ajusta este valor según necesites para controlar la velocidad del efecto continuoe
                     
                     breakpoints: {
                         // Configuraciones para pantallas mayores a 768px 
                         768: {
                             slidesPerView: 5, // 6 diapositivas visibles en pantallas más grandes
                             spaceBetween: 60 // Puedes ajustar el espacio entre diapositivas en móviles si es necesario
                         }
                     }
                 });
             </script>
        </article>
        <article class="mt-16 mb-0">
            <div class="py-8 bg-gradient-to-t from-gray-900 to-gray-800 rounded-xl px-4 mx-2 grid grid-rows-1 sm:grid-cols-7 text-center items-center text-white sm:w-4/12 sm:mx-auto">
                <figure class=" overflow-hidden rounded-full w-32 h-32 mx-auto mb-6 col-span-7 sm:col-span-2">
                    <img src="{{asset('img/photos/daniel_001.png')}}" alt="Foto Daniel Habif" class="object-cover w-full">
                </figure>
                <div class=" space-y-2 col-span-5 sm:text-left">
                    <p class="italic">"Comprendí que, mientras un médico se enfoca en tratar la enfermedad, uno excepcional, como el <strong>Doctor Bayter</strong>, guía al paciente para entender cómo su propio cuerpo también puede sanarse."</p>
                    <h3 class="font-bold">Daniel Habif</h3>
                </div>
            </div>
        </article>
    </section>

    <section class="bg-gray-200 py-16">
        <h3 class="text-center font-bold text-xl mb-8 max-w-4xl mx-auto"><span class="text-red-700">IMPORTANTE:</span> Una vez escribas tu opinión debes revisar tu correo electrónico para verificarla, sino no aparecerá en el listado.</h3>
        <article class="sm:max-w-5xl shadow-xl px-2 mx-4 sm:px-16 text-center sm:mx-auto bg-gray-50  rounded-xl">
            <div id="opinion" class="yotpo yotpo-main-widget w-full mx-auto"
            data-product-id="3825094"
            data-price="14.7"
            data-currency="USD"
            data-name="Tus Primeros 7 Días Keto Perfectos"
            data-url="https://doctorbayter.com/dkp7"
            data-image-url="https://doctorbayter.com/img/billboards/plan_7_dias_dkp.jpg">
            </div>
        </article>
    </section>
   
 
    @push('scriptsHead')
        <script type="text/javascript">
            (function e(){var e=document.createElement("script");e.type="text/javascript",e.async=true,e.src="//staticw2.yotpo.com/ULWKqhYeIUcQ4XV5mt6lrxcSFajkooRzVReVDdWJ/widget.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})();
        </script>    
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    @endpush
   
    @push('style')   
        <!-- Link Swiper's CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <style>
            .cta-btn:after{
                content: " ";
                display: block;
                position: absolute;
                top: 0;
                left: -120px;
                height: 100%;
                width: 90px;
                background: hsla(0,0%,100%,.4);
                -webkit-transition: all .15s linear;
                transition: all .15s linear;
                -webkit-transform: skewX(-20deg) translateX(0);
                transform: skewX(-20deg) translateX(0);
                -webkit-animation: buttonShine 4s infinite;
                animation: buttonShine 4s infinite;

                -webkit-box-sizing: border-box;
                box-sizing: border-box;
            }
            @-webkit-keyframes buttonShine {
                0% {
                    -webkit-transform: skewX(-20deg) translateX(0);
                    transform:skewX(-20deg) translateX(0)
                }

                90% {
                    -webkit-transform: skewX(-20deg) translateX(0);
                    transform:skewX(-20deg) translateX(0)
                }

                95% {
                    -webkit-transform: skewX(-20deg) translateX(900px);
                    transform:skewX(-20deg) translateX(900px)
                }
            }

            @keyframes buttonShine {
                0% {
                    -webkit-transform: skewX(-20deg) translateX(0);
                    transform:skewX(-20deg) translateX(0)
                }

                90% {
                    -webkit-transform: skewX(-20deg) translateX(0);
                    transform:skewX(-20deg) translateX(0)
                }

                95% {
                    -webkit-transform: skewX(-20deg) translateX(900px);
                    transform:skewX(-20deg) translateX(900px)
                }
            }
        </style>
    @endpush

</x-app-layout>
