<x-app-layout>
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 flex flex-col items-center gap-8 py-16">

        @if ($score <= 20)
            {{-- 🟢 Vert --}}
            <div class="w-20 h-20 rounded-full bg-green-400 flex items-center justify-center text-4xl">🟢</div>
    <h1 class="text-4xl text-white font-bold text-center">Tout va bien !</h1>
    <p class="text-xl text-white text-center opacity-90">
        Tu rayonnes d'une belle énergie en ce moment. Continue à prendre soin de toi comme tu le fais —
        tes petites habitudes bienveillantes font toute la différence. Tu es sur la bonne voie 💚
    </p>

    @elseif ($score <= 40)
        {{-- 🟡 Jaune --}}
        <div class="w-20 h-20 rounded-full bg-yellow-400 flex items-center justify-center text-4xl">🟡</div>
        <h1 class="text-4xl text-white font-bold text-center">Petit coup de mou passager</h1>
        <p class="text-xl text-white text-center opacity-90">
            C'est tout à fait normal d'avoir des périodes de stress ou de fatigue.
            Voici quelques exercices de respiration qui peuvent t'aider à retrouver ton calme 🌬️
        </p>
        <!-- <div class="flex flex-col gap-4 w-full mt-2">
                <a href="/videos"
                   target="_blank"
                   class="bg-yellow-100 text-yellow-900 rounded-xl px-6 py-4 font-bold text-lg text-center hover:bg-yellow-200 transition">
                    🎥 Voir des vidéos de respiration guidée
                </a>
            </div> -->
        @if (!empty($videos))
        <div class="flex flex-col gap-4 w-full">
            @foreach ($videos as $video)
            <div class="rounded-xl overflow-hidden">
                <iframe
                    width="100%"
                    height="250"
                    src="https://www.youtube.com/embed/{{ $video['id']['videoId'] }}"
                    frameborder="0"
                    allowfullscreen>
                </iframe>
                <p class="text-white text-sm mt-1 opacity-70">
                    {{ $video['snippet']['title'] }}
                </p>
            </div>
            @endforeach
        </div>
        @endif

        @else
        {{-- 🔴 Rouge --}}
        <div class="w-20 h-20 rounded-full bg-red-400 flex items-center justify-center text-4xl">🔴</div>
        <h1 class="text-4xl text-white font-bold text-center">Tu traverses une période difficile</h1>
        <p class="text-xl text-white text-center opacity-90">
            Ce que tu vis en ce moment est réel, et tu n'as pas à le traverser seul(e).
            Il n'y a rien de honteux à avoir besoin d'aide, c'est même un acte de courage 💙
        </p>
        <p class="text-lg text-white text-center opacity-80">
            Des professionnels bienveillants sont disponibles gratuitement, 24h/24, en toute confidentialité :
        </p>
        <div class="flex flex-col gap-4 w-full">
            <div class="bg-blue-100 text-blue-900 rounded-xl px-6 py-4">
                <p class="font-bold text-lg">📞 3114 — Numéro national de prévention du suicide</p>
                <p class="text-sm mt-1">Disponible 24h/24, 7j/7 - Gratuit - Confidentiel</p>
            </div>
            <div class="bg-blue-100 text-blue-900 rounded-xl px-6 py-4">
                <p class="font-bold text-lg">📞 Fil Santé Jeunes - 3114 ou 0 800 235 236</p>
                <p class="text-sm mt-1">Pour les jeunes - Gratuit - Disponible tous les jours</p>
            </div>
            <div class="bg-blue-100 text-blue-900 rounded-xl px-6 py-4">
                <p class="font-bold text-lg">💬 Chat sur filsantejeunes.com</p>
                <p class="text-sm mt-1">Si tu préfères écrire plutôt que parler</p>
            </div>
        </div>
        @endif

        {{-- Score (optionnel : tu peux le masquer) --}}
        <p class="text-white opacity-40 text-sm mt-4">Score : {{ $score }} / 60</p>

        </div>
</x-app-layout>