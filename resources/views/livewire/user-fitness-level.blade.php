<div class="bg-gradient-to-b min-h-screen from-gray-800 to-gray-900">
    <section class="grid grid-cols-6">
        <div class="col-span-6 order-first md:col-span-2 ">

            <div class="hidden md:inline-block h-screen bg-cover bg-no-repeat bg-right-top w-full sticky top-0 " style="background-image: url({{asset($data['portada_lg'])}})"  alt=""></div>

            <article class="col-span-2 md:col-span-1 md:hidden bg-cover bg-right-top bg-no-repeat h-48 relative group" style="background-image: url({{asset($data['portada'])}})">
                <div class="absolute bg-gradient-to-r from-gray-900 to-transparent  inset-0 z-0 transition-opacity group-hover:opacity-75"></div>
                <div class="p-4 md:hidden z-50 relative flex flex-col justify-between h-full">
                    <a href="{{route('plan.fitness')}}">
                        <span class="text-center p-4 bg-gray-900 bg-opacity-50 transition-all group-hover:bg-opacity-75 rounded-full h-10 w-10 relative flex justify-center items-center">
                            <i class="fas fa-arrow-left text-gray-50 text-center text-sm"></i>
                        </span>
                    </a>
                    <div class="">
                        <h3 class="font-bold text-5xl md:text-6xl text-gray-50">{{$data['title']}}</h3>
                        <p class="text-sm text-blue-100 md:text-base">{{$data['subtitle']}}</p>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-span-6 md:col-span-4 md:px-16 " x-data="{selected:1}">
            <header>
                <div class="p-4 md:px-0 md:py-8 z-50 relative md:flex hidden items-center h-full">
                    <a href="{{route('plan.fitness')}}" class="mr-4">
                        <span class="text-center p-4 bg-gray-900 bg-opacity-50 transition-all group-hover:bg-opacity-75 rounded-full h-10 w-10 relative flex justify-center items-center">
                            <i class="fas fa-arrow-left text-gray-50 text-center text-sm"></i>
                        </span>
                    </a>
                    <div class="">
                        <h3 class="font-bold text-5xl md:text-6xl text-gray-50">{{$data['title']}}</h3>
                        <p class="text-sm text-blue-100 md:text-base">{{$data['subtitle']}}</p>
                    </div>

                </div>
            </header>

            <div class="grid @if ($level != 4)grid-cols-3 @endif gap-x-0.5 text-center bg-gray-900">
                <div class="font-bold cursor-pointer relative bg-blue-900 bg-opacity-25">
                    <div class="text-gray-50 text-xs md:text-base py-3 md:py-4  hover:text-gray-50" @click="selected = 1" x-bind:class="{ 'bg-gray-900' : selected == 1}">
                        <span x-bind:class="{ 'text-primary': selected == 1, 'text-gray-50': selected !== 1 }">
                            Semana 1
                        </span>
                    </div>
                </div>
                @if ($level != 4)
                    <div class=" font-bold cursor-pointer relative bg-blue-900 bg-opacity-25">
                        <div class="text-gray-50 text-xs md:text-base py-3 md:py-4  hover:text-gray-50" @click="selected = 2" x-bind:class="{ 'bg-gray-900 ': selected == 2 }">
                            <span x-bind:class="{ 'text-primary': selected == 2, 'text-gray-50': selected !== 2 }">
                                Semana 2
                            </span>
                        </div>
                    </div>
                    <div class=" font-bold cursor-pointer relative bg-blue-900 bg-opacity-25">
                        <div class="text-gray-50 text-xs md:text-base py-3 md:py-4  hover:text-gray-50" @click="selected = 3" x-bind:class="{ 'bg-gray-900' : selected == 3}">
                            <span x-bind:class="{ 'text-primary': selected == 3, 'text-gray-50': selected !== 3 }">
                                Semana 3
                            </span>
                        </div>
                    </div>
                @endif
            </div>

            <div class="w-full mt-0.5 grid gap-x-0.5  grid-cols-7 text-center shadow-md  text-gray-50 bg-gray-900" x-bind:class="{ 'grid': selected == 1 , 'hidden': selected !== 1 }">
                <div wire:click="setDay(1)" class="font-semibold text-xs py-2 cursor-pointer @if ($day == 1) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 1</div>
                <div wire:click="setDay(2)" class="font-semibold text-xs py-2 cursor-pointer @if ($day == 2) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 2</div>
                <div wire:click="setDay(3)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 3) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 3</div>
                <div wire:click="setDay(4)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 4) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 4</div>
                <div wire:click="setDay(5)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 5) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 5</div>
                <div wire:click="setDay(6)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 6) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 6</div>
                <div wire:click="setDay(7)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 7) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 7</div>
            </div>

            @if ($level != 4)

                <div class="w-full mt-0.5 grid gap-x-0.5   grid-cols-7 text-center shadow-md  text-gray-50 bg-gray-900" x-bind:class="{ 'grid': selected == 2 , 'hidden': selected !== 2 }">
                    <div wire:click="setDay(8)"  class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 8) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 8</div>
                    <div wire:click="setDay(9)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 9) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 9</div>
                    <div wire:click="setDay(10)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 10) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 10</div>
                    <div wire:click="setDay(11)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 11) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 11</div>
                    <div wire:click="setDay(12)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 12) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 12</div>
                    <div wire:click="setDay(13)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 13) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 13</div>
                    <div wire:click="setDay(14)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 14) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 14</div>
                </div>

                <div class="w-full mt-0.5 grid gap-x-0.5   grid-cols-7 text-center shadow-md  text-gray-50 bg-gray-900" x-bind:class="{ 'grid': selected == 3 , 'hidden': selected !== 3 }">
                    <div wire:click="setDay(15)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 15) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 15</div>
                    <div wire:click="setDay(16)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 16) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 16</div>
                    <div wire:click="setDay(17)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 17) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 17</div>
                    <div wire:click="setDay(18)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 18) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 18</div>
                    <div wire:click="setDay(19)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 19) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 19</div>
                    <div wire:click="setDay(20)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 20) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 20</div>
                    <div wire:click="setDay(21)" class="font-semibold text-xs py-2 cursor-pointer  @if ($day == 21) text-primary @else bg-blue-900 bg-opacity-25  @endif "><span class="hidden md:inline">Día</span> 21</div>
                </div>

            @endif

            <section class="mt-16 px-4">
                 <article class="md:flex">
                    <section class="md:mr-12 md:w-5/12">
                        <header>
                            <span class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-400 text-blue-900 rounded-full">Día {{$day}}</span>
                            <div>
                                <h2 class="text-primary text-3xl md:text-5xl md:mt-4 md:mb-2 font-bold mt-1">{{$exercise}}</h2>
                                <p class="text-gray-50 text-sm uppercase md:text-base">Entrenamiento Total Fitness Doctor Bayter</p>
                            </div>
                            <ul class="flex text-gray-50 text-xs mt-2 md:mb-6">
                                <li class="bg-accent mr-2 rounded-xl px-2 py-1"><i class="fas fa-stopwatch text-primary"></i> {{$time}} min</li>
                                <li class="bg-accent mr-2 rounded-xl px-2 py-1"><i class="fas fa-signal text-primary"></i> {{$difficulty}}</li>
                            </ul>
                         </header>
                         <a class="play-btn flex md:hidden justify-center items-center w-full text-center my-8 mx-auto text-sm font-bold px-4 py-2 rounded-full bg-cta  text-gray-50 uppercase transition-colors duration-300 ease-in-out hover:bg-transparent border border-transparent hover:border-gray-50 ">
                            <i class="far fa-play-circle mr-2 text-2xl"></i>
                            <span>Iniciar Entrenamiento</span>
                         </a>

                         <div class="text-gray-50">
                             <p class="text-xs mb-6 md:text-base">{{$copy}}</p>
                             <div>
                                <h3 class="text-xl font-bold mb-2 ">Equipamento</h3>
                                <ul class="text-xs flex flex-wrap">
                                   @foreach ($equipments as $equipment)
                                       <li class="mr-3 mb-2 bg-accent rounded-full py-1 px-2">{{$equipment}}</li>
                                   @endforeach
                                </ul>
                             </div>
                         </div>
                     </section>
                     <section class="flex-1">
                        <iframe class="w-full h-56 md:h-96" id="video-frame" src="https://player.vimeo.com/video/{{$video}}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture " allowfullscreen></iframe>
                     </section>
                 </article>
                 <article>
                     <hr class="border-blue-400 opacity-25 my-8">
                     <section class="mt-6">
                        <header class="mb-6 text-gray-50">
                            <h3 class="text-xl font-bold mb-2 ">Ejercicios del día</h3>
                        </header>
                        <ul class="md:grid grid-cols-3 gap-4 ">
                            @foreach ($trainings as $training)
                                <li class="bg-blue-900 shadow-2xl overflow-hidden rounded-3xl bg-opacity-25 mb-8" x-data="{ descriptionIsShowing: false }">
                                    <div class="flex px-4 py-6 items-start">
                                        <div class="w-24 overflow-hidden ">
                                            <img class=" w-24 h-24 rounded-3xl" src="{{asset($training["image"])}}" alt="">
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <header class="text-gray-50 ">
                                                <h3 class="text-sm font-semibold">{{$training["name"]}}</h3>
                                                <div class="bg-accent px-2 py-1 text-xs rounded-full my-1 flex items-center "><i class="fas fa-trophy mr-2"></i><p>{{$training["goal"]}}</p></div>
                                            </header>
                                            <ul class="text-blue-200 text-xs pl-2 mt-1">
                                                <li><i class="fas fa-clock mr-2 mb-2"></i> {{$training["time"]}}</li>
                                                <li class="hidden"><i class="fas fa-running mr-2 mb-2"></i>{{$training["type"]}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <aside x-on:click="descriptionIsShowing = !descriptionIsShowing"  class="bg-gray-900 bg-opacity-75 hidden">
                                        <div class="text-gray-50 text-xs px-4 py-4" x-show="descriptionIsShowing">
                                            <h3 class="text-sm font-bold mb-2">Observaciones</h3>
                                            <ul class="">
                                                @foreach ($training["comments"] as $comment)
                                                    <li class="mb-2">- {{$comment}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="flex items-center justify-center text-center py-2 text-blue-200"><i class="fas" x-bind:class="{ ' fa-chevron-down  ': descriptionIsShowing == false, 'fa-chevron-up': descriptionIsShowing == true }"></i></div>
                                    </aside>
                                </li>
                            @endforeach
                        </ul>
                     </section>
                 </article>
            </section>

        </div>
    </section>

@push('style')
    <style>
        .text-primary{
            color: #d29c46 !important;
        }
        .bg-cta{
            background-color: #d29c46;
        }
        .bg-accent{
            background-color: #20365d;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
        var player = new Vimeo.Player(document.querySelector('#video-frame'));

        document.querySelector('.play-btn').addEventListener('click', function() {
            player.play();
        });
    </script>
@endpush
</div>
