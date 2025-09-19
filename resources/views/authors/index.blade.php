<x-site-layout>
    <main class="max-w-6xl mx-auto px-4 py-4">
        <h1 class="text-3xl font-bold mb-6">All Authors</h1>

        @if ($authors->isEmpty())
            <p class="text-gray-500">No authors found.</p>
        @else
            <ul class="space-y-4">
                @foreach ($authors as $author)
                    <li class="border p-4 rounded-lg hover:shadow-md transition">
                        <a href="{{ route('authors.show', $author->id) }}" class="text-xl font-semibold text-blue-600 hover:underline">
                            {{ $author->name }}
                        </a>
                        <p class="text-gray-500">{{ $author->email }}</p>

                        @if ($author->articles->isEmpty())
                            <p class="text-sm text-gray-400">(No articles yet)</p>
                        @else
                            <p class="text-sm text-gray-600">{{ $author->articles->count() }} article{{ $author->articles->count() > 1 ? 's' : '' }}</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
</x-site-layout>
