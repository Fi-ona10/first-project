<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'My App') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 text-slate-800 font-serif">

    <!-- NAVIGATION BAR -->
    <nav class="bg-white border-b border-slate-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">
                    MyBlog
                </a>

                <!-- Links -->
                <div class="space-x-6">
                    <a href="{{ route('articles.index') }}" class="text-slate-700 hover:text-indigo-600 font-medium">
                        Articles
                    </a>
                    @auth
                        <a href="{{ route('articles.create') }}" 
                           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
                            ➕ New Article
                        </a>
                        <a href="{{ route('profile.edit') }}" class="text-slate-700 hover:text-indigo-600 font-medium">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-slate-700 hover:text-red-600 font-medium">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-slate-700 hover:text-indigo-600 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="text-slate-700 hover:text-indigo-600 font-medium">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="max-w-4xl mx-auto p-6">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 mt-12 py-6 text-center text-sm text-slate-500">
        © {{ date('Y') }} MyBlog – All rights reserved.
    </footer>
</body>
</html>

