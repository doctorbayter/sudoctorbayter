<div>
    <div class="w-full sm:px-6 lg:px-0 grid grid-cols-1 md:grid-cols-4">
        <div class="col-span-3 bg-gray-50" x-data="data()" x-on:resize.window="(window.innerWidth <= 768) ? opt('4') : opt('1')" >
            <article class="embed-responsive" id="embedResponsive">
                {!!$content['iframe']!!}
            </article>
            <div class="bg-gradient-to-b from-secundary-400  to-secundary-700">

                <div class="text-gray-50 md:px-4 text-xs md:text-base grid grid-cols-4 md:flex gap-x-2 max-w-2xl">
                    <button class=" md:hidden font-semibold outline-zero rounded-t-lg md:px-6 pt-2 md:pt-4 pb-2  transition ease-in-out duration-100" x-bind:class="{ 'bg-gray-50 text-secundary-700 cursor-default': selected == '4', 'hover:bg-gray-900 hover:text-primary-100 hover:bg-opacity-25' : selected != '4'}" @click.prevent="opt('4')">Contenido</button>
                    <button class="font-semibold outline-zero rounded-t-lg md:px-6 pt-2 md:pt-4 pb-2  transition ease-in-out duration-100" x-bind:class="{ 'bg-gray-50 text-secundary-700 cursor-default': selected == '1', 'hover:bg-gray-900 hover:text-primary-100 hover:bg-opacity-25' : selected != '1'}" @click.prevent="opt('1')">Descripción</button>
                    <button class="hidden font-semibold outline-zero rounded-t-lg md:px-6 pt-2 md:pt-4 pb-2 transition ease-in-out duration-100" x-bind:class="{ 'bg-gray-50 text-secundary-700 cursor-default': selected == '2', 'hover:bg-gray-900 hover:text-primary-100 hover:bg-opacity-25' : selected != '2' }"@click.prevent="opt('2')">Preguntas <span class="hidden md:inline">y respuestas</span></button>
                    <button class="font-semibold outline-zero rounded-t-lg md:px-6 pt-2 md:pt-4 pb-2 transition ease-in-out duration-100" x-bind:class="{ 'bg-gray-50 text-secundary-700 cursor-default': selected == '3', 'hover:bg-gray-900 hover:text-primary-100 hover:bg-opacity-25' : selected != '3' }"@click.prevent="opt('3')">Notas</button>
                </div>
            </div>

            <section class="max-w-5xl px-4 mx-auto my-16">

                <section class="md:hidden" x-show.transition.in.opacity.duration.300ms="selected == '4'">
                    <x-course-content :course="$course" :current="$current" :content="$content" :self="$this"/>
                </section>

                <div x-show.transition.in.opacity.duration.300ms="selected == '1'">

                    <h1 class="font-bold text-xl leading-6 md:text-3xl text-gray-900 mt-4">{{$content['name']}}</h1>
                    @if ($content['description'])
                        <div class="text-gray-600 text-sm md:text-base mt-4">{!!$content['description']['name']!!}</div>
                    @endif
                </div>

            </section>
        </div>

        <div id="sticky-card"  class="bg-white shadow-sm relative hidden md:block">
            <div class="sticky top-2">

                <section class="pb-4">
                    <x-course-content :course="$course" :current="$current" :content="$content" :self="$this"/>
                </section>
            </div>
        </div>
    </div>


<x-slot name="css">
    <style>
        .ytp-svg-fill {
            fill: #fff;
        }
        .ytp-svg-autoplay-ring{
            animation: dash 5s linear;
            animation-fill-mode: forwards;
        }
        .ytp-svg-pause{
            animation-play-state: paused;
        }
        @keyframes dash {
            to {
                stroke-dashoffset: 0;
            }
        }
    </style>
</x-slot>

@push('scripts')
    <!--Include the Vimeo API Library-->
    <script src="https://player.vimeo.com/api/player.js"></script>

    <script>
        function data() {
            let w = window.innerWidth;
            let select = 4;
            if(w > 768){
                if(window.location.hash) {
                    if(window.location.hash == '#questions'){
                        select = 2
                    }else{
                        select = 1
                    }
                }else{
                    select = 1
                }
            }
            return {
                selected: select,
                opt (opt){
                    this.selected = opt
                },
                movile: true
            }
        }
    </script>
@endpush
</div>
