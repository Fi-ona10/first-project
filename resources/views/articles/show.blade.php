<x-site-layout>
    <h1 class="text-4xl font-bold">{{ $article->title }}</h1>

    <p class="text-sm text-gray-500 mb-4">
        By {{ $article->author?->name ?? 'Unknown author' }},
        {{ $article->created_at->format('F j, Y') }}
    </p>

    <div class="prose max-w-none">
        {!! nl2br(e($article->content)) !!}
    </div>

    <p class="mt-6">
        <a href="{{ route('articles.index') }}" class="text-blue-500 underline">
            ← Back to articles overview
        </a>
    </p>
</x-site-layout>
