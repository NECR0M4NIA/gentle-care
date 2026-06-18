<x-app-layout>
    <form action="" method="post">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-12">
            <!-- Catégorie -->
            <h1 class="text-6xl text-white my-4 text-center font-bold"></h1>

            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Question -->
                <h2 class="text-6xl text-white font-bold">Question</h2>
                <!-- Ordre -->
                <p class="text-6xl text-white font-bold">1/20</p>
            </div>


            <!-- Choix -->
            <div class="flex flex-col md:flex-row items-center justify-center bg-gray-200 bg-opacity-50 rounded-xl px-6 py-2 md:px-12 md:py-2 gap-1">
                 <input type="radio" id="choice_1" value="">
                 <label class="text-4xl text-black text-center my-4 font-bold" for="choice_1">Choix 1</label>
            </div>

            <!-- <div class="flex flex-col md:flex-row items-center justify-center bg-gray-200 bg-opacity-50 rounded-xl px-6 py-2 md:px-12 md:py-2 gap-1">
                <h1 class="text-4xl text-white text-center my-4 font-bold">Choix</h1>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center bg-gray-200 bg-opacity-50 rounded-xl px-6 py-2 md:px-12 md:py-2 gap-1">
                <h1 class="text-4xl text-white text-center my-4 font-bold">Choix</h1>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-center bg-gray-200 bg-opacity-50 rounded-xl px-6 py-2 md:px-12 md:py-2 gap-1">
                <h1 class="text-4xl text-white text-center my-4 font-bold">Choix</h1>
            </div> -->

            <div class="rounded-xl bg-[#FF8D28] dark:bg-[#4B83F5] hover:bg-[#e08f3e] dark:hover:bg-[#566495] text-white py-1.5 px-4 shadow-sm cursor-pointer ml-auto">
                <button type="submit" class="text-4xl text-white text-center my-2 font-bold">Suivant</button>
            </div>
    </form>

</x-app-layout>