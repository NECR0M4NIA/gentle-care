

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/svg+xml" href="/assets/icons/gentle-care-orange.svg" media="(prefers-color-scheme: light)">
    <link rel="icon" type="image/svg+xml" href="/assets/icons/gentle-care-blue.svg" media="(prefers-color-scheme: dark)">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Histoire — Gentle Care</title>
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    {{--
        Route (routes/web.php) :
        Route::get('/histoire', fn () => view('history'))->name('history');
    --}}
    <style>
        /* ── Reset ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        /* ── Body / fond ── */
        body {
            font-family: "Instrument Sans", ui-sans-serif, system-ui, sans-serif;
            background-image:
                linear-gradient(rgba(0,0,0,.42), rgba(0,0,0,.42)),
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

        /* ── Navbar wrap ── */
        .gc-nav-wrap {
            position: sticky;
            top: 0;
            z-index: 50;
            padding: 20px 5vw 0;
        }

        /* ── Slide engine ── */
        #slides-wrap {
            flex: 1;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            padding: 0 5vw;
            max-width: 1080px;
            width: 100%;
            margin: 0 auto;
        }

        .slide {
            display: none;
            flex-direction: column;
            gap: 22px;
            padding: 28px 0 20px;
            flex: 1;
        }
        .slide.active { display: flex; }

        /* transitions */
        @keyframes slideInRight  { from { opacity:0; transform:translateX(70px) }  to { opacity:1; transform:translateX(0) } }
        @keyframes slideInLeft   { from { opacity:0; transform:translateX(-70px) } to { opacity:1; transform:translateX(0) } }
        @keyframes slideOutLeft  { from { opacity:1; transform:translateX(0) }      to { opacity:0; transform:translateX(-70px) } }
        @keyframes slideOutRight { from { opacity:1; transform:translateX(0) }      to { opacity:0; transform:translateX(70px) } }

        .anim-in-right  { animation: slideInRight  .5s cubic-bezier(.4,0,.2,1) forwards; }
        .anim-in-left   { animation: slideInLeft   .5s cubic-bezier(.4,0,.2,1) forwards; }
        .anim-out-left  { display:flex !important; animation: slideOutLeft  .38s cubic-bezier(.4,0,.2,1) forwards; pointer-events:none; }
        .anim-out-right { display:flex !important; animation: slideOutRight .38s cubic-bezier(.4,0,.2,1) forwards; pointer-events:none; }

        /* ── Reveal animations (fx) ── */
        .fx {
            opacity: 0;
            transition: opacity .75s cubic-bezier(.4,0,.2,1),
                        transform .75s cubic-bezier(.4,0,.2,1);
        }
        .fx-up    { transform: translateY(36px); }
        .fx-scale { transform: scale(.9); }
        .fx-left  { transform: translateX(-36px); }
        .fx-right { transform: translateX(36px); }
        .fx.v     { opacity:1; transform:translate(0,0) scale(1); }
        @media (prefers-reduced-motion: reduce) {
            .fx, .slide { transition:none!important; animation:none!important; opacity:1!important; transform:none!important; }
        }

        /* ── Typography ── */
        h2.stitle {
            font-size: clamp(26px, 4.5vw, 52px);
            font-weight: 900;
            text-transform: uppercase;
            text-align: center;
            text-shadow: 0 2px 6px rgba(0,0,0,.45);
        }

        /* ── Cards / panels ── */
        .card {
            background: rgba(255,255,255,.08);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 18px;
            padding: 24px 28px;
            box-shadow: 0 10px 28px rgba(0,0,0,.22);
        }

        /* ─── SLIDE 1 ─── */
        .s1-block {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        @media (max-width: 680px) { .s1-block { flex-direction: column; } }
        .gc-logo-box {
            flex-shrink: 0;
            width: 200px; height: 200px;
            background: #fff;
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,.25);
        }
        .gc-logo-box img { width: 100%; height: 100%; object-fit: cover; }
        @media (max-width: 680px) { .gc-logo-box { width: 100%; height: 180px; } }

        .sad-photo {
            flex-shrink: 0;
            width: 260px; height: 190px;
            border-radius: 14px;
            border: 3px solid rgba(255,141,40,.65);
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,.25);
        }
        .sad-photo img { width: 100%; height: 100%; object-fit: cover; }
        @media (max-width: 680px) { .sad-photo { width: 100%; height: 200px; } }

        p.copy {
            font-size: 14px;
            line-height: 1.75;
            color: rgba(255,255,255,.9);
        }

        /* ─── SLIDE 2 ─── */
        .s2-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            flex: 1;
        }
        .s2-photo {
            width: 100%;
            max-width: 460px;
            height: 240px;
            border-radius: 16px;
            border: 3px solid rgba(248,184,3,.55);
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,.3);
        }
        .s2-photo img { width: 100%; height: 100%; object-fit: cover; }

        /* ─── SLIDE 3 ─── */
        .s3-step {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }
        .s3-step.reverse { flex-direction: row-reverse; }
        @media (max-width: 680px) { .s3-step, .s3-step.reverse { flex-direction: column; } }

        .s3-img {
            flex-shrink: 0;
            width: 200px; height: 150px;
            border-radius: 14px;
            border: 2px solid rgba(248,184,3,.5);
            overflow: hidden;
            box-shadow: 0 6px 16px rgba(0,0,0,.3);
        }
        .s3-img.round { border-radius: 18px; }
        .s3-img img { width: 100%; height: 100%; object-fit: cover; }
        @media (max-width: 680px) { .s3-img { width: 100%; height: 180px; } }

        /* ─── SLIDE 4 ─── */
        .s4-center {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .s4-box {
            background: rgba(255,255,255,.1);
            backdrop-filter: blur(8px);
            border: 1.5px solid rgba(255,255,255,.28);
            border-radius: 20px;
            padding: 40px 48px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
            text-align: center;
            max-width: 380px;
            width: 100%;
        }
        .s4-box h2 {
            font-size: clamp(22px, 3.5vw, 34px);
            font-weight: 800;
            text-shadow: 0 2px 4px rgba(0,0,0,.35);
        }
        .btn-register {
            background: transparent;
            border: 2px solid rgba(255,255,255,.7);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            padding: 12px 48px;
            border-radius: 10px;
            cursor: pointer;
            transition: background .2s, color .2s, border-color .2s, transform .2s;
            text-decoration: none;
        }
        .btn-register:hover { background: rgba(255,255,255,.18); border-color: #fff; transform: scale(1.04); }

        /* ── Nav boutons ── */
        .btn-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 0 4px;
            flex-shrink: 0;
        }
        .btn-nav {
            background: #F8B803;
            color: #1b1b18;
            font-weight: 700;
            font-size: 15px;
            padding: 13px 34px;
            border-radius: 999px;
            border: none;
            cursor: pointer;
            box-shadow: 0 5px 14px rgba(0,0,0,.28);
            transition: transform .2s ease, opacity .25s ease;
        }
        .btn-nav:hover  { transform: scale(1.06); }
        .btn-nav:active { transform: scale(.97); }
        .btn-nav.ghost  { opacity: 0; pointer-events: none; }

        /* ── Progress dots ── */
        .dots { display:flex; gap:8px; align-items:center; }
        .dot  { width:8px; height:8px; border-radius:50%; background:rgba(255,255,255,.35); transition: background .3s, transform .3s; }
        .dot.a{ background:#F8B803; transform:scale(1.5); }

        /* ── Footer ── */
        .gc-footer-wrap { padding: 0 5vw 0; max-width:1080px; width:100%; margin:0 auto; }
        .copyright { text-align:center; font-size:12px; color:rgba(255,255,255,.45); padding:10px 0 14px; }
    </style>
</head>
<body>

    <div class="gc-nav-wrap fx fx-up" style="transition-delay:0s">
        @include('layouts.navbar')
    </div>

    <div id="slides-wrap">

        {{-- ════════════════════════════════════
             SLIDE 1 — Qui sommes nous ?
                     + Pourquoi on a créé ce site
        ════════════════════════════════════ --}}
        <div class="slide" data-s="0">

            <h2 class="stitle fx fx-up" style="transition-delay:.08s">Qui sommes nous ?</h2>

            <div class="card fx fx-up" style="transition-delay:.18s">
                <div class="s1-block">
                    <div class="gc-logo-box fx fx-scale" style="transition-delay:.24s">
                        <img src="/assets/images/logo-gc.png" alt="Logo GC"
                             onerror="this.src='/assets/images/montagne.png'">
                    </div>
                    <p class="copy fx fx-right" style="transition-delay:.34s">
                        Nous sommes un jeune groupe d'étudiants au sein de l'Eden School
                        Paris, actuellement en deuxième année d'études. Notre groupe est
                        composé d'étudiants de tous âges, comprises entre 15 et 19 ans, ce
                        qui nous permet de bénéficier de points de vue variés et d'une
                        grande richesse dans nos échanges.
                        <br><br>
                        Passionnés par les nouvelles technologies, la programmation et
                        l'innovation numérique, nous développons nos compétences à travers
                        différents projets et relevons de nouveaux défis ensemble.
                    </p>
                </div>
            </div>

            <h2 class="stitle fx fx-up" style="transition-delay:.12s">
                Pourquoi nous avons<br>créé ce site ?
            </h2>

            <div class="card fx fx-up" style="transition-delay:.22s">
                <div class="s1-block">
                    <p class="copy fx fx-left" style="transition-delay:.3s">
                        Nous avons créé ce site parce que, dans notre génération de plus en
                        plus de personnes notamment les jeunes souffrent de dépression et de
                        mal-être. C'est pour ça qu'il est important pour nous de bénéficier
                        et de favoriser le bien-être de chacun.
                        <br><br>
                        Voilà la raison de l'existence de ce site, d'après nous tout le monde
                        mérite d'obtenir du bonheur et surtout du bien-être.
                    </p>
                    <div class="sad-photo fx fx-scale" style="transition-delay:.38s">
                        <img src="/assets/images/sad-person.jpg" alt="Illustration bien-être"
                             onerror="this.src='/assets/images/montagne.png'">
                    </div>
                </div>
            </div>

            <div class="btn-row fx fx-up" style="transition-delay:.14s">
                <button class="btn-nav ghost" onclick="go(-1)">Précédent</button>
                <div class="dots" id="d0"></div>
                <button class="btn-nav" onclick="go(1)">Suivant</button>
            </div>
        </div>

        {{-- ════════════════════════════════════
             SLIDE 2 — À quoi sert le site ?
        ════════════════════════════════════ --}}
        <div class="slide" data-s="1">

            <h2 class="stitle fx fx-up" style="transition-delay:.08s">À quoi sert le site ?</h2>

            <div class="card s2-inner fx fx-up" style="transition-delay:.18s">
                <div class="s2-photo fx fx-scale" style="transition-delay:.26s">
                    <img src="/assets/images/hike-help.jpg" alt="Aide"
                         onerror="this.src='/assets/images/montagne.png'">
                </div>
                <p class="copy fx fx-up" style="transition-delay:.36s; text-align:center; max-width:620px;">
                    Le site sert à toutes les personnes qui souffrent de mal-être et qui sont
                    en quête du bien-être. Dans celui-ci, vous pourrez avoir votre propre
                    espace avec des jeux ludiques, des citations inédits, des vidéos
                    permettant d'aider dans votre situation et des exercices de respiration et
                    de méditation incluant un graphique du bien-être permettant de consulter
                    votre humeur chaque jour.
                </p>
            </div>

            <div class="btn-row fx fx-up" style="transition-delay:.14s">
                <button class="btn-nav" onclick="go(-1)">Précédent</button>
                <div class="dots" id="d1"></div>
                <button class="btn-nav" onclick="go(1)">Suivant</button>
            </div>
        </div>

        {{-- ════════════════════════════════════
             SLIDE 3 — Comment fonctionne le site ?
        ════════════════════════════════════ --}}
        <div class="slide" data-s="2">

            <h2 class="stitle fx fx-up" style="transition-delay:.06s">Comment fonctionne le site ?</h2>

            {{-- Étape 1 : cerveau à droite, texte à gauche --}}
            <div class="card fx fx-up" style="transition-delay:.14s">
                <div class="s3-step reverse">
                    <div class="s3-img round fx fx-scale" style="transition-delay:.22s">
                        <img src="/assets/images/brain-heart.png" alt="Cerveau"
                             onerror="this.src='/assets/images/montagne.png'">
                    </div>
                    <p class="copy fx fx-left" style="transition-delay:.3s">
                        Dans un premier temps une fois que vous aurez fini de lire cette page,
                        vous serez redirigé sur une autre page permettant de faire votre premier
                        pas de guérison et créer votre propre espace chez nous en renseignant
                        vos informations personnelles qu'on a garde précieusement dans notre
                        base de données 100% sécurisée.
                    </p>
                </div>
            </div>

            {{-- Étape 2 : couple à droite, texte à gauche --}}
            <div class="card fx fx-up" style="transition-delay:.18s">
                <div class="s3-step">
                    <p class="copy fx fx-left" style="transition-delay:.26s">
                        Ensuite dans un second temps une fois que vous aurez fini de créer
                        votre propre espace chez nous, vous devrez remplir un questionnaire
                        qui contient 20 questions afin d'en apprendre un peu plus sur vous,
                        en choisissant des réponses en fonction de votre situation afin de
                        vous aider au maximum créant un algorithme unique pour vous.
                    </p>
                    <div class="s3-img fx fx-scale" style="transition-delay:.34s">
                        <img src="/assets/images/couple-sunset.jpg" alt="Couple"
                             onerror="this.src='/assets/images/montagne.png'">
                    </div>
                </div>
            </div>

            {{-- Étape 3 : groupe à gauche, texte à droite --}}
            <div class="card fx fx-up" style="transition-delay:.22s">
                <div class="s3-step reverse">
                    <p class="copy fx fx-right" style="transition-delay:.3s">
                        Et pour finir une fois que vous aurez rempli le questionnaire, vous
                        avez accès à votre propre espace de détente uniquement pour vous,
                        incluant des vidéos, des exercices de respiration et méditation, des
                        jeux ludiques… En résumé, tout en votre disposition pour bénéficier
                        votre bien-être en prenant votre chemin de guérison à l'aide de
                        notre site web.
                    </p>
                    <div class="s3-img fx fx-scale" style="transition-delay:.38s">
                        <img src="/assets/images/group-sunset.jpg" alt="Groupe"
                             onerror="this.src='/assets/images/montagne.png'">
                    </div>
                </div>
            </div>

            <div class="btn-row fx fx-up" style="transition-delay:.14s">
                <button class="btn-nav" onclick="go(-1)">Précédent</button>
                <div class="dots" id="d2"></div>
                <button class="btn-nav" onclick="go(1)">Suivant</button>
            </div>
        </div>

        {{-- ════════════════════════════════════
             SLIDE 4 — Êtes-vous prêts ?
        ════════════════════════════════════ --}}
        <div class="slide" data-s="3">

            <div class="s4-center">
                <div class="s4-box fx fx-scale" style="transition-delay:.12s">
                    <h2 class="fx fx-up" style="transition-delay:.22s">Êtes-vous prêts à guérir ?</h2>
                    <a href="/register" class="btn-register fx fx-up" style="transition-delay:.34s">
                        Register
                    </a>
                </div>
            </div>

            <div class="btn-row fx fx-up" style="transition-delay:.1s">
                <button class="btn-nav" onclick="go(-1)">Précédent</button>
                <div class="dots" id="d3"></div>
                <button class="btn-nav ghost">Suivant</button>
            </div>
        </div>

    </div>{{-- /slides-wrap --}}

    <div class="gc-footer-wrap">
        @include('layouts.footer')
    </div>
    <p class="copyright">© Gentle Care 2026 - Tous droits réservés</p>

    <script src="/assets/js/anims.js"></script>
    <script>
    // ─── Config ───────────────────────────────────────
    var TOTAL   = 4;
    var ANIM_MS = 400;    // durée exit

    var cur     = 0;
    var busy    = false;
    var fxObs   = null;

    // ─── Init ─────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', function () {
        buildAllDots();
        activateSlide(0, null);
    });

    // ─── Navigation ───────────────────────────────────
    function go(delta) {
        if (busy) return;
        var target = cur + delta;
        if (target < 0 || target >= TOTAL) return;
        busy = true;

        var outSlide = slide(cur);
        var exitCls  = delta > 0 ? 'anim-out-left' : 'anim-out-right';
        outSlide.classList.add(exitCls);

        setTimeout(function () {
            outSlide.classList.remove('active', exitCls);
            cur = target;
            activateSlide(cur, delta > 0 ? 'right' : 'left');
            setTimeout(function () { busy = false; }, ANIM_MS + 80);
        }, ANIM_MS - 60);
    }

    function activateSlide(idx, from) {
        var s = slide(idx);
        s.classList.add('active');

        if (from) {
            var inCls = from === 'right' ? 'anim-in-right' : 'anim-in-left';
            s.classList.add(inCls);
            s.addEventListener('animationend', function f() {
                s.classList.remove(inCls);
                s.removeEventListener('animationend', f);
            });
        }

        revealFx(s);
        updateDots(idx);
    }

    // ─── FX reveal ────────────────────────────────────
    function revealFx(s) {
        var items = s.querySelectorAll('.fx');
        items.forEach(function (el) { el.classList.remove('v'); });

        if (!('IntersectionObserver' in window)) {
            items.forEach(function (el) { el.classList.add('v'); });
            return;
        }

        if (fxObs) fxObs.disconnect();

        fxObs = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('v');
                    fxObs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        items.forEach(function (el) { fxObs.observe(el); });
    }

    // ─── Dots ─────────────────────────────────────────
    function buildAllDots() {
        for (var i = 0; i < TOTAL; i++) {
            var c = document.getElementById('d' + i);
            if (!c) continue;
            c.innerHTML = '';
            for (var d = 0; d < TOTAL; d++) {
                var dot = document.createElement('span');
                dot.className = 'dot' + (d === 0 ? ' a' : '');
                dot.dataset.d = d;
                c.appendChild(dot);
            }
        }
    }

    function updateDots(idx) {
        document.querySelectorAll('.dot').forEach(function (d) {
            d.classList.toggle('a', parseInt(d.dataset.d) === idx);
        });
    }

    // ─── Helpers ──────────────────────────────────────
    function slide(i) { return document.querySelector('[data-s="' + i + '"]'); }

    // ─── Clavier ──────────────────────────────────────
    document.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight' || e.key === 'ArrowDown') go(1);
        if (e.key === 'ArrowLeft'  || e.key === 'ArrowUp')   go(-1);
    });
    </script>
</body>
</html>