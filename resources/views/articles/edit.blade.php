
<x-site-layout>

    <form action="{{ route('management.articles.update', $article->id) }}" method="POST" novalidate>
        @method('PUT')
        @csrf

        <x-form-errors />

        <div class="mb-4">
            <label for="title" class="block font-semibold">Title</label>
            <input
                id="title"
                type="text"
                name="title"
                value="{{ old('title', $article->title) }}"
                class="bg-gray-200 p-2 w-full @error('title') border border-red-500 @enderror"
                required
            >
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="content" class="block font-semibold">Content</label>
            <textarea
                id="content"
                name="content"
                class="bg-gray-200 p-2 w-3/4 h-40 @error('content') border border-red-500 @enderror"
                required
            >{{ old('content', $article->content) }}</textarea>
            @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
            Update
        </button>
    </form>

</x-site-layout>
