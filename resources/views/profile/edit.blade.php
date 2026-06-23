<x-app-layout>
    <div x-data="accessibility()" x-init="init()">

        <h1 class="text-center text-xl text-white font-bold p-6">Modifier votre profil</h1>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <section class="p-6 bg-white text-black dark:bg-gray-800 dark:text-white rounded-lg shadow">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 py-2">Accessibilité daltonisme</h2>
                    <div class="flex flex-wrap gap-2">

                    <button
  @click="toggle('normal')"
  :class="mode === 'normal'
    ? 'bg-orange-500 dark:bg-blue-500 text-white ring-2 ring-black/30 dark:ring-white/30'
    : 'bg-gray-200 dark:bg-gray-700 text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600'"
  class="px-4 py-2 rounded-md text-sm font-medium uppercase tracking-wide transition-colors duration-200">
  Normal
</button>

<button
  @click="toggle('protanopia')"
  :class="mode === 'protanopia'
    ? 'bg-orange-500 dark:bg-blue-500 text-white ring-2 ring-black/30 dark:ring-white/30'
    : 'bg-gray-200 dark:bg-gray-700 text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600'"
  class="px-4 py-2 rounded-md text-sm font-medium uppercase tracking-wide transition-colors duration-200">
  Protanopie
</button>

<button
  @click="toggle('deuteranopia')"
  :class="mode === 'deuteranopia'
    ? 'bg-orange-500 dark:bg-blue-500 text-white ring-2 ring-black/30 dark:ring-white/30'
    : 'bg-gray-200 dark:bg-gray-700 text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600'"
  class="px-4 py-2 rounded-md text-sm font-medium uppercase tracking-wide transition-colors duration-200">
  Deutéranopie
</button>

<button
  @click="toggle('tritanopia')"
  :class="mode === 'tritanopia'
    ? 'bg-orange-500 dark:bg-blue-500 text-white ring-2 ring-black/30 dark:ring-white/30'
    : 'bg-gray-200 dark:bg-gray-700 text-black dark:text-white hover:bg-gray-300 dark:hover:bg-gray-600'"
  class="px-4 py-2 rounded-md text-sm font-medium uppercase tracking-wide transition-colors duration-200">
  Tritanopie
</button>

                    </div>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 py-2">
                        Le filtre s’applique à toute la page (UI, images, composants Laravel inclus).
                    </p>

                </section>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>