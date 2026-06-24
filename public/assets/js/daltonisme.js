function accessibility() {
    return {
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

            html.style.filter = '';

            if (this.mode === 'protanopia') {
                html.style.filter = "url('#protanopia')";
            }

            if (this.mode === 'deuteranopia') {
                html.style.filter = "url('#deuteranopia')";
            }

            if (this.mode === 'tritanopia') {
                html.style.filter = "url('#tritanopia')";
            }
        }
    }
}