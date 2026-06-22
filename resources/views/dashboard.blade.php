<x-app-layout>

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
                            <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                        </svg>
                    </span>
                    <input
                        id="searchInput"
                        type="text"
                        placeholder="Rechercher par ID, nom, email..."
                        class="w-full pl-9 pr-3 py-2 text-sm rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition"
                    >
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9M3 12h5m10 4V6m0 0 3 3m-3-3-3 3"/>
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
                            data-date="{{ $user->created_at->timestamp }}"
                        >
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75 21 21m-6.75-6.75A7.5 7.5 0 1 0 3 10.5a7.5 7.5 0 0 0 12 5.25Z"/>
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

    @livewireScripts

    <script>
    (function () {
        var searchInput  = document.getElementById('searchInput');
        var filterRole   = document.getElementById('filterRole');
        var sortColEl    = document.getElementById('sortCol');
        var sortDirBtn   = document.getElementById('sortDir');
        var sortDirLabel = document.getElementById('sortDirLabel');
        var sortDirIcon  = document.getElementById('sortDirIcon');
        var tbody        = document.getElementById('usersBody');
        var emptyState   = document.getElementById('emptyState');
        var resultCount  = document.getElementById('resultCount');

        var sortAsc = true;

        /* Toggle direction */
        sortDirBtn.addEventListener('click', function () {
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
            var role  = filterRole.value;
            var col   = sortColEl.value;

            var rows = Array.from(tbody.querySelectorAll('tr.user-row'));

            /* 1. Filtrer */
            var visible = rows.filter(function (row) {
                var matchSearch = !query
                    || row.dataset.id.includes(query)
                    || row.dataset.name.includes(query)
                    || row.dataset.email.includes(query);
                var matchRole = !role || row.dataset.role === role;
                return matchSearch && matchRole;
            });

            /* 2. Trier */
            visible.sort(function (a, b) {
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
                if (va > vb) return sortAsc ?  1 : -1;
                return 0;
            });

            /* 3. Masquer toutes les lignes */
            rows.forEach(function (row) {
                row.style.display = 'none';
            });

            /* 4. Reinserer les lignes visibles dans le bon ordre */
            visible.forEach(function (row) {
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