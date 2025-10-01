{{-- resources/views/welcome.blade.php --}}
<x-site-layout>
    <div class="max-w-4xl mx-auto py-10">
        <header class="flex justify-end mb-6">
            @if (Route::has('login'))
                <nav class="flex gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-blue-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-blue-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-blue-500">Register</a>
                        @endif
                    @endauth
                    @auth
                        <p class="mb-4">Welcome back, {{ Auth::user()->name }}!</p>
                    @endauth
                </nav>
            @endif
        </header>

        <h1 class="text-3xl font-bold mb-6">Latest Articles</h1>

        @forelse($articles as $article)
            <div class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold">{{ $article->title }}</h2>
                <p>{{ Str::limit($article->content, 150) }}</p>
                <a href="{{ route('articles.show', $article) }}" class="text-blue-500 hover:underline">
                    Read more →
                </a>
            </div>
        @empty
            <p>No articles available yet.</p>
        @endforelse
    </div>
</x-site-layout>
