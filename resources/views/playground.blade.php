<x-app-layout>

    <h1 class="text-center text-6xl my-24 text-white font-bold">Playground</h1>

    <!-- Conteneur de la grille -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Carte 1 (Exemple) -->
            <div class="bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col border border-gray-700">
                <!-- Image de l'activité -->
                <div class="relative h-48 overflow-hidden bg-gray-900">
                    <img src="/assets/images/games/connect-four.png" alt="Aperçu du jeu" class="w-full h-full object-cover">
                    <!-- Badge optionnel (ex: catégorie) -->
                    <span class="absolute top-4 right-4 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Arcade</span>
                </div>
                
                <!-- Contenu du texte -->
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2">Puissance Quatre</h2>
                        <p class="text-gray-400 text-sm mb-4">Le célèbre jeu de stratégie où deux joueurs s'affrontent pour aligner quatre jetons de leur couleur. Soyez plus malin que votre adversaire en bloquant ses coups tout en préparant votre propre victoire !</p>
                    </div>
                    
                    <!-- Infos Créateur + Bouton -->
                    <div class="mt-6 pt-4 border-t border-gray-700 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <!-- Avatar du créateur -->
                            <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-pink-500 to-yellow-500 flex items-center justify-center text-white text-xs font-bold">
                                NM
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Créé par</p>
                                <p class="text-sm font-semibold text-gray-300">NECR0M4NIA</p>
                            </div>
                        </div>
                        
                        <!-- Lien vers le jeu -->
                        <a href="https://necr0m4nia.github.io/connect-four-game/" target="_blank" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white bg-purple-600 hover:bg-purple-500 rounded-xl transition-colors">
                            Jouer
                        </a>
                    </div>
                </div>
            </div>

            <!-- Carte 2 (Exemple) -->
            <div class="bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col border border-gray-700">
                <div class="relative h-48 overflow-hidden bg-gray-900">
                    <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&q=80&w=500" alt="Aperçu du jeu" class="w-full h-full object-cover">
                    <span class="absolute top-4 right-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Quiz</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2">Devine le Code</h2>
                        <p class="text-gray-400 text-sm mb-4">Un jeu de logique où tu dois deviner la combinaison secrète en un minimum de coups.</p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-gray-700 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-green-400 to-blue-500 flex items-center justify-center text-white text-xs font-bold">
                                SC
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Créé par</p>
                                <p class="text-sm font-semibold text-gray-300">Sarah Connor</p>
                            </div>
                        </div>
                        <a href="https://necr0m4nia.github.io/tic-tac-toe/" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white bg-blue-600 hover:bg-blue-500 rounded-xl transition-colors">
                            Jouer
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>