<x-site-layout>
    <h1 class="text-4xl font-bold mb-6">
        Hungry – but don't know what to eat?<br/>
        Here are some recipes for you:
    </h1>

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
                </li>
            @endforeach
        </ul>
    @endif
</x-site-layout>

