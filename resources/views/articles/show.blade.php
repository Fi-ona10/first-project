<x-site-layout>
    <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
    
    @auth
        @if($article->canEditOrDelete(auth()->user()))
            <a href="/articles/{{$article->id}}/edit" class="underline">EDIT</a>

            <form action="/articles/{{$article->id}}" method="post">
                @method('DELETE')
                @csrf
                <button  class="underline">DELETE</button>
            </form>
        @else
            <span class="text-xs">If something is wrong.....</span>
        @endif
    @endauth


    <div class="mb-2 text-violet-800">by our reporter: {{$article->author->name}}.</div>
    <div>
        {{$article->content}}
    </div>
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
            <h2 class="text-2xl font-semibold mb-2">Healthy ingredients (7)</h2>
            <ul class="list-disc list-inside text-gray-800">
                @foreach ($article->ingredients->take(7) as $ingredient)
                    <li>1 {{ strtolower($ingredient->name) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p class="mt-6">
        <a href="{{ route('articles.index') }}" class="text-violet-500 underline">
            ← Back to articles overview
        </a>
    </p>
</x-site-layout>
