<!DOCTYPE html>
<html lang="fr" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - 404</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-slate-100 transition-colors duration-300 min-h-screen flex items-center justify-center overflow-hidden relative">

    <div class="absolute top-[-10%] left-[-10%] w-[400px] h-[400px] rounded-full bg-orange-500/10 dark:bg-orange-500/5 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] rounded-full bg-blue-600/10 dark:bg-blue-600/5 blur-3xl pointer-events-none"></div>

    <div class="container mx-auto px-6 py-12 text-center max-w-2xl relative z-10">

        <div class="relative inline-block heavy-text select-none">
            <h1 class="text-[120px] sm:text-[180px] font-black tracking-tighter leading-none text-gray-900 dark:text-white drop-shadow-sm">
                404
            </h1>
        </div>

        <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-blue-900 dark:text-blue-400 mt-6">
            Oups ! Page non trouvée.
        </h2>

        <p class="mt-4 text-base text-slate-600 dark:text-slate-400 max-w-md mx-auto">
            La page que vous recherchez n'existe pas, a été déplacée ou est temporairement indisponible.
        </p>

        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            @guest
                <a href="{{ url('/') }}" class="w-full sm:w-auto px-6 py-3 rounded-xl font-semibold text-white bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-500 shadow-lg shadow-orange-500/20 dark:shadow-orange-600/10 transition-all transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-orange-500/50">
                    Retour à l'accueil
                </a>
            @endguest
            @auth
                <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto px-6 py-3 rounded-xl font-semibold text-white bg-orange-500 hover:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-500 shadow-lg shadow-orange-500/20 dark:shadow-orange-600/10 transition-all transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-orange-500/50">
                    Retour à la dashboard
                </a>
            @endauth

            <button onclick="window.history.back()" class="w-full sm:w-auto px-6 py-3 rounded-xl font-semibold text-blue-600 dark:text-blue-400 bg-blue-50 hover:bg-blue-100 dark:bg-blue-950/40 dark:hover:bg-blue-950/80 border border-blue-200/60 dark:border-blue-900/50 transition-all transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500/30">
                Page précédente
            </button>
        </div>

        <div class="mt-16 pt-8 border-t border-slate-200 dark:border-slate-800/60 text-sm text-slate-400 dark:text-slate-500">
            Besoin d'aide ? <a href="/contact" class="text-orange-500 dark:text-orange-400 hover:underline">Contactez le support</a> ou visitez notre <a href="/faq" class="text-blue-500 dark:text-blue-400 hover:underline">FAQ</a>.
        </div>
    </div>
</body>

</html>