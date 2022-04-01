<x-app-layout>

    <section class="bg-fixed bg-cover min-h-screen pb-16" style="background-image: url({{asset('img/backgrounds/ea857aff-1a05-4f66.jpg')}})">
        <div class="w-full md:w-3/4 lg:w-3/4 text-center mx-auto py-12 ">
            <div class="w-full md:w-3/4 lg:w-3/4 text-center mx-auto">
                <p class="text-red-700 text-sm md:text-xl">{{$data['type']}}</p>
                <h1 class="text-gray-900 leading-none font-black text-2xl md:text-5xl">{{$data['video-title']}}</h1>
                <p class="text-gray-900 my-2 md:text-xl">
                    {{$data['title']}} {{$data['subtitle']}}
                </p>
                <div class="mx-auto max-w-sm border-dotted border-b-4 my-4 border-accent-400"></div>
                <p class="text-sm md:text-base">
                    <i class="fas fa-arrow-alt-circle-down"></i> Para comenzar haz click en el botón del video.
                </p>
                <div class="my-8 mx-auto">
                    <iframe src="https://player.vimeo.com/video/{{$data['video-base']}}?autoplay=1&loop=0&autopause=1" class=" w-full h-52 md:h-96" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>

