<x-app-layout>

    <div class="min-h-screen flex items-center justify-center px-10">

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">

            <h1 class="text-3xl font-bold dark:text-white text-center mt-4">
                Formulaire de contact
            </h1>

            <form action="/contact" method="POST" class="space-y-8">
                @csrf

                <div class="px-6 md:px-4 gap-2">
                    <x-input-label class="block text-gray-300 mb-3 text-sm" for="nom" :value="__('Votre nom')" />
                    <x-text-input
                        type="text"
                        name="nom"
                        placeholder="Votre nom" 
                        class="w-full" />
                </div>

                <div class="px-6 md:px-4 gap-2">
                    <x-input-label class="block text-gray-300 mb-3 text-sm" for="email" :value="__('Votre email')" />
                    <x-text-input
                        type="email"
                        name="email"
                        placeholder="Votre email"
                        class="w-full" />
                </div>

                <div class="px-6 md:px-4 gap-2">
                    <x-input-label class="block text-gray-300 mb-3 text-sm" for="message" :value="__('Votre message')" />
                    <textarea
                        name="message"
                        rows="6"
                        placeholder="Votre message"
                        required
                        class="w-full px-5 py-4 rounded-xl focus:outline-none border-gray-300 dark:border-gray-700
                        transition-colors duration-150 ease-in-out focus:border-orange-500
                        focus:ring-orange-500
                        dark:focus:border-blue-500
                        dark:focus:ring-blue-500 dark:bg-gray-900 dark:text-white"></textarea>
                </div>

                <div class="flex justify-center">
                    <x-primary-button class="reveal ms-3 mb-4">
                        {{ __(' Soumettre') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>