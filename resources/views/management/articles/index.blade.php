<x-site-layout>
    <h1 class="text-4xl font-bold mb-6">All Articles</h1>

    
    <a href="{{ route('management.articles.create') }}" 
       class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg shadow mb-6">
        <x-primary-button>
            New article
        </x-primary-button>

    </a>

    @if ($articles->isEmpty())
        <p class="text-gray-500">No articles yet.</p>
    @else
        <ul class="space-y-6">
            @foreach ($articles as $article)
                <div class="bg-white shadow rounded-lg p-6 mb-6">
                    <h2 class="text-2xl font-semibold">
                        <a href="{{ route('articles.show', $article) }}" 
                           class="text-violet-600 hover:underline">
                            {{ $article->title }}
                        </a>
                    </h2>

                    <p class="text-sm text-gray-600">
                        By {{ $article->author?->name ?? 'Unknown author' }},
                        {{ $article->created_at ? $article->created_at->format('d.m.Y') : 'No date available' }}
                    </p>
                    <p class="mt-2 text-gray-800">
                        {{ \Illuminate\Support\Str::limit(strip_tags($article->content), 140) }}
                    </p>

                    @if($article->ingredients?->count())
                        <div class="mt-2">
                            <h3 class="font-semibold">Healthy ingredients (7):</h3>
                            <ul class="list-disc list-inside text-sm text-gray-700">
                                @foreach ($article->ingredients->take(7) as $ingredient)
                                    <li>1 {{ strtolower($ingredient->name) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            @endforeach
        </ul>
    @endif
</x-site-layout>
