<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-12">

        <h2 class="reveal opacity-0 text-white text-center text-4xl font-bold mt-10">
            Rechercher une vidéo
        </h2>

        <h3 class="reveal opacity-0 text-white text-3xl font-bold">
            Recommandation
        </h3>

        <div class="reveal opacity-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($videos as $video)
            <div class="reveal opacity-0 rounded-xl overflow-hidden shadow">

                <img
                    src="https://img.youtube.com/vi/{{ Str::between($video->url, 'watch?v=', '&') ?: Str::afterLast($video->url, 'watch?v=') }}/hqdefault.jpg"
                    class="w-full h-48 object-cover rounded-xl"
                    alt="{{ $video->titre }}">

                <div class="pt-4">
                    <h3 class="reveal opacity-0 text-white text-lg font-semibold">
                        {{ $video->titre }}
                    </h3>

                    <a href="{{ $video->url }}"
                        target="_blank"
                        class="inline-block mt-3 text-sm text-orange-400 hover:text-orange-300 font-semibold">
                        ▶ Regarder la vidéo
                    </a>
                </div>

            </div>
            @endforeach
        </div>
    </div>
    <script src="/assets/js/anims.js"></script>
</x-app-layout>