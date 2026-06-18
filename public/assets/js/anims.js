document.addEventListener('DOMContentLoaded', () => {
    const $body = document.querySelector('body');
    const $elements = document.querySelectorAll('.reveal');

    $body.style.opacity = '1';

    const MAX_STAGGER = 1500; // plafond pour éviter des délais énormes sur les pages avec beaucoup d'éléments
    const STEP = 100; // délai entre chaque élément, réduit si tu en as beaucoup

    $elements.forEach(($el, index) => {
        $el.style.opacity = 0;
        $el.style.filter = 'blur(10px)';

        const delay = 300 + Math.min(index * STEP, MAX_STAGGER);

        setTimeout(() => {
            $el.animate([
                { transform: 'scale(0.5) translateY(30px)', opacity: 0, filter: 'blur(15px)' },
                { transform: 'scale(0.75) translateY(15px)', opacity: 0.5, filter: 'blur(7.5px)' },
                { transform: 'scale(1) translateY(0)', opacity: 1, filter: 'blur(0px)' }
            ], {
                duration: 1200,
                easing: 'cubic-bezier(0.16, 1, 0.3, 1)',
                fill: 'forwards'
            });
        }, delay);
    });

    // ... reste du code (backgrounds) inchangé
});