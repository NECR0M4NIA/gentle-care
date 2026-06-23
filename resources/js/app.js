

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('accessibility', () => ({
    mode: 'normal',

    init() {
        this.mode = localStorage.getItem('vision_mode') || 'normal';
        this.apply();
    },

    toggle(mode) {
        this.mode = mode;
        localStorage.setItem('vision_mode', mode);
        this.apply();
    },

    apply() {
    const html = document.documentElement;
    const body = document.body;

    const filter = (() => {
        if (this.mode === 'protanopia') {
            return "grayscale(0.2) contrast(1.1) sepia(0.3) hue-rotate(-20deg)";
        }

        if (this.mode === 'deuteranopia') {
            return "grayscale(0.15) contrast(1.1) hue-rotate(20deg)";
        }

        if (this.mode === 'tritanopia') {
            return "grayscale(0.2) contrast(1.1) hue-rotate(140deg)";
        }

        return "";
    })();

    html.style.filter = filter;
    body.style.filter = filter;
}
}));

Alpine.start();
