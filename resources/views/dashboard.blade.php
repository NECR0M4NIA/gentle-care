<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bienvenue, {{ Auth::user()->name }} !
        </h2>
    </x-slot>

    @if(auth()->user() && auth()->user()->role === 'admin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-gray-200 dark:text-white text-4xl mb-12">Utilisateurs</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full border-collapse bg-white dark:bg-gray-800 text-center text-sm text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>E-Mail</th>
                            <th>E-Mail vérifié le</th>
                            <th>Rôle</th>
                            <th>Créé le</th>
                            <th>Mit à jour le</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @if(auth()->user() && auth()->user()->role === 'user')
    <!--  -->
    @endif
</x-app-layout>