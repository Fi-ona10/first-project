<x-site-layout>
    <main class="max-w-6xl mx-auto px-4 py-4">
        <h1 class="text-4xl font-bold mb-6">{{ $author->name }}</h1>
        <p class="text-gray-500 mb-8">{{ $author->email }}</p>

        <h2 class="text-2xl font-bold mb-4">List of Articles</h2>

        @if($author->articles->isEmpty())
            <p class="text-gray-500">This author has not published any articles yet.</p>
        @else
            <ul class="space-y-2">
                @foreach($author->articles as $article)
                    <li>
                        <a href="{{ route('articles.show', $article->id) }}" 
                           class="text-blue-600 hover:underline">
                            {{ $article->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
</x-site-layout>

