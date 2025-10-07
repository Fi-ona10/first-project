<x-site-layout>

    <h1 class="text-2xl font-bold mb-6">Latest Articles</h1>

    @if($articles->isEmpty())
        <p>No articles available yet.</p>
    @else
        <ul class="space-y-4">
            @foreach ($articles as $article)
                <li class="border p-4 rounded">
                    <!-- Link: Autoren gehen zu Management, alle anderen zu Public -->
                    <a href="{{ auth()->check() && auth()->id() === $article->author_id
                                ? route('management.articles.show', $article)
                                : route('articles.show', $article) }}"
                       class="text-blue-600 hover:underline">
                        {{ $article->title }}
                    </a>

                    <!-- Kurzer Inhalt -->
                    <p class="text-gray-700 mt-1">{{ Str::limit($article->content, 100) }}</p>

                    <!-- Optional: kleine Info für Autor -->
                    @auth
                        @if(auth()->id() === $article->author_id)
                            <span class="text-sm text-green-600 ml-2">(You can manage this article)</span>
                        @endif
                    @endauth
                </li>
            @endforeach
        </ul>
    @endif

</x-site-layout>
