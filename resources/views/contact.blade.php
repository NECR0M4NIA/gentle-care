<x-app-layout>

    <div class="min-h-screen flex items-center justify-center px-10 py-34">

        <div class="w-full max-w-xl bg-gray-800
                    rounded-xl shadow-2xl py-16">

            <h1 class="text-3xl font-bold text-white text-center mb-14">
                Formulaire de contact
            </h1>

            <form action="/contact" method="POST" class="space-y-12">
                @csrf

                <div class="px-6 py-6 md:px-12 md:py-4 gap-2">
                    <label class="block text-gray-300 mb-3 text-sm">
                        Nom
                    </label>
                    <input
                        type="text"
                        name="name"
                        placeholder="Votre nom"
                        required
                        class="w-full px-5 py-4 rounded-xl
                               focus:outline-none focus:ring-2">
                </div>

                <div class="px-6 py-6 md:px-12 md:py-4 gap-2">
                    <label class="block text-gray-300 mb-3 text-sm">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        placeholder="Votre email"
                        required
                        class="w-full px-5 py-4 rounded-xl
                               focus:outline-none focus:ring-2">
                </div>

                <div class="px-6 py-6 md:px-12 md:py-4 gap-2">
                    <label class="block text-gray-300 mb-3 text-sm">
                        Message
                    </label>
                    <textarea
                        name="message"
                        rows="6"
                        placeholder="Votre message"
                        required
                        class="w-full px-5 py-4 rounded-xl
                               focus:outline-none focus:ring-2"></textarea>
                </div>

                <div class="pt-6 flex justify-center">
                    <button
                        type="submit"
                        class="px-10 py-3 rounded-xl bg-blue-600
                               hover:bg-blue-700 text-white font-semibold
                               transition duration-300 hover:scale-105">
                        Soumettre
                    </button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>