    <x-app-layout>

        <h1 class="opacity-0 reveal text-center text-6xl py-24 text-white font-bold">Playground</h1>

        <!-- Conteneur de la grille -->
        <div class="reveal opacity-0 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Carte 1 (Exemple) -->
                <div class="reveal bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col border border-gray-700">
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
                                <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-blue-950 to-blue-600 flex items-center justify-center text-white text-xs font-bold">
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
                <div class="reveal bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col border border-gray-700">
                    <div class="relative h-48 overflow-hidden bg-gray-900">
                        <img src="/assets/images/games/tictactoe.png" alt="Aperçu du jeu" class="w-full h-full object-cover">
                        <span class="absolute top-4 right-4 bg-[#31C3BD] text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">Quiz</span>
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-2">Morpion</h2>
                            <p class="text-gray-400 text-sm mb-4">Un grand classique indémodable où la rapidité d'esprit est de mise pour aligner trois symboles identiques. Soyez le premier à remplir une ligne, une colonne ou une diagonale avant que la grille ne soit saturée !</p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-gray-700 flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="h-8 w-8 rounded-full bg-gradient-to-tr from-blue-950 to-blue-600 flex items-center justify-center text-white text-xs font-bold">
                                    NM
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 font-medium">Créé par</p>
                                    <p class="text-sm font-semibold text-gray-300">NECRO MANIA</p>
                                </div>
                            </div>
                            <a href="https://necr0m4nia.github.io/tic-tac-toe/" class="inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-white bg-[#31C3BD] hover:bg-cyan-800 rounded-xl transition-colors">
                                Jouer
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="/assets/js/anims.js"></script>

    </x-app-layout>