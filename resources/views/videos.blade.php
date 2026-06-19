<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 flex flex-col gap-12">

        <h2 class="text-white text-center text-4xl font-bold mt-10">
            Rechercher une vidéo
        </h2>

        <form method="GET" action="{{ route('videos') }}" class="flex justify-center mt-6">
            <div class="relative w-full max-w-xl">

                <div class="flex items-center bg-white/30 dark:bg-white/10 backdrop-blur-md border border-white/40 rounded-2xl shadow-lg px-4 py-3 hover:bg-white/40 dark:hover:bg-white/20 transition">

                    <div class="text-white/80 mr-3 flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m21 21-4.35-4.35m1.85-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                        </svg>
                    </div>


                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher..."
                        class="w-full bg-transparent text-white 
                        outline-none ring-0 focus:ring-0 focus:outline-none focus:shadow-none
                        focus-visible:ring-0 focus-visible:outline-none">
                </div>

            </div>
        </form>

        <h3 class="text-white text-3xl font-bold">
            Recommandation
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @for ($i = 1; $i <= 9; $i++)
                <div class="rounded-xl overflow-hidden shadow">

                <img
                    src="https://picsum.photos/500/350?random={{ $i }}"
                    class="w-full h-48 object-cover rounded-xl"
                    alt="Image {{ $i }}">

                <div class="pt-4">
                    <h3 class="text-white text-lg font-semibold">
                        Video {{ $i }}
                    </h3>

                    <p class="text-white text-sm mt-1">
                        Ceci est la description pour la vidéo {{ $i }}.
                    </p>
                </div>

        </div>
        @endfor

    </div>

    <div class="text-center space-y-2 pb-10">
        <h3 class="text-white text-3xl font-bold">
            Vous ne trouvez pas ce qu’il vous faut ?
        </h3>

        <p class="text-white text-3xl font-bold">
            <span class="underline decoration-2 underline-offset-4">Recherchez</span> avec des mots-clés
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @for ($i = 1; $i <= 9; $i++)
            <div class="rounded-xl overflow-hidden shadow">

            <img
                src="https://picsum.photos/500/350?random={{ $i }}"
                class="w-full h-48 object-cover rounded-xl"
                alt="Image {{ $i }}">

            <div class="pt-4">
                <h3 class="text-white text-lg font-semibold">
                    Video Recherchée {{ $i }}
                </h3>

                <p class="text-white text-sm mt-1">
                    Ceci est la description pour la vidéo {{ $i }}.
                </p>
            </div>

    </div>
    @endfor

    </div>
    </div>
</x-app-layout>