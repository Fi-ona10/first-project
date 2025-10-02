<x-site-layout>

    <h1 class="text-2xl font-bold mb-6">Latest Articles</h1>

    @if($articles->isEmpty())
        <p>No articles available yet.</p>
    @else
        <ul class="space-y-4">
            @foreach ($articles as $article)
                <li class="border p-4 rounded">
                    <a href="{{ route('articles.show', $article) }}" class="text-blue-600 hover:underline">
                        {{ $article->title }}
                    </a>
                    <p class="text-gray-700 mt-1">{{ Str::limit($article->content, 100) }}</p>
                </li>
            @endforeach
        </ul>
    @endif

</x-site-layout>

