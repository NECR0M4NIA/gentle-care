<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/svg+xml" href="/assets/icons/gentle-care-orange.svg" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/svg+xml" href="/assets/icons/gentle-care-blue.svg" media="(prefers-color-scheme: dark)">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Histoire</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    {{--
        Route (routes/web.php) :
        Route::get('/histoire', fn () => view('history'))->name('history');
    --}}

    <style>
        /* ─── Base ─── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
            background-image:
                linear-gradient(rgba(0,0,0,.45), rgba(0,0,0,.45)),
                url('/assets/images/montagne.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #fff;
            overflow-x: hidden;
        }

        /* ─── Slide container ─── */
        #slides-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 0 6vw;
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
        }

        /* ─── Individual slide ─── */
        .slide {
            display: none;
            flex-direction: column;
            gap: 32px;
            padding-bottom: 40px;
            /* start hidden for initial load reveal */
            opacity: 0;
        }
        .slide.active {
            display: flex;
        }

        /* enter animations */
        .slide.anim-enter-right { animation: enterFromRight .5s cubic-bezier(.4,0,.2,1) forwards; }
        .slide.anim-enter-left  { animation: enterFromLeft  .5s cubic-bezier(.4,0,.2,1) forwards; }

        /* exit animations (keep display:flex while animating out) */
        .slide.anim-exit-left  { display: flex; animation: exitToLeft   .4s cubic-bezier(.4,0,.2,1) forwards; pointer-events: none; }
        .slide.anim-exit-right { display: flex; animation: exitToRight  .4s cubic-bezier(.4,0,.2,1) forwards; pointer-events: none; }

        @keyframes enterFromRight {
            from { opacity: 0; transform: translateX(60px); }
            to   { opacity: 1; transform: translateX(0);    }
        }
        @keyframes enterFromLeft {
            from { opacity: 0; transform: translateX(-60px); }
            to   { opacity: 1; transform: translateX(0);     }
        }
        @keyframes exitToLeft {
            from { opacity: 1; transform: translateX(0);     }
            to   { opacity: 0; transform: translateX(-60px); }
        }
        @keyframes exitToRight {
            from { opacity: 1; transform: translateX(0);    }
            to   { opacity: 0; transform: translateX(60px); }
        }

        /* ─── FX (scroll / load reveal) ─── */
        .fx {
            opacity: 0;
            transition: opacity .75s cubic-bezier(.4,0,.2,1), transform .75s cubic-bezier(.4,0,.2,1);
            will-change: opacity, transform;
        }
        .fx-up    { transform: translateY(38px); }
        .fx-scale { transform: scale(.9); }
        .fx-left  { transform: translateX(-38px); }
        .fx-right { transform: translateX(38px); }
        .fx.is-visible { opacity: 1; transform: translate(0,0) scale(1); }

        @media (prefers-reduced-motion: reduce) {
            .fx, .slide { transition: none !important; animation: none !important; opacity: 1 !important; transform: none !important; }
        }

        /* ─── Navbar ─── */
        .gc-navbar-wrap {
            position: sticky;
            top: 0;
            z-index: 50;
            max-width: 1100px;
            width: 100%;
            margin: 24px auto 0;
            padding: 0 6vw;
        }

        /* ─── Panel (card) ─── */
        .panel {
            background: rgba(0,0,0,.25);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 20px;
            padding: 32px;
            display: flex;
            align-items: center;
            gap: 32px;
            box-shadow: 0 12px 30px rgba(0,0,0,.25);
        }
        @media (max-width: 760px) { .panel { flex-direction: column; } }

        /* panel variant: golden (maquette slide 3) */
        .panel-gold {
            background: rgba(120, 90, 20, .35);
            border-color: rgba(248, 184, 3, .3);
            flex-direction: column;
            align-items: center;
            gap: 24px;
        }

        .panel-img {
            flex-shrink: 0;
            width: 220px;
            height: 220px;
            border-radius: 16px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            box-shadow: 0 8px 18px rgba(0,0,0,.25);
        }
        .panel-img img { width: 100%; height: 100%; object-fit: cover; }
        @media (max-width: 760px) { .panel-img { width: 100%; height: 200px; } }

        .panel-photo {
            flex-shrink: 0;
            width: 320px;
            height: 240px;
            border-radius: 16px;
            border: 4px solid rgba(255,141,40,.7);
            overflow: hidden;
            box-shadow: 0 8px 18px rgba(0,0,0,.25);
        }
        .panel-photo img { width: 100%; height: 100%; object-fit: cover; }
        @media (max-width: 760px) { .panel-photo { width: 100%; height: 200px; } }

        /* gold panel: centred full-width photo */
        .gold-photo {
            width: 100%;
            max-width: 520px;
            height: 280px;
            border-radius: 16px;
            border: 3px solid rgba(248,184,3,.6);
            overflow: hidden;
            box-shadow: 0 8px 18px rgba(0,0,0,.3);
        }
        .gold-photo img { width: 100%; height: 100%; object-fit: cover; }

        p.copy {
            font-size: 15px;
            line-height: 1.75;
            color: rgba(255,255,255,.9);
        }
        p.copy-center {
            text-align: center;
            font-size: 14px;
            line-height: 1.8;
            color: rgba(255,255,255,.88);
        }

        h2.slide-title {
            font-size: clamp(30px, 5vw, 54px);
            font-weight: 900;
            text-transform: uppercase;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0,0,0,.4);
            letter-spacing: .3px;
        }

        /* ─── Nav buttons (Précédent / Suivant) ─── */
        .btn-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0 24px;
        }
        .btn-nav {
            display: inline-block;
            font-weight: 700;
            font-size: 15px;
            padding: 14px 36px;
            border-radius: 999px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            box-shadow: 0 6px 14px rgba(0,0,0,.25);
            transition: transform .2s ease, background .2s ease, opacity .2s ease;
        }
        .btn-nav:hover  { transform: scale(1.05); }
        .btn-nav:active { transform: scale(.97); }
        .btn-prev { background: #F8B803; color: #1b1b18; }
        .btn-next { background: #F8B803; color: #1b1b18; }
        .btn-nav.hidden { opacity: 0; pointer-events: none; }

        /* ─── Progress dots ─── */
        .dots {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: rgba(255,255,255,.4);
            transition: background .3s, transform .3s;
        }
        .dot.active { background: #F8B803; transform: scale(1.4); }

        /* ─── Footer ─── */
        .gc-footer-wrap {
            max-width: 1100px;
            width: 100%;
            margin: 0 auto;
            padding: 0 6vw 12px;
        }
        .copyright {
            text-align: center;
            font-size: 12px;
            color: rgba(255,255,255,.5);
            padding-bottom: 16px;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <div class="gc-navbar-wrap fx fx-up" style="transition-delay:0s">
        @include('layouts.navbar')
    </div>

    {{-- Slides wrapper --}}
    <div id="slides-wrap" style="padding-top: 36px;">

        {{-- ══════════════════════════════════════════════
             SLIDE 1 — Qui sommes nous ?
             + Pourquoi nous avons créé ce site ?
        ══════════════════════════════════════════════ --}}
        <div class="slide" data-slide="0">

            {{-- Section : Qui sommes nous --}}
            <h2 class="fx fx-up slide-title" style="transition-delay:.08s">Qui sommes nous ?</h2>
            <div class="panel">
                <div class="fx fx-scale panel-img" style="transition-delay:.2s">
                    <img src="/assets/images/montagne.png" alt="Logo Gentle Care">
                </div>
                <p class="fx fx-right copy" style="transition-delay:.32s">
                    Nous sommes un jeune groupe d'étudiants au sein de l'Eden School Paris,
                    actuellement en deuxième année d'études. Notre groupe est composé d'étudiants
                    de tous âges, comprises entre 15 et 19 ans, ce qui nous permet de bénéficier
                    de points de vue variés et d'une grande richesse dans nos échanges.
                    <br><br>
                    Passionnés par les nouvelles technologies, la programmation et l'innovation
                    numérique, nous développons nos compétences à travers différents projets et
                    relevons de nouveaux défis ensemble.
                </p>
            </div>

            {{-- Section : Pourquoi --}}
            <h2 class="fx fx-up slide-title" style="transition-delay:.1s">Pourquoi nous avons créé ce site ?</h2>
            <div class="panel">
                <p class="fx fx-left copy" style="transition-delay:.22s">
                    Nous avons créé ce site parce que, dans notre génération de plus en plus de
                    personnes notamment les jeunes souffrent de dépression et de mal-être. C'est
                    pour ça qu'il est important pour nous de bénéficier et de favoriser le
                    bien-être de chacun.
                    <br><br>
                    Voilà la raison de l'existence de ce site, d'après nous tout le monde mérite
                    d'obtenir du bonheur et surtout du bien-être.
                </p>
                <div class="fx fx-scale panel-photo" style="transition-delay:.34s">
                    <img src="/assets/images/montagne.png" alt="Illustration bien-être">
                </div>
            </div>

            <div class="btn-row fx fx-up" style="transition-delay:.15s">
                <button class="btn-nav btn-prev hidden" onclick="goTo(currentSlide - 1)">Précédent</button>
                <div class="dots" id="dots-0"></div>
                <button class="btn-nav btn-next" onclick="goTo(currentSlide + 1)">Suivant</button>
            </div>
        </div>

        {{-- ══════════════════════════════════════════════
             SLIDE 2 — À quoi sert le site ?
        ══════════════════════════════════════════════ --}}
        <div class="slide" data-slide="1">

            <h2 class="fx fx-up slide-title" style="transition-delay:.08s">À quoi sert le site ?</h2>

            <div class="panel panel-gold">
                <div class="fx fx-scale gold-photo" style="transition-delay:.2s">
                    <img src="/assets/images/montagne.png" alt="Illustration aide">
                </div>
                <p class="fx fx-up copy-center" style="transition-delay:.32s">
                    Le site sert à toutes les personnes qui souffrent de mal-être et qui sont en
                    quête du bien-être. Dans celui-ci, vous pourrez avoir votre propre espace avec
                    des jeux ludiques, des citations inédits, des vidéos permettant d'aider dans
                    votre situation et des exercices de respiration et de méditation incluant un
                    graphique du bien-être permettant de consulter votre humeur chaque jour.
                </p>
            </div>

            <div class="btn-row fx fx-up" style="transition-delay:.15s">
                <button class="btn-nav btn-prev" onclick="goTo(currentSlide - 1)">Précédent</button>
                <div class="dots" id="dots-1"></div>
                <button class="btn-nav btn-next" onclick="goTo(currentSlide + 1)">Suivant</button>
            </div>
        </div>

        {{-- ══════════════════════════════════════════════
             SLIDE 3 — (à personnaliser)
        ══════════════════════════════════════════════ --}}
        <div class="slide" data-slide="2">

            <h2 class="fx fx-up slide-title" style="transition-delay:.08s">Comment ça marche ?</h2>

            <div class="panel panel-gold">
                <div class="fx fx-scale gold-photo" style="transition-delay:.2s">
                    <img src="/assets/images/montagne.png" alt="Illustration fonctionnement">
                </div>
                <p class="fx fx-up copy-center" style="transition-delay:.32s">
                    Créez votre compte, répondez à quelques questions sur votre état du moment,
                    puis accédez à votre espace personnel. Chaque jour, de nouveaux contenus
                    s'adaptent à votre humeur : citations, exercices de respiration, jeux et
                    vidéos bien-être. Suivez l'évolution de votre bien-être grâce au graphique
                    qui se met à jour au fil de vos journées.
                </p>
            </div>

            <div class="btn-row fx fx-up" style="transition-delay:.15s">
                <button class="btn-nav btn-prev" onclick="goTo(currentSlide - 1)">Précédent</button>
                <div class="dots" id="dots-2"></div>
                <button class="btn-nav btn-next" onclick="goTo(currentSlide + 1)">Suivant</button>
            </div>
        </div>

        {{-- ══════════════════════════════════════════════
             SLIDE 4 — Dernière slide (CTA)
        ══════════════════════════════════════════════ --}}
        <div class="slide" data-slide="3">

            <h2 class="fx fx-up slide-title" style="transition-delay:.08s">Prêt à commencer ?</h2>

            <div class="panel panel-gold">
                <div class="fx fx-scale gold-photo" style="transition-delay:.2s">
                    <img src="/assets/images/montagne.png" alt="Illustration départ">
                </div>
                <p class="fx fx-up copy-center" style="transition-delay:.32s">
                    Rejoignez la communauté Gentle Care et prenez soin de votre bien-être au quotidien.
                    Chaque jour est une nouvelle opportunité de vous sentir mieux.
                    <br><br>
                    Créez votre compte gratuitement et commencez dès maintenant votre chemin
                    vers plus de sérénité.
                </p>
                <a href="/"
                   class="fx fx-up btn-nav btn-next"
                   style="transition-delay:.44s; display:inline-block; background:#FF8D28;">
                    Accéder au site
                </a>
            </div>

            <div class="btn-row fx fx-up" style="transition-delay:.15s">
                <button class="btn-nav btn-prev" onclick="goTo(currentSlide - 1)">Précédent</button>
                <div class="dots" id="dots-3"></div>
                <button class="btn-nav btn-next hidden" onclick="goTo(currentSlide + 1)">Suivant</button>
            </div>
        </div>

    </div>{{-- /slides-wrap --}}

    {{-- Footer --}}
    <div class="gc-footer-wrap">
        @include('layouts.footer')
    </div>
    <p class="copyright">© Gentle Care 2026 - Tous droits réservés</p>

    <script src="/assets/js/anims.js"></script>
    <script>
    // ─────────────────────────────────────────────────
    //  Config
    // ─────────────────────────────────────────────────
    var TOTAL  = 4;              // nombre total de slides
    var ANIM_MS = 420;           // durée transition (doit ≥ animation CSS exit)

    var currentSlide = 0;
    var isAnimating  = false;

    // ─────────────────────────────────────────────────
    //  Init
    // ─────────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function () {
        buildDots();
        showSlide(0, null); // affiche la 1ère slide sans animation
    });

    // ─────────────────────────────────────────────────
    //  Navigation
    // ─────────────────────────────────────────────────
    function goTo(target) {
        if (isAnimating) return;
        if (target < 0 || target >= TOTAL) return;

        isAnimating = true;
        var direction = target > currentSlide ? 'forward' : 'backward';

        var outSlide = getSlide(currentSlide);
        var exitClass = direction === 'forward' ? 'anim-exit-left' : 'anim-exit-right';

        // Lance l'exit sur la slide actuelle
        outSlide.classList.add(exitClass);

        setTimeout(function () {
            outSlide.classList.remove('active', exitClass);

            currentSlide = target;
            showSlide(currentSlide, direction);

            setTimeout(function () { isAnimating = false; }, ANIM_MS);
        }, ANIM_MS - 60); // léger chevauchement pour fluidité
    }

    // ─────────────────────────────────────────────────
    //  Affiche une slide avec enter-animation + fx
    // ─────────────────────────────────────────────────
    function showSlide(index, direction) {
        var slide = getSlide(index);

        // Choix de la direction d'entrée
        var enterClass = 'anim-enter-right';
        if (direction === 'backward') enterClass = 'anim-enter-left';
        if (direction === null)       enterClass = '';   // 1er affichage : pas d'anim de slide

        slide.classList.add('active');
        if (enterClass) slide.classList.add(enterClass);

        // Nettoyage de l'animation après qu'elle est terminée
        if (enterClass) {
            slide.addEventListener('animationend', function cleanup() {
                slide.classList.remove(enterClass);
                slide.removeEventListener('animationend', cleanup);
            });
        } else {
            // Juste afficher direct au 1er load (fx prend le relais)
            slide.style.opacity = '1';
        }

        // Réinitialise et re-observe les .fx de cette slide
        revealFx(slide);

        // Met à jour les dots
        updateDots(index);
    }

    // ─────────────────────────────────────────────────
    //  Scroll-reveal & load-reveal pour les .fx
    // ─────────────────────────────────────────────────
    var observer;
    function revealFx(slide) {
        // Retire is-visible de tous les .fx de la slide avant de les re-observer
        var items = slide.querySelectorAll('.fx');
        items.forEach(function (el) { el.classList.remove('is-visible'); });

        if (!('IntersectionObserver' in window)) {
            items.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }

        // On recrée un observer à chaque changement de slide
        // pour éviter les doubles-observes.
        if (observer) observer.disconnect();

        observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        items.forEach(function (el) { observer.observe(el); });
    }

    // ─────────────────────────────────────────────────
    //  Dots
    // ─────────────────────────────────────────────────
    function buildDots() {
        for (var i = 0; i < TOTAL; i++) {
            var container = document.getElementById('dots-' + i);
            if (!container) continue;
            container.innerHTML = '';
            for (var d = 0; d < TOTAL; d++) {
                var dot = document.createElement('span');
                dot.className = 'dot' + (d === 0 ? ' active' : '');
                dot.setAttribute('data-dot', d);
                container.appendChild(dot);
            }
        }
    }

    function updateDots(activeIndex) {
        document.querySelectorAll('.dot').forEach(function (dot) {
            dot.classList.toggle('active', parseInt(dot.getAttribute('data-dot')) === activeIndex);
        });
    }

    // ─────────────────────────────────────────────────
    //  Helpers
    // ─────────────────────────────────────────────────
    function getSlide(index) {
        return document.querySelector('[data-slide="' + index + '"]');
    }

    // Navigation clavier (←  →)
    document.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight' || e.key === 'ArrowDown')  goTo(currentSlide + 1);
        if (e.key === 'ArrowLeft'  || e.key === 'ArrowUp')    goTo(currentSlide - 1);
    });
    </script>
</body>
</html>