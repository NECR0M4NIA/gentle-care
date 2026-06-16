document.addEventListener('DOMContentLoaded', () => {
    const $body = document.querySelector('body');
    const $elements = document.querySelectorAll('nav, .flex-col > h1, .flex-col > p, .flex-col > a, .w-full > img');

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
});