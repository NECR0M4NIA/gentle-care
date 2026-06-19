<nav class="fixed top-0 left-1/2 -translate-x-1/2 z-[9999] w-[calc(100%-2rem)] max-w-7xl mt-4 rounded-2xl px-6 py-3 flex items-center justify-center gap-8"
    style="background: rgba(255,255,255,0.08); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.15);">

    {{-- Liens --}}
    @if(auth()->user() && auth()->user()->role === 'user')
    <x-nav-link :active="request()->routeIs('dashboard')" :href="route('dashboard')" class="text-white font-semibold hover:text-blue-300 transition">Dashboard</x-nav-link>
    <x-nav-link :active="request()->routeIs('videos')" :href="route('videos')" class="text-white font-semibold hover:text-blue-300 transition">Vidéos</x-nav-link>
    <x-nav-link :active="request()->routeIs('anti-stress')" :href="route('anti-stress')" class="text-white font-semibold hover:text-blue-300 transition">Anti-stress</x-nav-link>
    <x-nav-link :active="request()->routeIs('playground')" :href="route('playground')" class="text-white font-semibold hover:text-blue-300 transition">Playground</x-nav-link>
    <x-nav-link :active="request()->routeIs('a-propos')" :href="route('a-propos')" class="text-white font-semibold hover:text-blue-300 transition">À Propos</x-nav-link>
    <x-nav-link :active="request()->routeIs('avis')" :href="route('avis')" class="text-white font-semibold hover:text-blue-300 transition">Avis</x-nav-link>
    @else
    <x-nav-link :active="request()->routeIs('dashboard')" :href="route('dashboard')" class="text-white font-semibold hover:text-blue-300 transition">Dashboard</x-nav-link>
    <x-nav-link :active="request()->routeIs('admin')" :href="route('admin')" class="text-white font-semibold hover:text-blue-300 transition">Admin</x-nav-link>
    @endif

    {{-- Avatar --}}
    {{-- Dans ta navbar, remplace le bouton user par ceci --}}
    <div class="relative" x-data="{ open: false }">

        {{-- Bouton avatar --}}
        @if(auth()->user() && auth()->user()->role === 'user')
        <button @click="open = !open" @click.outside="open = false"
            class="w-9 h-9 rounded-full flex items-center justify-center transition"
            style="background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.3);"
            aria-label="Menu utilisateur">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="8" r="4" />
                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
            </svg>
        </button>
        @else
        <button @click="open = !open" @click.outside="open = false"
            class="w-9 h-9 rounded-full flex items-center justify-center transition"
            style="background: rgba(255, 115, 0, 0.15); border: 1.5px solid rgba(255, 123, 0, 0.28);"
            aria-label="Menu utilisateur">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="8" r="4" />
                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
            </svg>
        </button>
        @endif

        {{-- Dropdown --}}
        <div x-show="open" x-transition
            class="absolute right-0 mt-2 w-52 rounded-xl py-2 z-50"
            style="background: rgba(20,15,45,0.92); border: 1px solid rgba(255,255,255,0.2);">

            {{-- Infos utilisateur --}}
            <div class="px-4 py-2 border-b" style="border-color: rgba(255,255,255,0.12);">
                <p class="text-white text-sm font-medium">{{ Auth::user()->name }}</p>
                <p class="text-xs" style="color: rgba(255,255,255,0.45);">{{ Auth::user()->email }}</p>
            </div>

            {{-- Voir le profil --}}
            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-3 px-4 py-2 text-sm transition"
                style="color: rgba(255,255,255,0.8);"
                onmouseover="this.style.background='rgba(255,255,255,0.1)'"
                onmouseout="this.style.background='transparent'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                </svg>
                Mon profil
            </a>

            <div class="my-1 mx-3" style="height:1px; background: rgba(255,255,255,0.1);"></div>

            {{-- Déconnexion --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 w-full px-4 py-2 text-sm transition text-left"
                    style="color: rgba(255,120,100,0.9); background: transparent;"
                    onmouseover="this.style.background='rgba(255,80,60,0.15)'"
                    onmouseout="this.style.background='transparent'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                    Se déconnecter
                </button>
            </form>

        </div>
    </div>
</nav>