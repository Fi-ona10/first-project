<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthy Recipes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-serif bg-white text-gray-900 flex flex-col min-h-screen">

    <!-- HEADER (volle Breite) -->
    <header class="w-full bg-violet-500 text-xl text-white flex items-center justify-between h-12 px-4">
        <div class="max-w-6xl w-full mx-auto flex items-center justify-between">
            <div>Healthy Recipes!</div>

            <nav class="flex space-x-6">
                <a href="/articles" class="hover:underline">All recipes</a>
                <a href="/authors" class="hover:underline">All authors</a>
            </nav>

            <div class="flex items-center space-x-4">
                @auth
                    <span>{{ auth()->user()->name }}</span>
                    <a href="{{ route('management.articles.create') }}" class="hover:underline">New Article</a>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf 
                        <button type="submit" class="hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="flex-1 w-full">
        <div class="max-w-6xl mx-auto px-4 py-4">
            {{ $slot }}
        </div>
    </main>

    <!-- FOOTER (volle Breite, gleiche Breite wie Header) -->
    <footer class="w-full bg-violet-300 text-white py-6 mt-auto">
        <div class="max-w-6xl mx-auto px-4">
            High protein recipes for a healthy lifestyle.
        </div>
    </footer>

</body>
</html>
