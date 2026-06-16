document.addEventListener('DOMContentLoaded', () => {
    const $body = document.querySelector('body');
    const $elements = document.querySelectorAll('nav, .flex-col > h1, .flex-col > p, .flex-col > a, .w-full > img');

    // --- 1. Gestion des animations d'apparition ---
    $body.style.opacity = '1'; 

    $elements.forEach(($el, index) => {
        $el.style.opacity = 0;
        setTimeout(() => {
            $el.animate([
                { transform: 'translateY(30px)', opacity: 0 },
                { transform: 'translateY(0)', opacity: 1 }
            ], {
                duration: 1000,
                easing: 'cubic-bezier(0.16, 1, 0.3, 1)',
                fill: 'forwards'
            });
        }, 500 + (index * 400)); 
    });

    // --- 2. Gestion du Background avec VRAI fondu ---
    const backgrounds = [
        '/assets/images/sunset-beach-bg.png',
        '/assets/images/forest.png',
        '/assets/images/forest.jpg',
        '/assets/images/lac.jpg'
    ];

    // Étape A : On injecte du CSS pour préparer le fondu via les variables CSS
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

    // Étape B : Initialisation des images
    let currentIndex = 0;
    $body.style.setProperty('--bg-current', `url('${backgrounds[currentIndex]}')`);

    function changeBackground() {
        let nextIndex;
        do {
            nextIndex = Math.floor(Math.random() * backgrounds.length);
        } while (nextIndex === currentIndex);

        const nextImage = backgrounds[nextIndex];
        
        // On charge la nouvelle image dans le "after" (qui est invisible à 0% d'opacité)
        $body.style.setProperty('--bg-next', `url('${nextImage}')`);
        
        // On déclenche le fondu croisé
        $body.classList.add('fade-active');

        // Une fois le fondu terminé (1.5s), on remet les compteurs à zéro pour le prochain tour
        setTimeout(() => {
            $body.style.setProperty('--bg-current', `url('${nextImage}')`);
            $body.classList.remove('fade-active');
            currentIndex = nextIndex;
        }, 1500); // Doit correspondre à la durée de la transition CSS (1.5s)
    }

    // Lance le changement toutes les 5 secondes
    setInterval(changeBackground, 5000);
});