<div x-data="{ openMenu: false }" >
    <div class="flex">
        @can('enrolled', auth()->user()->subscriptions->whereNotIn('plan_id', [3, 4, 5, 6, 11, 12, 13, 14])->first())
            @can('enrolledFase', $fase)
                <x-menu :userPlan="$user_plan" />
                <div :class="{'w-7/12': openMenu, 'w-11/12': !openMenu}" class="bg-white  ml-auto">

                    <header class="bg-fixed bg-cover shadow-lg" style="background-image: url({{asset('img/backgrounds/meal_plan_top_banner_2-1-1.jpg')}})">
                        <div class="w-11/12 mx-auto py-10">
                            <h3 class="font-bold text-white text-lg md:text-xl px-2 inline-block bg-red-700"> {{$fase->name}}</h3>
                            <h2 class=" font-bold text-3xl md:text-6xl"> {!!$fase->sub_name!!}</h2>
                            <p class="text-base text-gray-600 mt-2">{{$fase->descripcion}}</p>
                            <section class=" flex items-center flex-col md:flex-row mt-4 ">

                                @foreach ($fase->resources->sortBy('created_at') as $resource)
                                        <a  href="{{asset($resource->url)}}" target="_blank" class="text-white text-xs mt-4 md:mt-0 md:text-sm xl:text-base border @if ($loop->first) md:mr-3 @endif cursor-pointer border-red-700 bg-red-700 hover:text-red-800 hover:bg-white inline-block font-bold px-6 py-2 rounded-full">Descargar {{$resource->name}}</a>
                                @endforeach
                            </section>
                        </div>
                    </header>

                    @if ($fase->id == 99999)
                    <div class="flex flex-col space-y-4 min-w-screen py-8 animated fadeIn faster  justify-center items-center outline-none focus:outline-none bg-gray-900">
                        <div class="flex flex-col p-8 bg-white shadow-md hover:shodow-lg rounded-2xl">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden md:block w-16 h-16 rounded-2xl p-3 border border-yellow-100 text-yellow-400 bg-yellow-50" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div class="flex flex-col ml-3">
                                        <div class=" leading-none font-bold text-red-700">¡Aviso Importante!</div>
                                        <p class="text-sm text-gray-600 leading-none mt-1">Estamos actualizando la <b>fase 3</b> por ahora podrás acceder solo a la <b>semana 1 y semana 2</b> próximante habilitaremos más información.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <section class="bg-gradient-to-t from-gray-100 pb-8 md:pb-14 ">
                        @php
                            if (($this->day->day / 7) <=1) {
                                $selected = 0;
                            }elseif (($this->day->day / 7) <=2 && ($this->day->day / 7) >1) {
                                $selected = 1;
                            }elseif (($this->day->day / 7) <=3 && ($this->day->day / 7) >2) {
                                $selected = 2;
                            }
                        @endphp
                        <div class="w-11/12 mx-auto my-10" x-data="{selected:{{$selected}}}">

                            <section class="mt-8 mb-20">
                                <div class="grid grid-cols-{{$fase->weeks->count()}} text-center">



                                    @foreach ($fase->weeks as $key => $week)

                                        <div class="border border-gray-100 font-bold cursor-pointer bg-gray-50 rounded-tl-md relative">

                                            <div class="text-red-700 border-b-4 text-xs md:text-base py-3 md:py-4  hover:text-red-700" @click="selected = {{$key}}" x-bind:class="{ 'bg-red-800 border-gray-700   ': selected == {{$key}}, 'border-gray-300 ': selected !== {{$key}} }">
                                                <img src="{{asset('img/icons/gfx/calendar_color.svg')}}" alt="" class="w-3 md:w-5 mr-2 inline">
                                                <span x-bind:class="{ ' text-gray-50  ': selected == {{$key}}, 'text-red-700': selected !== {{$key}} }">
                                                    {{$week->name}}
                                                </span>
                                            </div>

                                            @if ($week->pivot->resource)
                                                <div>

                                                    @if ($fase->id == 14)
                                                        <a href="https://doctorbayter.com/files/pdf/lista-de-alimentos-reto-quedese-keto.pdf" target="_blank" class=" font-semibold md:font-bold md:text-sm text-xs py-2 w-full block text-white" x-bind:class="{ 'bg-gray-900 ': selected == {{$key}}, 'bg-gray-200 ': selected !== {{$key}} }">
                                                            <span class="hidden md:inline">Descargar lista de alimentos</span>
                                                            <span class="md:hidden">Lista alimentos</span>
                                                        </a>
                                                    @else
                                                        <a href="{{asset($week->pivot->resource)}}" target="_blank" class=" font-semibold md:font-bold md:text-sm text-xs py-2 w-full block text-white" x-bind:class="{ 'bg-gray-900 ': selected == {{$key}}, 'bg-gray-200 ': selected !== {{$key}} }">
                                                            <span class="hidden md:inline">Descargar lista de alimentos</span>
                                                            <span class="md:hidden">Lista alimentos</span>
                                                        </a>
                                                    @endif




                                                </div>
                                            @endif

                                            <div class="grid overflow-hidden h-0 md:h-auto grid-cols-{{$this->days}} text-center shadow-md  absolute w-full " x-bind:class="{ 'grid': selected == {{$key}} , 'hidden': selected !== {{$key}} }">
                                                @foreach ($week->days->sortBy('day') as $day)

                                                    @if ($day->fase->id == $fase->id)
                                                        <div wire:click="setDay({{$day}})" class="font-semibold text-xs @if ($this->day->day == $day->day) bg-red-700 text-red-100 cursor-default @else bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer @endif  py-2   "><span class="hidden md:block xl:inline">Día</span> {{$day->day}}</div>
                                                    @endif


                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                    @foreach ($fase->weeks as $key => $week)
                                        <div class="w-10/12 grid md:hidden overflow-hidden grid-cols-{{$this->days}} text-center shadow-md absolute " x-bind:class="{ 'grid': selected == {{$key}} , 'hidden': selected !== {{$key}} }">
                                            @foreach ($week->days as $day)

                                                @if ($day->fase->id == $fase->id)
                                                    <div wire:click="setDay({{$day}})" class="font-semibold text-xs @if ($this->day->day == $day->day) bg-red-700 text-red-100 cursor-default @else bg-gray-50 hover:text-red-700 hover:bg-gray-100 cursor-pointer @endif  py-2 "><span class="hidden md:inline">Día</span> {{$day->day}}</div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endforeach
                            </section>

                            <section class="mt-16 w-full">
                                <header class="md:mb-12">
                                    <h2 class="text-3xl md:text-5xl font-bold">Menú <span class="text-red-700">Día {{$this->day->day}}</span></h2>
                                    <p class="mb-4 text-gray-500"><img src="{{asset('img/icons/gfx/pie-chart.svg')}}" alt="" class="w-4 mr-1 inline opacity-40">Gramos de carbohidratos día <b>{{$this->carbs}}</b></p>
                                </header>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-4 gap-y-10 divide-y-2 md:divide-y-0 ">

                                    {{--
                                        @foreach ($this->day->recipes->where('type', '==', 1) as $key => $recipe)
                                       
                                        @foreach ($this->day_recipes as $key => $recipe)
                                    --}}

                                    @foreach ($this->day->recipes->where('type', '==', 1)->sortBy('pivot.meal') as $key => $recipe)


                                        <div class="pt-12 md:pt-0">
                                            <a href="{{route('plan.recipe', $recipe)}}">
                                                <div class="relative h-62">

                                                    <div class="absolute text-sm bg-gray-100 bottom-full px-4 py-2 font-bold leading-none text-gray-900  rounded-t-lg ml-2 ">

                                                        @switch($recipe->pivot->meal)
                                                            @case(1)
                                                                    @if ($fase->id == 3  )
                                                                        @if ( ($this->day->day % 2) != 0 )
                                                                            <p>Desayuno</p>
                                                                            @else
                                                                            <p>Romper ayuno</p>
                                                                        @endif
                                                                    @else
                                                                        <p>Desayuno</p>
                                                                    @endif
                                                                @break
                                                            @case(2)
                                                                <p>Almuerzo</p>
                                                                @break
                                                            @case(3)
                                                                <p>Cena</p>
                                                                @break
                                                            @case(4)
                                                                <p>Romper Ayuno</p>
                                                                @break
                                                        @endswitch

                                                    </div>
                                                    <img src="@if (Storage::exists($recipe->image->url)) {{Storage::url($recipe->image->url)}} @else {{asset('img/'.$recipe->image->url)}} @endif" alt="" class="rounded-2xl object-cover">
                                                </div>
                                                <div class="mt-2 ml-4">
                                                    <p class="text-2xl mb-2 font-bold text-gray-900">{{$recipe->name}}</p>
                                                    <div class="flex md:flex-col xl:flex-row md:items-start  text-xs items-center xl:items-center">
                                                    <p class="bg-green-500 px-2 py-1 rounded-lg inline-block text-white">{{$recipe->carbs}} Carbs.</p>
                                                    <p class="text-gray-400 ml-2 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                                        <img src="{{asset('img/icons/gfx/user.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                                        <span>1 persona</span>
                                                    </p>
                                                    <p class="text-gray-400 md:ml-0 md:my-1 xl:my-0 xl:ml-2 flex items-center">
                                                        <img src="{{asset('img/icons/gfx/clock.svg')}}" alt="" class="w-4 mr-1 opacity-40">
                                                        <span>{{$recipe->time}} minutos</span>
                                                    </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <hr class="my-12">
                                <div class="flex flex-col xl:flex-row" x-data="{ modalIsShowing: false }" >

                                    @if ($this->day->recipes->where('type', '==', 2)->count() > 0 )
                                        <div class="w-full xl:w-5/12 xl:mr-16">
                                            <h2 class="text-4xl text-gray-900 font-bold">
                                                <span class="text-red-700">Snacks</span> Día {{$this->day->day}} <span class="text-base text-gray-600 font-medium">(opcional)</span>
                                            </h2>
                                            <section class="my-4" >
                                                @foreach ($this->day->recipes->where('type', '==', 2) as $snack)
                                                    <div wire:click="toogleSnack('{{$snack->id}}')" wire:key="{{ $loop->index }}"   x-on:click="modalIsShowing = true" id="snack{{$snack->id}}" class="border border-gray-100 shadow-md rounded-xl overflow-hidden w-full mb-6 cursor-pointer" title="click para ver más">
                                                        <div class="w-full block">
                                                            <div class="flex items-center">
                                                                <figure class="w-20 md:w-48 h-28 overflow-hidden bg-gray-100 ">
                                                                    <img src="{{asset('img/'.$snack->image->url)}}" alt="" class=" h-full object-cover">
                                                                </figure>
                                                                <div class="ml-6 relative w-full flex-1">
                                                                    <h2 class="font-bold text-lg text-gray-900">{{$snack->name}}</h2>
                                                                    <div class="text-gray-400 text-sm pr-4 mb-2 hidden md:block">{!!Str::limit($snack->descripcion, '90', '...')!!} </div>
                                                                    <div class="text-gray-400 text-sm pr-4 mb-2 md:hidden">{!!Str::limit($snack->descripcion, '50', '...')!!} </div>
                                                                    <p class="bg-green-500 mt-1 px-2 py-1 text-xs rounded-lg inline-block text-white">{{$snack->carbs}}g Carbs.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <aside x-show="modalIsShowing" x-cloak class="z-50 fixed delay-500 w-full h-full top-0 left-0 flex items-center justify-center"
                                                    x-transition:enter="transition ease-out duration-500"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="ease-in duration-300"
                                                    x-transition:leave-end="opacity-0"
                                                    >
                                                    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50" x-on:click="modalIsShowing = false"></div>

                                                    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                                                        <div x-on:click="modalIsShowing = false" class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50"  >
                                                            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                            </svg>

                                                        </div>

                                                        <!-- Add margin if you want to see some of the overlay behind the modal-->
                                                        <div class="modal-content py-4 text-left px-6">

                                                            @if ($this->snack != null)
                                                                <!--Title-->
                                                                <div class="flex justify-between items-center pb-3">
                                                                    <p class="text-2xl font-bold"><span class="mr-2 text-red-700">Snack</span>{{$this->snack->name}}</p>
                                                                    <div class="modal-close cursor-pointer z-50">
                                                                    <svg x-on:click="modalIsShowing = false" id="crossClose{{$this->snack->id}}" class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                                                    </svg>
                                                                    </div>
                                                                </div>
                                                                <!--Body-->
                                                                <div class="text-gray-400 text-sm" >
                                                                    <div>
                                                                        <figure class="w-full h-36 overflow-hidden bg-gray-100 ">
                                                                            <img src="{{asset('img/'.$this->snack->image->url)}}" alt="" class=" w-full object-cover">
                                                                        </figure>
                                                                    </div>
                                                                    <div class="py-4">
                                                                        <h3 class="text-xl font-bold text-gray-900 mb-1">Preparación</h3>
                                                                        {!!$this->snack->descripcion!!}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </aside>
                                            </section>
                                        </div>
                                    @endif

                                    @if ($this->day->note != "<p></p>")
                                        <div class=" flex-1 ">
                                            <h2 class="text-4xl font-bold mb-4 text-red-700">¡Notas!</h2>
                                            <div class="text-gray-600">
                                                {!!$this->day->note!!}
                                            </div>
                                        </div>
                                    @endif


                                </div>
                                @if ($this->day->video)
                                    <div class="relative w-full mt-8 h-52 md:h-96 xl:min-h-video video-iframe">
                                        {!! $this->day->video->iframe !!}
                                    </div>
                                @endif
                            </section>
                        </div>
                    </section>
                </div>
                @else
                    o.O
            @endcan
        @else
            @php
                return redirect()->route('dkp')
            @endphp
        @endcan
    </div>
    @push('style')
        <style>
            [x-cloak] {
                display: none !important;
            }

            .modal {
                transition: opacity 0.25s ease;
            }
            body.modal-active {
                overflow-x: hidden;
                overflow-y: visible !important;
            }
            .video-iframe iframe{
                width: 100%;
                height: 100%;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://player.vimeo.com/api/player.js"></script>
    @endpush
</div>
