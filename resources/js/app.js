

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('accessibility', () => ({
    colorMode: 'normal',
    textMode: false,

    init() {
        this.colorMode = localStorage.getItem('color_mode') || 'normal';
        this.textMode = localStorage.getItem('text_mode') === 'true';
        this.apply();
    },

    setColor(mode) {
        this.colorMode = mode;
        localStorage.setItem('color_mode', mode);
        this.apply();
    },

    setText(state) {
        this.textMode = state;
        localStorage.setItem('text_mode', state);
        this.apply();
    },

    apply() {
        const html = document.documentElement;

        html.style.filter = '';
        html.style.fontFamily = '';
        html.style.letterSpacing = '';
        html.style.lineHeight = '';

        let filter = '';

        if (this.colorMode === 'protanopia') {
            filter = "grayscale(0.2) contrast(1.1) sepia(0.3) hue-rotate(-20deg)";
        }

        if (this.colorMode === 'deuteranopia') {
            filter = "grayscale(0.15) contrast(1.1) hue-rotate(20deg)";
        }

        if (this.colorMode === 'tritanopia') {
            filter = "grayscale(0.2) contrast(1.1) hue-rotate(140deg)";
        }

        html.style.filter = filter;

        if (this.textMode) {
            html.style.fontFamily = "'OpenDyslexic', Arial, sans-serif";
            html.style.letterSpacing = "0.05em";
            html.style.lineHeight = "1.6";
        }
    }
}));

Alpine.start();
