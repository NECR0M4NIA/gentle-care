console.log("anims.js chargé");

console.log('isDark:', window.matchMedia("(prefers-color-scheme: dark)").matches);

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

    console.log("body bg:", getComputedStyle(document.body).backgroundImage);

    /*
    const backgrounds = [
        '/assets/images/sunset-beach-bg.png',
        '/assets/images/forest.png',
        '/assets/images/forest.jpg',
        '/assets/images/lac.jpg'
    ];
    */

    /*
    const backgrounds = [
        '/assets/images/sunset-beach-bg-night.png',
        '/assets/images/mountains-dark.avif',
        '/assets/images/forest-night.jpg',
        '/assets/images/lac-night.jpg'
    ];

    const style = document.createElement('style');
    style.innerHTML = `
        body {
            position: relative;
            z-index: 1;
        }
        body::before, body::after {
            content: "";
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: -1;
            transition: opacity 1.5s ease-in-out;
        }
        body::before {
            background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), var(--bg-current);
            opacity: 1;
        }
        body::after {
            background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), var(--bg-next);
            opacity: 0;
        }
        body.fade-active::before { opacity: 0; }
        body.fade-active::after { opacity: 1; }
    `;
    document.head.appendChild(style);

    let currentIndex = 0;
    $body.style.setProperty('--bg-current', `url('${backgrounds[currentIndex]}')`);

    function changeBackground() {
        let nextIndex;
        do {
            nextIndex = Math.floor(Math.random() * backgrounds.length);
        } while (nextIndex === currentIndex);

        const nextImage = backgrounds[nextIndex];
        
        $body.style.setProperty('--bg-next', `url('${nextImage}')`);
        
        $body.classList.add('fade-active');

        setTimeout(() => {
            $body.style.setProperty('--bg-current', `url('${nextImage}')`);
            $body.classList.remove('fade-active');
            currentIndex = nextIndex;
        }, 1500);
    }

    setInterval(changeBackground, 5000);
    */
});