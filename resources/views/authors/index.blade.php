<x-site-layout>
    <h1 class="text-3xl font-bold mb-6">All Authors</h1>

    @if ($authors->isEmpty())
        <p class="text-gray-500">No authors found.</p>
    @else
        <ul class="space-y-2">
            @foreach ($authors as $author)
                <li>
                    <a href="{{ route('authors.show', $author->id) }}" class="text-blue-600 hover:underline">
                        {{ $author->name }}
                    </a>
                    <span class="text-sm text-gray-500">({{ $author->email }})</span>
                </li>
            @endforeach
        </ul>
    @endif
</x-site-layout>
