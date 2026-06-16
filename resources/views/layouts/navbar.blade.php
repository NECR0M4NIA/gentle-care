<nav class="flex flex-row bg-white w-full justify-between">
    <h1>Gentle Care</h1>
    <div>
        @auth
            <a href="/">Home</a>
            <a href="/">Dashboard</a>
            <a href="/">Jeux</a>
            <a href="/">Vidéos</a>
        @endauth
    </div>
    <div>
        @guest
            <a href="/register">Register</a>
            <a href="/login">Login</a>
        @endguest
    </div>
</nav>