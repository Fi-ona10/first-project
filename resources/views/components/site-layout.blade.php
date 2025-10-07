<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Healthy Recipes</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="">
    
<header class="max-w-6xl mx-auto bg-violet-500 text-xl text-white mb-4 flex items-center justify-between h-12 px-4">
    <div class="font-bold">
        Healthy Recipes!
    </div>

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
</header>

<main class="max-w-6xl mx-auto px-4 py-4">
    {{$slot}}
</main> 

<footer class="bg-violet-300 text-white mt-12 min-h-20">
    <div class="max-w-6xl mx-auto px-20 py-4">
        High protein recipes for a healthy lifestyle.
    </div>
</footer>
</body>
</html>
