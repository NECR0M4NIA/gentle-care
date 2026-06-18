<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Quiz
        </h2>
    </x-slot>

      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-12">
        <h1 class="text-6xl text-white text-center my-8 font-bold">Chapitre 1</h1>

        <div class="flex flex-col md:flex-row items-center justify-between">
            <h1 class="text-6xl text-white my-8 font-bold">Question</h1>
            <h1 class="text-6xl text-white my-8 font-bold">1/20</h1>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center bg-gray-200 rounded-xl px-6 py-6 md:px-12 md:py-8 gap-8">
            <h1 class="text-6xl text-white text-center my-8 font-bold">Choix</h1>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center bg-gray-200 rounded-xl px-6 py-6 md:px-12 md:py-8 gap-8">
            <h1 class="text-6xl text-white text-center my-8 font-bold">Choix</h1>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center bg-gray-200 rounded-xl px-6 py-6 md:px-12 md:py-8 gap-8">
            <h1 class="text-6xl text-white text-center my-8 font-bold">Choix</h1>
        </div>

        <div class="flex flex-col md:flex-row items-center justify-center bg-gray-200 rounded-xl px-6 py-6 md:px-12 md:py-8 gap-8">
            <h1 class="text-6xl text-white text-center my-8 font-bold">Choix</h1>
        </div>

        <div class="rounded-xl bg-[#FF8D28] dark:bg-[#4B83F5] hover:bg-[#e08f3e] dark:hover:bg-[#566495] text-white py-1.5 px-4 shadow-sm cursor-pointer ml-auto">
            <h1 class="text-4xl text-white text-center my-6 font-bold">Suivant</h1>
        </div>
</x-app-layout>