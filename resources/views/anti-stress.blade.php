<x-app-layout>
    <div id="meditationApp"
        class="h-dvh w-full overflow-hidden transition-colors duration-1000 ease-in-out font-sans"
        x-data="meditation()"
        x-init="init()"
        :class="bgClass">

        <div class="fixed inset-0 -z-10 bg-[#0000005f]"></div>

        <section x-show="phase === 'home'" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            class="flex flex-col items-center justify-center h-full w-full px-6 text-center">

            <p class="reveal text-sm font-medium uppercase tracking-widest mb-3 text-orange-400 dark:text-sky-400">Exercice de respiration</p>

            <h1 class="reveal text-4xl md:text-5xl font-bold mb-4 leading-tight"
                :class="'text-slate-100'">
                Prenez un moment<br>pour vous.
            </h1>

            <p class="reveal text-base max-w-sm mb-12 leading-relaxed"
                :class="'text-slate-400'">
                Choisissez une durée et laissez-vous guider dans un exercice de respiration apaisante.
            </p>

            <div class="reveal grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6 w-full max-w-lg">
                <template x-for="opt in durationOptions" :key="opt.value">
                    <button
                        @click="selectDuration(opt.value)"
                        class="py-4 rounded-lg font-semibold text-sm transition-all duration-200 border-2
                   bg-white border-slate-200 text-slate-600
                   hover:border-orange-300 hover:text-orange-500
                   dark:bg-slate-800 dark:border-slate-700 dark:text-slate-300
                   dark:hover:border-sky-600 dark:hover:text-sky-300"
                        :class="selectedDuration === opt.value
                ? 'bg-orange-500 border-orange-400 text-black dark:bg-sky-600 dark:border-sky-500 dark:text-white scale-105'
                : ''">
                        <span x-text="opt.label"></span>
                    </button>
                </template>
            </div>

            <div class="reveal flex items-center gap-3 mb-10">
                <label class="text-sm" :class="'text-slate-400'">Personnalisé :</label>
                <input type="number" min="1" max="60"
                    x-model.number="customMinutes"
                    @input="selectDuration('custom')"
                    class="w-20 text-center py-2 px-3 rounded-lg border-2 text-sm font-semibold outline-none transition-all
                    bg-white border-slate-200 text-slate-700
                    focus:border-orange-400
                    dark:bg-slate-800 dark:border-slate-600 dark:text-slate-200 dark:focus:border-sky-500" />
                <span class="text-sm" :class="isDark ? 'text-slate-400' : 'text-slate-500'">min</span>
            </div>

            <button
                @click="startSession()"
                :disabled="!selectedDuration"
                class="reveal px-10 py-4 rounded-xl text-white font-bold text-base transition-all duration-200 shadow-lg
                disabled:opacity-40 disabled:cursor-not-allowed
                bg-orange-500 hover:bg-orange-400 hover:scale-105 hover:shadow-orange-300/50
                shadow-orange-200
                dark:bg-sky-600 dark:hover:bg-sky-500 dark:hover:shadow-sky-700/40 dark:shadow-sky-900/50">
                Commencer la séance
            </button>
        </section>

        <section x-show="phase === 'session'" x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            class="flex flex-col items-center justify-center h-full w-full px-6 text-center relative">

            <div class="absolute top-6 right-6">
                <span class="text-xs font-mono font-medium px-3 py-1 rounded-full bg-slate-800/70 text-slate-400"
                    x-text="formatTime(remaining)"></span>
            </div>

            <p class="text-sm font-medium uppercase tracking-widest mb-8 transition-all duration-500 dark:text-sky-300 text-orange-400"
                x-text="currentStep.eyebrow"></p>

           <div class="relative flex items-center justify-center mb-10 w-72 h-72">
    <!-- Halo flou -->
    <div
        class="absolute w-48 h-48 rounded-full blur-[80px] opacity-50 transition-transform ease-in-out"
        :style="`
            transform: scale(${currentStep.scaleOuter});
            background: ${currentStep.haloColor};
            transition-duration: ${currentStep.duration}ms;
        `">
    </div>

    <!-- Cercle principal -->
    <div
        class="absolute w-48 h-48 rounded-full flex items-center justify-center
               backdrop-blur-xl border border-white/20
               transition-transform ease-in-out z-10"
        :style="`
            transform: scale(${currentStep.scaleInner});
            background: ${currentStep.gradient};
            transition-duration: ${currentStep.duration}ms;
        `">

        <span
            class="font-light text-4xl tabular-nums tracking-tighter text-white"
            x-text="countdown > 0 ? countdown : ''">
        </span>

    </div>
</div>

            <p class="text-3xl md:text-4xl font-bold mb-3 transition-all duration-700"
                :class="'text-slate-100'"
                x-text="currentStep.phrase"></p>

            <p class="text-base mb-12 transition-all duration-700"
                :class="'text-slate-400'"
                x-text="currentStep.subPhrase"></p>

           <div class="w-full max-w-xs h-1 rounded-full mb-8 dark:bg-slate-700 bg-slate-200">
                <div class="h-1 rounded-full transition-all duration-1000 dark:bg-sky-400 bg-orange-400"
                    :style="`width: ${progressPercent}%`"></div>
            </div>

            <button @click="stopSession()"
                class="text-sm font-medium underline underline-offset-4 transition-all duration-1000 text-slate-400 hover:text-slate-600">
                Arrêter la séance
            </button>
        </section>

        <section x-show="phase === 'done'" x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            class="flex flex-col items-center justify-center h-full w-full px-6 text-center">

            <div class="w-20 h-20 rounded-full flex items-center justify-center mb-8 shadow-xl dark:text-sky-300 text-orange-400">
                <svg class="w-10 h-10 dark:text-sky-300 text-orange-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                </svg>
            </div>

            <h2 class="text-3xl font-bold mb-3" :class="'text-slate-100'">
                Bien joué 🌿
            </h2>
            <p class="text-base max-w-xs mb-10 leading-relaxed" :class="'text-slate-400'">
                Vous avez pris soin de vous. Continuez à respirer doucement et profitez de ce moment de calme.
            </p>

            <button @click="phase = 'home'; selectedDuration = null"
                class="px-8 py-3 rounded-full text-white font-semibold transition-all duration-200 hover:scale-105 dark:bg-sky-600 dark:hover:bg-sky-500 bg-orange-500 hover:bg-orange-400">
                Nouvelle séance
            </button>
        </section>
    </div>

    <script src="{{ asset('assets/js/meditation.js') }}"></script>
    <script src="{{ asset('assets/js/anims.js') }}"></script>
</x-app-layout>