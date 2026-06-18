<style>
    /* 1. On bloque le scroll sur l'ensemble de la page */
    html, body {
        overflow: hidden !important;
        height: 100dvh !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* 2. On force le contenu principal du layout à faire exactement la taille de l'écran */
    #meditationApp {
        height: 100dvh !important;
        width: 100vw !important;
        overflow: hidden !important;
    }
</style>

<x-app-layout>
    {{-- resources/views/meditation.blade.php --}}

    <div id="meditationApp" class="h-dvh w-full transition-colors duration-1000 ease-in-out font-sans"
        x-data="meditation()"
        x-init="init()"
        :class="bgClass">

        {{-- ══════════════════════════════════════════════
             ÉCRAN ACCUEIL
        ══════════════════════════════════════════════ --}}
        <section x-show="phase === 'home'" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            class="flex flex-col items-center justify-center h-full w-full px-6 text-center">

            <p class="text-sm font-medium uppercase tracking-widest mb-3"
                :class="isDark ? 'text-sky-400' : 'text-orange-400'">Exercice de respiration</p>

            <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight"
                :class="isDark ? 'text-slate-100' : 'text-slate-800'">
                Prenez un moment<br>pour vous.
            </h1>

            <p class="text-base max-w-sm mb-12 leading-relaxed"
                :class="isDark ? 'text-slate-400' : 'text-slate-500'">
                Choisissez une durée et laissez-vous guider dans un exercice de respiration apaisante.
            </p>

            {{-- Grille des durées --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6 w-full max-w-lg">
                <template x-for="opt in durationOptions" :key="opt.value">
                    <button @click="selectDuration(opt.value)"
                        :class="[
                            'py-4 rounded-2xl font-semibold text-sm transition-all duration-200 border-2',
                            selectedDuration === opt.value
                                ? (isDark ? 'bg-sky-600 border-sky-500 text-white scale-105' : 'bg-orange-500 border-orange-400 text-white scale-105')
                                : (isDark ? 'bg-slate-800 border-slate-700 text-slate-300 hover:border-sky-600 hover:text-sky-300' : 'bg-white border-slate-200 text-slate-600 hover:border-orange-300 hover:text-orange-500')
                        ]">
                        <span x-text="opt.label"></span>
                    </button>
                </template>
            </div>

            {{-- Durée personnalisée --}}
            <div class="flex items-center gap-3 mb-10">
                <label class="text-sm" :class="isDark ? 'text-slate-400' : 'text-slate-500'">Personnalisé :</label>
                <input type="number" min="1" max="60" x-model.number="customMinutes"
                    @input="selectDuration('custom')"
                    class="w-20 text-center py-2 px-3 rounded-xl border-2 text-sm font-semibold outline-none transition-all"
                    :class="isDark
                        ? 'bg-slate-800 border-slate-600 text-slate-200 focus:border-sky-500'
                        : 'bg-white border-slate-200 text-slate-700 focus:border-orange-400'" />
                <span class="text-sm" :class="isDark ? 'text-slate-400' : 'text-slate-500'">min</span>
            </div>

            {{-- Bouton démarrer --}}
            <button @click="startSession()"
                :disabled="!selectedDuration"
                class="px-10 py-4 rounded-full text-white font-bold text-base transition-all duration-200 shadow-lg disabled:opacity-40 disabled:cursor-not-allowed"
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

    <script>
        function meditation() {
            return {
                isDark: window.matchMedia('(prefers-color-scheme: dark)').matches,
                phase: 'home',

                durationOptions: [{
                        label: '1 minute',
                        value: 1
                    },
                    {
                        label: '2 minutes',
                        value: 2
                    },
                    {
                        label: '5 minutes',
                        value: 5
                    },
                    {
                        label: '10 minutes',
                        value: 10
                    },
                ],
                selectedDuration: null,
                customMinutes: 3,

                totalSeconds: 0,
                remaining: 0,
                sessionTimer: null,
                stepTimer: null,
                countdown: 4,
                countdownTimer: null,

                stepIndex: 0,
                // Synchronisation des clés JS avec les scales demandés par le HTML
                steps: [{
                        key: 'inhale',
                        eyebrow: 'Inspirez',
                        phrase: 'Respirez profondément',
                        subPhrase: 'Remplissez vos poumons lentement...',
                        duration: 4000,
                        scaleInner: 1.4,
                        scaleOuter: 1.7,
                        gradientDark: 'radial-gradient(circle, #3b82f6, #1d4ed8)',
                        gradientLight: 'radial-gradient(circle, #fb923c, #ea580c)',
                        haloColorDark: '#3b82f6',
                        haloColorLight: '#fed7aa',
                    },
                    {
                        key: 'hold',
                        eyebrow: 'Retenez',
                        phrase: 'Gardez votre souffle',
                        subPhrase: 'Restez dans ce calme...',
                        duration: 2000, // Passé à 2s pour que ce soit humainement agréable
                        scaleInner: 1.4,
                        scaleOuter: 1.7,
                        gradientDark: 'radial-gradient(circle, #818cf8, #4338ca)',
                        gradientLight: 'radial-gradient(circle, #fdba74, #f97316)',
                        haloColorDark: '#818cf8',
                        haloColorLight: '#fed7aa',
                    },
                    {
                        key: 'exhale',
                        eyebrow: 'Expirez',
                        phrase: 'Relâchez tout',
                        subPhrase: 'Laissez partir les tensions...',
                        duration: 6000,
                        scaleInner: 0.8,
                        scaleOuter: 1.0,
                        gradientDark: 'radial-gradient(circle, #38bdf8, #0369a1)',
                        gradientLight: 'radial-gradient(circle, #f97316, #c2410c)',
                        haloColorDark: '#38bdf8',
                        haloColorLight: '#fed7aa',
                    },
                    {
                        key: 'pause',
                        eyebrow: 'Pause',
                        phrase: 'Détendez-vous',
                        subPhrase: 'Sentez le calme vous envahir...',
                        duration: 2000, // Passé à 2s
                        scaleInner: 0.8,
                        scaleOuter: 1.0,
                        gradientDark: 'radial-gradient(circle, #2dd4bf, #0f766e)',
                        gradientLight: 'radial-gradient(circle, #fb923c, #ea580c)',
                        haloColorDark: '#2dd4bf',
                        haloColorLight: '#fdba74',
                    },
                ],

                get currentStep() {
                    return this.steps[this.stepIndex];
                },

                get progressPercent() {
                    if (this.totalSeconds === 0) return 0;
                    return ((this.totalSeconds - this.remaining) / this.totalSeconds) * 100;
                },

                get bgClass() {
                    if (this.phase !== 'session') {
                        return this.isDark ? 'bg-[#0f1f3d] text-slate-100' : 'bg-white text-slate-800';
                    }
                    const key = this.currentStep?.key;
                    if (this.isDark) {
                        const map = {
                            inhale: 'bg-[#0d2154]',
                            hold: 'bg-[#11195e]',
                            exhale: 'bg-[#0c1a3a]',
                            pause: 'bg-[#0a1f35]',
                        };
                        return (map[key] || 'bg-[#0f1f3d]') + ' text-slate-100';
                    } else {
                        const map = {
                            inhale: 'bg-[#fff7f0]',
                            hold: 'bg-[#fef3e8]',
                            exhale: 'bg-[#fffbf5]',
                            pause: 'bg-[#fef9f4]',
                        };
                        return (map[key] || 'bg-white') + ' text-slate-800';
                    }
                },

                init() {
                    // Plus besoin d'initialiser des tailles fixes en JS
                },

                selectDuration(val) {
                    this.selectedDuration = val;
                },

                formatTime(secs) {
                    const m = String(Math.floor(secs / 60)).padStart(2, '0');
                    const s = String(secs % 60).padStart(2, '0');
                    return `${m}:${s}`;
                },

                startSession() {
                    if (!this.selectedDuration) return;
                    const mins = this.selectedDuration === 'custom' ? (this.customMinutes || 1) : this.selectedDuration;
                    this.totalSeconds = mins * 60;
                    this.remaining = this.totalSeconds;
                    this.stepIndex = 0;
                    this.phase = 'session';

                    this.$nextTick(() => {
                        this.runStep();
                        this.sessionTimer = setInterval(() => {
                            this.remaining--;
                            if (this.remaining <= 0) {
                                this.stopSession(true);
                            }
                        }, 1000);
                    });
                },

                runStep() {
                    clearTimeout(this.stepTimer);
                    clearInterval(this.countdownTimer);

                    const step = this.steps[this.stepIndex];

                    const hasCd = step.key === 'inhale' || step.key === 'exhale';
                    if (hasCd) {
                        const cdSecs = Math.round(step.duration / 1000);
                        this.countdown = cdSecs;
                        this.countdownTimer = setInterval(() => {
                            this.countdown = Math.max(0, this.countdown - 1);
                        }, 1000);
                    } else {
                        this.countdown = 0;
                    }

                    this.stepTimer = setTimeout(() => {
                        this.stepIndex = (this.stepIndex + 1) % this.steps.length;
                        this.runStep();
                    }, step.duration);
                },

                stopSession(finished = false) {
                    clearInterval(this.sessionTimer);
                    clearTimeout(this.stepTimer);
                    clearInterval(this.countdownTimer);
                    this.phase = finished ? 'done' : 'home';
                },
            };
        }
    </script>
</x-app-layout>