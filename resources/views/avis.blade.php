<x-app-layout>

    <div class="reveal opacity-0 max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-12">
        
        <h1 class="text-6xl text-white text-center my-24 font-bold">
            Avis des utilisateurs
        </h1>

        @foreach ($avis as $unAvis)
            <div class="reveal bg-white dark:bg-gray-800 rounded-xl px-6 py-6 md:px-12 md:py-8">

                <div class="w-full flex items-center justify-between py-4">
                    
                    <h2 class="text-4xl dark:text-white font-bold">
                        {{ $unAvis->utilisateur?->name ?? 'Utilisateur' }}
                    </h2>

                    <div class="flex gap-1">
                        @for ($i = 1; $i <= $unAvis->note; $i++)
                            <img
                                width="40"
                                src="/assets/icons/star.svg"
                                alt="étoile">
                        @endfor
                    </div>

                </div>

                <p class="text-gray-500 leading-relaxed">
                    {{ $unAvis->commentaire }}
                </p>

            </div>
        @endforeach
    </div>

    <div class="reveal flex items-center justify-center px-10">

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

        <h1 class="text-3xl font-bold dark:text-white text-center mt-4">
            Laisser un avis
        </h1>

        <form action="/avis" method="POST" class="space-y-8">
            @csrf

            <div class="px-6 md:px-4 gap-2">
                <x-input-label class="block text-gray-300 mb-3 text-sm" for="note" :value="__('Note (1 à 5)')" />

                <x-text-input
                    type="number"
                    name="note"
                    min="1"
                    max="5"
                    placeholder="Note sur 5"
                    class="w-full" />
            </div>

            <div class="px-6 md:px-4 gap-2">
                <x-input-label class="block text-gray-300 mb-3 text-sm" for="commentaire" :value="__('Votre commentaire')" />

                <textarea
                    name="commentaire"
                    rows="6"
                    placeholder="Votre avis..."
                    class="w-full px-5 py-4 rounded-xl focus:outline-none border-gray-300 dark:border-gray-700
                    transition-colors duration-150 ease-in-out focus:border-orange-500
                    focus:ring-orange-500
                    dark:focus:border-blue-500
                    dark:focus:ring-blue-500 dark:bg-gray-900 dark:text-white"></textarea>
            </div>

            <div class="flex justify-center">
                <x-primary-button class="reveal ms-3 mb-4">
                    {{ __('Envoyer l\'avis') }}
                </x-primary-button>
            </div>

        </form>

    </div>
</div>

    <script src="/assets/js/anims.js"></script>

</x-app-layout>