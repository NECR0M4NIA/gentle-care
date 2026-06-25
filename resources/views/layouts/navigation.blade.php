<nav class="fixed text-center top-0 left-1/2 -translate-x-1/2 z-[9999] w-[calc(100%-2rem)] max-w-7xl mt-4 rounded-2xl px-6 py-3 flex items-center justify-center gap-8"
    style="background: rgba(255,255,255,0.08); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15);">

    <div class="rounded-lg w-full bg-red-500/20 backdrop-blur-sm border-b border-red-400/20 py-2 px-4">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-center gap-4 text-sm text-white/80">
            <span class="font-semibold text-white">🆘 Besoin d'aide ?</span>

            <span class="md:hidden relative flex items-center gap-2">
                - Appelez ces numéro
                📞 <span class="font-bold text-white">3020</span>
                📞 <span class="font-bold text-white">3114</span>
            </span>

            <span class="hidden md:flex flex items-center gap-2">
                📞 <span class="font-bold text-white">3114</span> — Prévention du suicide - Gratuit - 24h/24
            </span>

            <span class="hidden md:flex flex items-center gap-2">
                📞 <span class="font-bold text-white">3020</span> — Harcèlement scolaire - Gratuit - Lun–Ven
            </span>
        </div>
    </div>

    <div class="hidden md:flex items-center gap-4">
        @if(auth()->user() && auth()->user()->role === 'user')
            <x-nav-link :active="request()->routeIs('dashboard')" :href="route('dashboard')" class="text-white font-semibold hover:text-blue-300 transition">Dashboard</x-nav-link>
            <x-nav-link :active="request()->routeIs('videos')" :href="route('videos')" class="text-white font-semibold hover:text-blue-300 transition">Vidéos</x-nav-link>
            <x-nav-link :active="request()->routeIs('anti-stress')" :href="route('anti-stress')" class="text-white font-semibold hover:text-blue-300 transition">Anti-stress</x-nav-link>
            <x-nav-link :active="request()->routeIs('playground')" :href="route('playground')" class="text-white font-semibold hover:text-blue-300 transition">Playground</x-nav-link>
            <x-nav-link :active="request()->routeIs('a-propos')" :href="route('a-propos')" class="text-white font-semibold hover:text-blue-300 transition">À Propos</x-nav-link>
            <x-nav-link :active="request()->routeIs('avis')" :href="route('avis')" class="text-white font-semibold hover:text-blue-300 transition">Avis</x-nav-link>
        @else
            <x-nav-link :active="request()->routeIs('dashboard')" :href="route('dashboard')" class="text-white font-semibold hover:text-blue-300 transition">Dashboard</x-nav-link>
        @endif
    </div>

    <div class="md:hidden relative" x-data="{ open: false }">

        <button @click="open = !open"
            class="w-10 h-10 flex items-center justify-center rounded-lg"
            style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25);">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div x-show="open" x-transition @click.outside="open = false"
            class="absolute right-0 mt-3 w-52 rounded-xl py-2 z-50"
            style="background: rgba(20,15,45,0.92); border: 1px solid rgba(255,255,255,0.2);">

            @if(auth()->user() && auth()->user()->role === 'user')
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-white text-sm">Dashboard</a>
                <a href="{{ route('videos') }}" class="block px-4 py-2 text-white text-sm">Vidéos</a>
                <a href="{{ route('anti-stress') }}" class="block px-4 py-2 text-white text-sm">Anti-stress</a>
                <a href="{{ route('playground') }}" class="block px-4 py-2 text-white text-sm">Playground</a>
                <a href="{{ route('a-propos') }}" class="block px-4 py-2 text-white text-sm">À Propos</a>
                <a href="{{ route('avis') }}" class="block px-4 py-2 text-white text-sm">Avis</a>

                <div class="my-1 mx-3" style="height:1px; background: rgba(255,255,255,0.1);"></div>
            @else
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-white text-sm">Dashboard</a>
            @endif

        </div>
    </div>

    <div class="relative" x-data="{ open: false }">

        <button @click="open = !open"
            class="w-9 h-9 rounded-full flex items-center justify-center transition"
            style="background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.3);">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white"
                fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4" />
                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
            </svg>
        </button>

        <div x-show="open" x-transition
            class="absolute right-0 mt-2 w-52 rounded-xl py-2 z-50"
            style="background: rgba(20,15,45,0.92); border: 1px solid rgba(255,255,255,0.2);">

            <div class="px-4 py-2 border-b" style="border-color: rgba(255,255,255,0.12);">
                <p class="text-white text-sm font-medium">{{ Auth::user()->name }}</p>
                <p class="text-xs" style="color: rgba(255,255,255,0.45);">{{ Auth::user()->email }}</p>
            </div>

            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-3 px-4 py-2 text-sm transition text-white/80 hover:bg-white/10">
                Mon profil
            </a>

            <div class="my-1 mx-3" style="height:1px; background: rgba(255,255,255,0.1);"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 w-full px-4 py-2 text-sm text-red-300 hover:bg-red-500/20 text-left">
                    Se déconnecter
                </button>
            </form>

        </div>
    </div>

</nav>