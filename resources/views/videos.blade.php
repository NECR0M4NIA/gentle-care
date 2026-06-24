<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-12">

        <h2 class="reveal opacity-0 text-white text-center text-4xl font-bold mt-10">
            Rechercher une vidéo
        </h2>

        <form method="GET" action="{{ route('videos') }}" class="flex justify-center mt-6">
            <div class="reveal opacity-0 relative w-full max-w-xl">

                <div class="reveal opacity-0 flex items-center bg-white/30 dark:bg-white/10 backdrop-blur-md border border-white/40 rounded-2xl shadow-lg px-4 py-3 hover:bg-white/40 dark:hover:bg-white/20 transition">

                    <button
                        type="submit"
                        class="reveal opacity-0 text-white/80 mr-3 flex items-center hover:text-white transition cursor-pointer"
                        aria-label="Rechercher">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m21 21-4.35-4.35m1.85-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                        </svg>
                    </button>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher..."
                        class="reveal opacity-0 w-full bg-transparent text-white 
                        outline-none border-none ring-0 focus:ring-0 focus:outline-none focus:shadow-none
                        focus-visible:ring-0 focus-visible:outline-none">
                </div>

            </div>
        </form>

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