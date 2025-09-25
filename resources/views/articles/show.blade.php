<x-site-layout>
    <h1 class="text-4xl font-bold">{{ $article->title }}</h1>

    <p class="text-sm text-gray-500 mb-4">
        By {{ $article->author?->name ?? 'Unknown author' }},
        {{-- Absicherung, falls created_at null ist --}}
        {{ $article->created_at ? $article->created_at->format('F j, Y') : 'No date' }}
    </p>

    <div class="prose max-w-none">
        {!! nl2br(e($article->content)) !!}
    </div>

    @if($article->ingredients?->count())
        <div class="mt-6">
            <h2 class="text-2xl font-semibold mb-2">Ingredients (7 x 200 g)</h2>
            <ul class="list-disc list-inside text-gray-800">
                @foreach ($article->ingredients->take(7) as $ingredient)
                    <li>{{ $ingredient->name }} — {{ $ingredient->quantity_g }} g</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p class="mt-6">
        <a href="{{ route('articles.index') }}" class="text-blue-500 underline">
            ← Back to articles overview
        </a>
    </p>
</x-site-layout>
