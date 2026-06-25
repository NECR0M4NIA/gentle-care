function meditation() {
    return {
        phase: 'home',

        durationOptions: [
            { label: '1 minute', value: 1 },
            { label: '2 minutes', value: 2 },
            { label: '5 minutes', value: 5 },
            { label: '10 minutes', value: 10 },
        ],

        selectedDuration: null,
        customMinutes: 3,

        totalSeconds: 0,
        remaining: 0,

        sessionTimer: null,
        stepTimer: null,
        countdownTimer: null,

        countdown: 0,
        stepIndex: 0,

        // ✅ dynamique dark mode (réactif au changement système)
        get isDark() {
            return window.matchMedia('(prefers-color-scheme: dark)').matches;
        },

        steps: [
            {
                key: 'inhale',
                eyebrow: 'Inspirez',
                phrase: 'Respirez profondément',
                subPhrase: 'Remplissez vos poumons lentement...',
                duration: 4000,
                scaleIn: 1.4,
                scaleOut: 1.7,
                dark: {
                    gradient: 'radial-gradient(circle, #3b82f6, #1d4ed8)',
                    halo: '#3b82f6',
                },
                light: {
                    gradient: 'radial-gradient(circle, #fb923c, #ea580c)',
                    halo: '#fed7aa',
                },
            },
            {
                key: 'hold',
                eyebrow: 'Retenez',
                phrase: 'Gardez votre souffle',
                subPhrase: 'Restez dans ce calme...',
                duration: 2000,
                scaleIn: 1.4,
                scaleOut: 1.7,
                dark: {
                    gradient: 'radial-gradient(circle, #818cf8, #4338ca)',
                    halo: '#818cf8',
                },
                light: {
                    gradient: 'radial-gradient(circle, #fdba74, #f97316)',
                    halo: '#fed7aa',
                },
            },
            {
                key: 'exhale',
                eyebrow: 'Expirez',
                phrase: 'Relâchez tout',
                subPhrase: 'Laissez partir les tensions...',
                duration: 6000,
                scaleIn: 0.8,
                scaleOut: 1.0,
                dark: {
                    gradient: 'radial-gradient(circle, #38bdf8, #0369a1)',
                    halo: '#38bdf8',
                },
                light: {
                    gradient: 'radial-gradient(circle, #f97316, #c2410c)',
                    halo: '#fed7aa',
                },
            },
            {
                key: 'pause',
                eyebrow: 'Pause',
                phrase: 'Détendez-vous',
                subPhrase: 'Sentez le calme vous envahir...',
                duration: 2000,
                scaleIn: 0.8,
                scaleOut: 1.0,
                dark: {
                    gradient: 'radial-gradient(circle, #2dd4bf, #0f766e)',
                    halo: '#2dd4bf',
                },
                light: {
                    gradient: 'radial-gradient(circle, #fb923c, #ea580c)',
                    halo: '#fdba74',
                },
            },
        ],

        get currentStep() {
            return this.steps[this.stepIndex];
        },

        get theme() {
            return this.isDark ? 'dark' : 'light';
        },

        get progressPercent() {
            if (!this.totalSeconds) return 0;
            return ((this.totalSeconds - this.remaining) / this.totalSeconds) * 100;
        },

        init() {
            // optionnel : écouter changement theme système
            const mq = window.matchMedia('(prefers-color-scheme: dark)');
            mq.addEventListener?.('change', () => {
                this.$forceUpdate?.();
            });
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

            const mins =
                this.selectedDuration === 'custom'
                    ? (this.customMinutes || 1)
                    : this.selectedDuration;

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

            const step = this.currentStep;

            const showCountdown = ['inhale', 'exhale'].includes(step.key);

            if (showCountdown) {
                this.countdown = Math.round(step.duration / 1000);

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