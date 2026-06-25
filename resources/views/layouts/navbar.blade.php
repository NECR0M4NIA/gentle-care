<nav class="flex flex-row items-center bg-white/30 dark:bg-white/10 backdrop-filter: blur(12px); border border-white/40 rounded-2xl w-full justify-between py-6 px-6 shadow-lg">
    <div class="flex gap-6 text-white font-medium">
        <a class="block dark:hidden transition pointer hover:opacity-[0.5] hover:scale-[1.05]" href="/"><img class="w-[56px]" src="/assets/icons/gentle-care-orange.svg" alt=""></a>
        <a class="hidden dark:block transition pointer hover:opacity-[0.5] hover:scale-[1.05]" href="/"><img class="w-[56px]" src="/assets/icons/gentle-care-blue.svg" alt=""></a>
    </div>

   <h1 class="absolute left-1/2 -translate-x-1/2 text-4xl text-white font-bold drop-shadow-sm {{ request()->is('history') ? '' : 'hidden md:block' }}"> {{ request()->is('history') ? 'Histoire' : 'Gentle Care' }}</h1>
    @if (!request()->is('history'))
    <div class="flex flex-row gap-4 items-center">
        <a class="border-2 border-white/60 rounded-xl bg-transparent text-white py-1.5 px-4 hover:bg-white/10 transition-all" href="/register">S'enregistrer</a>
        <a class="rounded-xl bg-[#FF8D28] dark:bg-[#4B83F5] hover:bg-[#e08f3e] dark:hover:bg-[#566495] text-white py-1.5 px-4 shadow-sm transition-all" href="/login">Se connecter</a>
    </div>
    @endif
</nav>