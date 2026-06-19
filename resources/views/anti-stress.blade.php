<style>
    html,
    body {
        overflow: hidden !important;
        height: 100dvh !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    #meditationApp {
        height: 100dvh !important;
        width: 100vw !important;
        overflow: hidden !important;
    }
</style>

<x-app-layout>
    {{-- resources/views/meditation.blade.php --}}

    <div id="meditationApp" class="h-dvh w-full bg-[#0000005f] transition-colors duration-1000 ease-in-out font-sans"
        x-data="meditation()"
        x-init="init()"
        :class="bgClass">

        <section x-show="phase === 'home'" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            class="flex flex-col items-center justify-center h-full w-full px-6 text-center">

            <p class="reveal text-sm font-medium uppercase tracking-widest mb-3"
                :class="isDark ? 'text-sky-400' : 'text-orange-400'">Exercice de respiration</p>

            <h1 class="reveal text-4xl md:text-5xl font-bold mb-4 leading-tight"
                :class="isDark ? 'text-slate-100' : 'text-slate-800'">
                Prenez un moment<br>pour vous.
            </h1>

            <p class="reveal text-base max-w-sm mb-12 leading-relaxed"
                :class="isDark ? 'text-slate-400' : 'text-slate-500'">
                Choisissez une durée et laissez-vous guider dans un exercice de respiration apaisante.
            </p>

            {{-- Grille des durées --}}
            <div class="reveal grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6 w-full max-w-lg">
                <template x-for="opt in durationOptions" :key="opt.value">
                    <button @click="selectDuration(opt.value)"
                        :class="[
                            'py-4 rounded-lg font-semibold text-sm transition-all duration-200 border-2',
                            selectedDuration === opt.value
                                ? (isDark ? 'bg-sky-600 border-sky-500 text-white scale-105' : 'bg-orange-500 border-orange-400 text-white scale-105')
                                : (isDark ? 'bg-slate-800 border-slate-700 text-slate-300 hover:border-sky-600 hover:text-sky-300' : 'bg-white border-slate-200 text-slate-600 hover:border-orange-300 hover:text-orange-500')
                        ]">
                        <span x-text="opt.label"></span>
                    </button>
                </template>
            </div>

            {{-- Durée personnalisée --}}
            <div class="reveal flex items-center gap-3 mb-10">
                <label class="text-sm" :class="isDark ? 'text-slate-400' : 'text-slate-500'">Personnalisé :</label>
                <input type="number" min="1" max="60" x-model.number="customMinutes"
                    @input="selectDuration('custom')"
                    class="w-20 text-center py-2 px-3 rounded-lg border-2 text-sm font-semibold outline-none transition-all"
                    :class="isDark
                        ? 'bg-slate-800 border-slate-600 text-slate-200 focus:border-sky-500'
                        : 'bg-white border-slate-200 text-slate-700 focus:border-orange-400'" />
                <span class="text-sm" :class="isDark ? 'text-slate-400' : 'text-slate-500'">min</span>
            </div>

            {{-- Bouton démarrer --}}
            <button @click="startSession()"
                :disabled="!selectedDuration"
                class="reveal px-10 py-4 rounded-xl text-white font-bold text-base transition-all duration-200 shadow-lg disabled:opacity-40 disabled:cursor-not-allowed"
                :class="isDark
                    ? 'bg-sky-600 hover:bg-sky-500 hover:shadow-sky-700/40 hover:scale-105 shadow-sky-900/50'
                    : 'bg-orange-500 hover:bg-orange-400 hover:shadow-orange-300/50 hover:scale-105 shadow-orange-200'">
                Commencer la séance
            </button>
        </section>

        {{-- ══════════════════════════════════════════════
             ÉCRAN SESSION
        ══════════════════════════════════════════════ --}}
        <section x-show="phase === 'session'" x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            class="flex flex-col items-center justify-center h-full w-full px-6 text-center relative">

            {{-- Timer restant --}}
            <div class="absolute top-6 right-6">
                <span class="text-xs font-mono font-medium px-3 py-1 rounded-full"
                    :class="isDark ? 'bg-slate-800/70 text-slate-400' : 'bg-white/70 text-slate-500'"
                    x-text="formatTime(remaining)"></span>
            </div>

            {{-- Phrase relaxante --}}
            <p class="text-sm font-medium uppercase tracking-widest mb-8 transition-all duration-500"
                :class="isDark ? 'text-sky-300' : 'text-orange-400'"
                x-text="currentStep.eyebrow"></p>

            {{-- Cercle animé --}}
            <div class="relative flex items-center justify-center mb-10 w-72 h-72">

                {{-- Halo externe (flou et doux) --}}
                <div class="absolute w-48 h-48 rounded-full transition-transform ease-in-out blur-xl opacity-40"
                    :style="`
                     transform: scale(${currentStep.scaleOuter});
                     background: ${isDark ? currentStep.haloColorDark : currentStep.haloColorLight};
                     transition-duration: ${currentStep.duration}ms;
                 `"></div>

                {{-- Cercle principal (Glassmorphism) --}}
                <div class="absolute w-48 h-48 rounded-full flex items-center justify-center shadow-[0_0_40px_rgba(0,0,0,0.1)] backdrop-blur-md border transition-transform ease-in-out z-10"
                    :class="isDark ? 'border-white/10 text-white' : 'border-white/50 text-slate-700'"
                    :style="`
                     transform: scale(${currentStep.scaleInner});
                     background: ${isDark ? currentStep.gradientDark : currentStep.gradientLight};
                     transition-duration: ${currentStep.duration}ms;
                 `">
                    <span class="font-light text-4xl tabular-nums tracking-tighter drop-shadow-md"
                        x-text="countdown > 0 ? countdown : ''"></span>
                </div>
            </div>

            {{-- Phrase principale --}}
            <p class="text-3xl md:text-4xl font-bold mb-3 transition-all duration-700"
                :class="isDark ? 'text-slate-100' : 'text-slate-800'"
                x-text="currentStep.phrase"></p>

            <p class="text-base mb-12 transition-all duration-700"
                :class="isDark ? 'text-slate-400' : 'text-slate-500'"
                x-text="currentStep.subPhrase"></p>

            {{-- Barre de progression --}}
            <div class="w-full max-w-xs h-1 rounded-full mb-8"
                :class="isDark ? 'bg-slate-700' : 'bg-slate-200'">
                <div class="h-1 rounded-full transition-all duration-1000"
                    :class="isDark ? 'bg-sky-400' : 'bg-orange-400'"
                    :style="`width: ${progressPercent}%`"></div>
            </div>

            {{-- Bouton stop --}}
            <button @click="stopSession()"
                class="text-sm font-medium underline underline-offset-4 transition-colors"
                :class="isDark ? 'text-slate-500 hover:text-slate-300' : 'text-slate-400 hover:text-slate-600'">
                Arrêter la séance
            </button>
        </section>

        {{-- ══════════════════════════════════════════════
             ÉCRAN FIN
        ══════════════════════════════════════════════ --}}
        <section x-show="phase === 'done'" x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            class="flex flex-col items-center justify-center h-full w-full px-6 text-center">

            <div class="w-20 h-20 rounded-full flex items-center justify-center mb-8 shadow-xl"
                :class="isDark ? 'bg-sky-600/30' : 'bg-orange-100'">
                <svg class="w-10 h-10" :class="isDark ? 'text-sky-300' : 'text-orange-400'" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
                </svg>
            </div>

            <h2 class="text-3xl font-bold mb-3" :class="isDark ? 'text-slate-100' : 'text-slate-800'">
                Bien joué 🌿
            </h2>
            <p class="text-base max-w-xs mb-10 leading-relaxed" :class="isDark ? 'text-slate-400' : 'text-slate-500'">
                Vous avez pris soin de vous. Continuez à respirer doucement et profitez de ce moment de calme.
            </p>

            <button @click="phase = 'home'; selectedDuration = null"
                class="px-8 py-3 rounded-full text-white font-semibold transition-all duration-200 hover:scale-105"
                :class="isDark ? 'bg-sky-600 hover:bg-sky-500' : 'bg-orange-500 hover:bg-orange-400'">
                Nouvelle séance
            </button>
        </section>
    </div>

    <script src="assets/js/meditation.js"></script>
    <script src="/assets/js/anims.js"></script>
</x-app-layout>