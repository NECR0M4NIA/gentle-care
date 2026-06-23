<?php

use App\Models\Citation;

$citations = Citation::all(['author', 'content']);

?>

<x-app-layout>
    @if(auth()->user() && auth()->user()->role === 'user')
    @if(!$hasCompletedQuestionnaire)
    <div id="modal" class="fixed text-center inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-sm">
        <div class="bg-white/25 backdrop-blur-md rounded-2xl p-10 max-w-lg w-full mx-4" style="border: 1px solid rgba(255,255,255,0.3)">

            <h2 class="text-3xl font-bold text-white mb-6">
                Questionnaire du bien-être
            </h2>

            <p class="text-white/80 leading-relaxed mb-10 text-base">
                Bienvenue sur GentleCare ! Avant de commencer, prends 2 minutes
                pour répondre à notre questionnaire. Il nous permet de mieux
                comprendre comment tu te sens et de te proposer du contenu adapté 💛
            </p>

            <div class="flex justify-center">
                <a href="{{ route('questionnaire.show', 1) }}"
                    class="border border-white/60 text-white font-bold tracking-widest text-sm px-16 py-3 rounded-full hover:bg-white/10 transition">
                    SUIVANT
                </a>
            </div>
        </div>
    </div>
    @endif

    <h1>Bienvenue {{ Auth::user()->name }}</h1>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h2 class="text-white text-2xl font-bold mb-6">Mon évolution</h2>

        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">

            {{-- Légende --}}
            <div class="flex items-center gap-6 mb-6 flex-wrap">
                <span class="flex items-center gap-2 text-sm text-white/70">
                    <span class="w-2 h-2 rounded-full bg-green-400 inline-block"></span>Bien
                </span>
                <span class="flex items-center gap-2 text-sm text-white/70">
                    <span class="w-2 h-2 rounded-full bg-yellow-400 inline-block"></span>Coup de mou
                </span>
                <span class="flex items-center gap-2 text-sm text-white/70">
                    <span class="w-2 h-2 rounded-full bg-red-400 inline-block"></span>Mal-être
                </span>
            </div>

            {{-- Graphique + barres --}}
            <div class="flex flex-col md:flex-row items-center gap-8">

                {{-- Donut --}}
                <div class="relative w-52 h-52 flex-shrink-0">
                    <canvas id="scoreChart"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="text-3xl font-semibold text-white" id="centerScore"></span>
                        <span class="text-xs text-white/50 mt-1">Mon score</span>
                    </div>
                </div>

                {{-- Barres de progression --}}
                <div class="flex-1 w-full flex flex-col gap-4">
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-white/60 w-28 shrink-0">Bien (0–20)</span>
                        <div class="flex-1 h-1.5 bg-white/10 rounded-full overflow-hidden">
                            <div id="barVert" class="h-full bg-green-400 rounded-full transition-all duration-700" style="width: 0%"></div>
                        </div>
                        <span id="valVert" class="text-sm font-medium text-white w-6 text-right"></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-white/60 w-28 shrink-0">Coup de mou</span>
                        <div class="flex-1 h-1.5 bg-white/10 rounded-full overflow-hidden">
                            <div id="barJaune" class="h-full bg-yellow-400 rounded-full transition-all duration-700" style="width: 0%"></div>
                        </div>
                        <span id="valJaune" class="text-sm font-medium text-white w-6 text-right"></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-white/60 w-28 shrink-0">Mal-être</span>
                        <div class="flex-1 h-1.5 bg-white/10 rounded-full overflow-hidden">
                            <div id="barRouge" class="h-full bg-red-400 rounded-full transition-all duration-700" style="width: 0%"></div>
                        </div>
                        <span id="valRouge" class="text-sm font-medium text-white w-6 text-right"></span>
                    </div>

                    <div class="border-t border-white/10 pt-3 flex justify-between">
                        <span class="text-xs text-white/40">Restant</span>
                        <span id="valReste" class="text-xs text-white/40"></span>
                    </div>
                </div>
            </div>
            {{-- Citation aléatoire --}}
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 mt-4">
                <div id="citation-container" class="flex flex-col items-center text-center min-h-[80px] justify-center transition-opacity duration-500">
                    <p id="citation-contenu" class="text-white/80 italic text-base leading-relaxed"></p>
                    <span id="citation-auteur" class="text-white/40 text-sm mt-3"></span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const scores = @json($scores);
        const dernierScore = scores.length > 0 ? scores[scores.length - 1] : 0;

        const vert = Math.min(dernierScore, 20);
        const jaune = Math.max(0, Math.min(dernierScore - 20, 20));
        const rouge = Math.max(0, dernierScore - 40);
        const reste = 60 - dernierScore;

        document.getElementById('centerScore').textContent = dernierScore + ' / 60';
        document.getElementById('valVert').textContent = vert;
        document.getElementById('valJaune').textContent = jaune;
        document.getElementById('valRouge').textContent = rouge;
        document.getElementById('valReste').textContent = reste + ' pts';

        setTimeout(() => {
            document.getElementById('barVert').style.width = (vert / 20 * 100) + '%';
            document.getElementById('barJaune').style.width = (jaune / 20 * 100) + '%';
            document.getElementById('barRouge').style.width = (rouge / 20 * 100) + '%';
        }, 100);

        new Chart(document.getElementById('scoreChart'), {
            type: 'doughnut',
            data: {
                labels: ['Bien', 'Coup de mou', 'Mal-être', 'Restant'],
                datasets: [{
                    data: [vert, jaune, rouge, reste],
                    backgroundColor: [
                        '#4ade80',
                        '#facc15',
                        '#f87171',
                        'rgba(255,255,255,0.08)',
                    ],
                    borderWidth: 0,
                    hoverOffset: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '72%',
                animation: {
                    animateRotate: true,
                    duration: 900,
                    easing: 'easeInOutQuart',
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(ctx) {
                                if (ctx.label === 'Restant') return '';
                                return ctx.label + ' : ' + ctx.parsed + ' pts';
                            }
                        },
                        backgroundColor: 'rgba(0,0,0,0.7)',
                        titleColor: '#fff',
                        bodyColor: 'rgba(255,255,255,0.7)',
                        borderColor: 'rgba(255,255,255,0.15)',
                        borderWidth: 1,
                        padding: 10,
                        cornerRadius: 8,
                    }
                }
            },
            plugins: [{
                id: 'centerText',
                afterDraw(chart) {
                    const {
                        ctx,
                        chartArea: {
                            width,
                            height,
                            left,
                            top
                        }
                    } = chart;
                    ctx.save();
                    ctx.restore();
                }
            }]
        });
    </script>
    <script>
        const citations = @json($citations);
        let currentIndex = null;

        function getRandomIndex() {
            if (citations.length <= 1) return 0;
            let next;
            do {
                next = Math.floor(Math.random() * citations.length);
            }
            while (next === currentIndex);
            return next;
        }

        function afficherCitation() {
            const container = document.getElementById('citation-container');

            // Fade out
            container.style.opacity = '0';

            setTimeout(() => {
                currentIndex = getRandomIndex();
                const c = citations[currentIndex];
                document.getElementById('citation-contenu').textContent = '« ' + c.content + ' »';
                document.getElementById('citation-auteur').textContent = '— ' + c.author;

                // Fade in
                container.style.opacity = '1';
            }, 500);
        }

        if (citations.length > 0) {
            afficherCitation();
            setInterval(afficherCitation, 30000);
        }
    </script>
    @endif

    @if(auth()->user() && auth()->user()->role === 'admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-gray-300 dark:text-white text-4xl mb-6">Utilisateurs</h1>

            {{-- Barre de recherche + filtres --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 mb-4 flex flex-wrap gap-3 items-center">

                {{-- Recherche --}}
                <div class="relative flex-1 min-w-[200px]">
                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.35-4.35" />
                        </svg>
                    </span>
                    <input
                        id="searchInput"
                        type="text"
                        placeholder="Rechercher par ID, nom, email..."
                        class="w-full pl-9 pr-3 py-2 text-sm rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                </div>

                {{-- Filtre role --}}
                <select id="filterRole" class="text-sm rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                    <option value="">Tous les roles</option>
                    <option value="user">Utilisateurs</option>
                    <option value="admin">Admins</option>
                </select>

                {{-- Tri colonne --}}
                <select id="sortCol" class="text-sm rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                    <option value="id">Trier par ID</option>
                    <option value="name">Trier par Nom</option>
                    <option value="email">Trier par Email</option>
                    <option value="date">Trier par Date</option>
                </select>

                {{-- Tri direction --}}
                <button id="sortDir" title="Inverser l'ordre"
                    class="flex items-center gap-1.5 text-sm rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-200 px-3 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition select-none">
                    <svg id="sortDirIcon" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9M3 12h5m10 4V6m0 0 3 3m-3-3-3 3" />
                    </svg>
                    <span id="sortDirLabel">Croissant</span>
                </button>

                {{-- Compteur --}}
                <span id="resultCount" class="ml-auto text-xs text-gray-400 dark:text-gray-500 whitespace-nowrap"></span>
            </div>

            {{-- Tableau --}}
            <div class="reveal bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400" id="usersTable">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Nom</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">E-Mail verifie le</th>
                            <th class="px-6 py-3">Role</th>
                            <th class="px-6 py-3">Date d'inscription</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="usersBody">
                        @foreach($users as $user)
                        <tr
                            class="user-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-opacity duration-150"
                            data-id="{{ $user->id_utilisateur }}"
                            data-name="{{ strtolower($user->name) }}"
                            data-email="{{ strtolower($user->email) }}"
                            data-role="{{ $user->role }}"
                            data-date="{{ $user->created_at->timestamp }}">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $user->id_utilisateur }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->email_verified_at }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded-full text-xs font-semibold
                                    {{ $user->role === 'admin'
                                        ? 'bg-indigo-100 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-300'
                                        : 'bg-gray-100 text-gray-600 dark:bg-gray-700 dark:text-gray-300' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-6 py-4 text-center">
                                @if ($user->role !== 'admin')
                                <form action="{{ route('admin.users.destroy', $user->id_utilisateur) }}" method="POST"
                                    onsubmit="return confirm('Etes-vous sur de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 font-medium px-3 py-1 rounded bg-red-50 dark:bg-red-900/20 hover:bg-red-100 transition-colors">
                                        Supprimer
                                    </button>
                                </form>
                                @else
                                <span class="text-gray-300 dark:text-gray-600 text-xs">—</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Etat vide --}}
                <div id="emptyState" class="hidden py-16 text-center text-gray-400 dark:text-gray-500">
                    <svg class="w-10 h-10 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75 21 21m-6.75-6.75A7.5 7.5 0 1 0 3 10.5a7.5 7.5 0 0 0 12 5.25Z" />
                    </svg>
                    <p class="text-sm">Aucun utilisateur ne correspond a votre recherche.</p>
                </div>
            </div>

        </div>
    </div>
    @endif

    @if(auth()->user() && auth()->user()->role === 'user')
    <!--  -->
    @endif

    <script>
        (function() {
            var searchInput = document.getElementById('searchInput');
            var filterRole = document.getElementById('filterRole');
            var sortColEl = document.getElementById('sortCol');
            var sortDirBtn = document.getElementById('sortDir');
            var sortDirLabel = document.getElementById('sortDirLabel');
            var sortDirIcon = document.getElementById('sortDirIcon');
            var tbody = document.getElementById('usersBody');
            var emptyState = document.getElementById('emptyState');
            var resultCount = document.getElementById('resultCount');

            var sortAsc = true;

            /* Toggle direction */
            sortDirBtn.addEventListener('click', function() {
                sortAsc = !sortAsc;
                sortDirLabel.textContent = sortAsc ? 'Croissant' : 'Decroissant';
                sortDirIcon.style.transform = sortAsc ? '' : 'scaleY(-1)';
                apply();
            });

            /* Listeners */
            searchInput.addEventListener('input', apply);
            filterRole.addEventListener('change', apply);
            sortColEl.addEventListener('change', apply);

            function apply() {
                var query = searchInput.value.toLowerCase().trim();
                var role = filterRole.value;
                var col = sortColEl.value;

                var rows = Array.from(tbody.querySelectorAll('tr.user-row'));

                /* 1. Filtrer */
                var visible = rows.filter(function(row) {
                    var matchSearch = !query ||
                        row.dataset.id.includes(query) ||
                        row.dataset.name.includes(query) ||
                        row.dataset.email.includes(query);
                    var matchRole = !role || row.dataset.role === role;
                    return matchSearch && matchRole;
                });

                /* 2. Trier */
                visible.sort(function(a, b) {
                    var va, vb;
                    if (col === 'id') {
                        va = parseInt(a.dataset.id, 10);
                        vb = parseInt(b.dataset.id, 10);
                    } else if (col === 'name') {
                        va = a.dataset.name;
                        vb = b.dataset.name;
                    } else if (col === 'email') {
                        va = a.dataset.email;
                        vb = b.dataset.email;
                    } else {
                        va = parseInt(a.dataset.date, 10);
                        vb = parseInt(b.dataset.date, 10);
                    }
                    if (va < vb) return sortAsc ? -1 : 1;
                    if (va > vb) return sortAsc ? 1 : -1;
                    return 0;
                });

                /* 3. Masquer toutes les lignes */
                rows.forEach(function(row) {
                    row.style.display = 'none';
                });

                /* 4. Reinserer les lignes visibles dans le bon ordre */
                visible.forEach(function(row) {
                    row.style.display = '';
                    tbody.appendChild(row);
                });

                /* 5. Etat vide + compteur */
                if (visible.length === 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }

                var total = rows.length;
                resultCount.textContent = visible.length + ' / ' + total + ' utilisateur' + (total > 1 ? 's' : '');
            }

            /* Init du compteur */
            apply();
        })();
    </script>

</x-app-layout>