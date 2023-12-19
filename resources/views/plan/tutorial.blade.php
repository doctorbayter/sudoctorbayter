<x-app-layout>
<div x-data="{ openMenu: false }" >

    @php
        if(auth()->user()->subscription){
            $user_plan = auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->sortBy('plan_id')->first();
        }
    @endphp

    <div class="flex">
        <x-menu :userPlan="$user_plan->plan_id" />
        <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="bg-white  ml-auto">

            <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
                <div class="w-10/12 mx-auto py-10">
                    <h3 class="font-bold text-white text-xl px-2 inline-block bg-red-700">Aprende a usar la página</h3>
                    <h2 class=" font-bold text-6xl">Guías y <span class="text-red-700">Tutoriales</span></h2>

                </div>

            </header>

            <section class="bg-gradient-to-t from-gray-100 pb-14 ">
                <div class="w-10/12 mx-auto my-10" x-data="{selected:1}">
                    <section class="mt-0">
                        <div class="">

                            <section class="">
                                <div class=" mx-auto py-6 md:py-12">
                                    <div class="mx-auto" x-data="{selected:null}">
                                        <ul class="text-gray-50">
                                            <li class="relative mb-4 rounded-lg bg-gray-800">
                                                <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 2 ? selected = 2 : selected = null">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-lg font-bold md:text-xl">Conozcamos la nueva página</span>
                                                        <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 2 , 'fa-chevron-down': selected !== 2 }"></span>
                                                    </div>
                                                </button>
                                                <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container2" x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                                                    <div class="px-6 pt-4 pb-6 bg-gray-100">
                                                        <div class="text-gray-900">
                                                            <div class="">
                                                                <p class="text-base mb-4">Lo primero que necesitas es conocer la anatomía de nuestra página. para que puedas sacar el máximo provecho y no te pierdas ningún detalle o información.<br/>A continuación verás una imagen de la página web y la explicación de cada uno de sus puntos.</p>
                                                                <figure>
                                                                    <img src="{{asset('img/tutorial/tutorial_01.jpg')}}" alt="">
                                                                </figure>
                                                                <ul class="list-decimal px-6 divide-y-2">
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Ménu de acceso</b></p>
                                                                        <p>Cuando oprimes el botón del menú el cual puede tener las iniciales de tu nombre o tu foto <a href="{{route('profile.show')}}" class="text-blue-500 underline">(Si quieres actualizar tu foto de perfil puedes hacerlo aquí)</a>. Se despliega un menú con diferentes opciones. Entre esas:</p>
                                                                        <ul class="list-decimal px-6 mt-4">
                                                                            <li class="text-base mb-2">
                                                                                <p><b>Mí Página:</b> Aquí encontrarás la página principal de tu plan que es la misma que estás viendo en la imagen anterior.</p>
                                                                            </li>
                                                                            <li class="text-base mb-2">
                                                                                <p><b>Perfil:</b> Aquí encontrarás y podrás modificar toda tu información básica de contacto y acceso como: Foto, Nombre, Correo y Clave.</p>
                                                                            </li>
                                                                            <li class="text-base mb-2">
                                                                                <p><b>Cerrar sesión:</b> Si deseas puedes finalizar tu sesión. esto quiere decir que la proxima vez que entres a la página deberás ingresar nuevamente tu correo y clave.</p>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Resumen de tu plan</b></p>
                                                                        <p>Aquí verás cual es el plan que actualmente tienes adquirido y el acceso a las diferentes fases que están incluidas en tu plan.</p>
                                                                    </li>
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Actualización de tu plan</b></p>
                                                                        <p>Si deseas actualizar tu plan y compras las demás fases puedes hacerlo desde este banner. Esto solo aplica para quienes no tienen el <b>Plan Premium 4 Fases</b>.</p>
                                                                    </li>
                                                                    <li class="text-base py-6 hidden">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Chat grupal Whatsapp</b></p>
                                                                        <p>Aquí podrás comprar la anualidad de tu acceso al <b>Chat Grupal Whatsapp</b> con el Dr. Bayter. Ahora puedes adquirir más tiempo por anticipado. es decir que si deseas pagar la mensualidad del chat puedes hacerlo y el tiempo se te acumulará.</p>
                                                                    </li>
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Menú Principal</b></p>
                                                                        <p>Aquí encontrarás toda la información de la página.</p>
                                                                        <ul class="list-decimal px-6 mt-4">
                                                                            <li class="text-base mb-2">
                                                                                <p><b>Método DKP:</b> Encontrarás las fases que tienes acceso o están incluidas en tu plan</p>
                                                                            </li>
                                                                            <li class="text-base mb-2">
                                                                                <p><b>Extras:</b> Encontrarás las diferentes recetas de <b>Bebidas, Salsitas y Snacks</b> Keto para que acompañes tus recetas</p>
                                                                            </li>
                                                                            <li class="text-base mb-2">
                                                                                <p><b>Adicionales:</b> Aquí podrás adquirir los servicios adicionales con tu doctor bayter. como: <b>Mensualidad al Chat Grupal WhatsApp</b> o las <b>Citas Virtuales Personalizadas</b> con tu Dr. Bayter. </p>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="relative mb-4 rounded-lg bg-gray-800">
                                                <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 3 ? selected = 3 : selected = null">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-lg font-bold md:text-xl">Ingreso a las fases</span>
                                                        <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 3 , 'fa-chevron-down': selected !== 3 }"></span>
                                                    </div>
                                                </button>
                                                <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container3" x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                                                    <div class="px-6 pt-4 pb-6 bg-gray-100">
                                                        <div class="text-gray-900">
                                                            <div class="">
                                                                <p class="text-base mb-4">Ahora que ya conoces la estrucura de la página veamos como funcionan las fases y como debes consumir el contenido.</p>
                                                                <figure>
                                                                    <img src="{{asset('img/tutorial/tutorial_02.jpg')}}" alt="">
                                                                </figure>
                                                                <ul class="list-decimal px-6 divide-y-2">
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Listado de días</b></p>
                                                                        <p>Aquí encontrarás cada uno de los días de la fase dividido por semanas. Para acceder al día solo debes oprimir la semana y el día que deseas y listo. Sabrás en cual día estás ya que este se pondrá de color rojo. </p>
                                                                    </li>
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Menú del día</b></p>
                                                                        <p>Aquí encontrarás las recetas del día con su respectivo <b>desayuno, almuerzo y cena</b>, cada una de ellas con su respectiva foto de referencia, nombre de la receta, cantidad de carbohidratos, la cantidad de personas por porción y el tiempo promedio de preparación.</p>
                                                                    </li>
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Snacks</b></p>
                                                                        <p>Aquí verás las opciones de snacks del día.</p>
                                                                    </li>
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Notas</b></p>
                                                                        <p>En algunos días encontrarás las notas o recomendaciones de ser necesarias.</p>
                                                                    </li>
                                                                    <li class="text-base py-6 hidden">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Video motivacional</b></p>
                                                                        <p>La <b>Fase 1</b> sin lugar a duda es la más dificil y donde necesitamos más motivación para lograr ese objetivo que tanto deseamos. por eso encontrarás un video moticavional en cada uno de los 21 días de la fase 1 donde el Dr. Bayter te dirá que vas a sentir ese día, cuales prodrían ser esos efectos secundarios y como puedes mitigarlos.</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="relative mb-4 rounded-lg bg-gray-800">
                                                <button class="w-full px-8 py-6 text-left outline-zero" @click="selected !== 4 ? selected = 4 : selected = null">
                                                    <div class="flex items-center justify-between">
                                                        <span class="text-lg font-bold md:text-xl">¿Cómo cambiar mi clave?</span>
                                                        <span class="fas font-bold text-xl" x-bind:class="{ 'fa-chevron-up': selected == 4 , 'fa-chevron-down': selected !== 4 }"></span>
                                                    </div>
                                                </button>
                                                <div class="relative overflow-hidden transition-all max-h-0 duration-500" style="" x-ref="container4" x-bind:style="selected == 4 ? 'max-height: ' + $refs.container4.scrollHeight + 'px' : ''">
                                                    <div class="px-6 pt-4 pb-6 bg-gray-100">
                                                        <div class="text-gray-900">
                                                            <div class="">
                                                                <p class="text-base mb-4">Además de cambiar tu clave tambien podrás cambiar tu correo electrónico (te recomendamos cambiar el correo solo si es estrictamente necesario). para actualizar tu información o cambiar tu clave desde ingresar <a href="{{route('profile.show')}}" class="text-blue-500">aquí</a> o seguir los pasos que verás a continuación.</p>
                                                                <figure>
                                                                    <img src="{{asset('img/tutorial/tutorial_03.jpg')}}" alt="">
                                                                </figure>
                                                                <ul class="list-decimal px-6 divide-y-2">
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Entra al menú de acceso</b></p>
                                                                        <p>Entra al menú de acceso que encuentra en la parte superior derecha y entra al link <b>Perfil</b></p>
                                                                    </li>
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Información de perfil</b></p>
                                                                        <p>Aquí podrás cambiar tu información de contacto como: <b>Foto, nombre y correo electrónico</b>. Una vez hagas los cambios que desees oprimer el botín <b>Guardar</b> que encontrarás debajo del formulario.</p>
                                                                    </li>
                                                                    <li class="text-base py-6">
                                                                        <p class="text-red-700 text-xl mb-2"><b>Actualizar contraseña</b></p>
                                                                        <p>Aquí podrás cambiar contraseña, para hacerlo, bedes primero ingresar tu contraseña actual. Después, ingresar tu clave nueva y la compruebas en el siguiente campo. Una vez hagas los cambios que desees oprimer el botín <b>Guardar</b> que encontrarás debajo del formulario.</p>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </section>
                </div>
            </section>
    </div>
</div>
</x-app-layout>
