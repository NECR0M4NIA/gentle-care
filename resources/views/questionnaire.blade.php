<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-12 py-8">

        {{-- Catégorie --}}
        <h1 class="text-4xl text-white text-center font-bold">
            {{ $question->categorie->nom_categorie }}
        </h1>

        {{-- Question + Ordre --}}
        <div class="flex flex-col md:flex-row items-center justify-between">
            <h2 class="text-4xl text-white font-bold">
                {{ $question->titre_question }}
            </h2>
            <p class="text-2xl text-white font-bold opacity-70">
                {{ $ordre }} / {{ $total }}
            </p>
        </div>

        {{-- Formulaire --}}
        <form action="{{ route('questionnaire.store', $id_questionnaire) }}" method="POST">
            @csrf
            <input type="hidden" name="id_question" value="{{ $question->id_question }}">
            <input type="hidden" name="ordre"       value="{{ $ordre }}">

            <div class="flex flex-col gap-4">
                @foreach ($question->choix as $choix)
                    <label for="choix_{{ $choix->id_choix }}"
                           class="flex items-center gap-4 bg-gray-200 bg-opacity-50 rounded-xl px-8 py-5 cursor-pointer hover:bg-opacity-70 transition">
                        <input
                            type="radio"
                            id="choix_{{ $choix->id_choix }}"
                            name="id_choix"
                            value="{{ $choix->id_choix }}"
                            class="w-5 h-5 accent-orange-400"
                            required
                        >
                        <span class="text-2xl text-black font-bold">
                            {{ $choix->nom_choix }}
                        </span>
                        {{-- La valeur_choix est dans la BDD, pas besoin de l'afficher --}}
                    </label>
                @endforeach
            </div>

            @error('id_choix')
                <p class="text-red-400 mt-2">Merci de sélectionner une réponse.</p>
            @enderror

            <div class="mt-8 flex justify-end">
                <button type="submit"
                        class="rounded-xl bg-[#FF8D28] dark:bg-[#4B83F5] hover:bg-[#e08f3e] dark:hover:bg-[#566495] text-white py-3 px-8 text-2xl font-bold shadow-sm transition">
                    Suivant
                </button>
            </div>
        </form>
    </div>
</x-app-layout>