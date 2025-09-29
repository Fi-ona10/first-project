<x-site-layout>
    <h1 class="text-4xl font-bold mb-6">All Articles</h1>

    @if ($articles->isEmpty())
        <p class="text-gray-500">No articles yet.</p>
    @else
        <ul class="space-y-6">
            @foreach ($articles as $article)
                <li class="article border-b pb-4">
                    <h2 class="text-2xl font-semibold">
                        <a href="/articles/{{ $article->id }}" class="text-blue-600 hover:underline">
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
                </li>
            @endforeach
        </ul>
    @endif
</x-site-layout>

