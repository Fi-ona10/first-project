<x-site-layout>
    <h1 class="text-2xl font-bold mb-6">Create New Article</h1>

    <form action="{{ route('management.articles.store') }}" method="POST" novalidate>
        @csrf

        <x-form-errors />

        <div class="mb-4">
            <label for="title" class="block font-semibold">Title</label>
            <input
                id="title"
                type="text"
                name="title"
                value="{{ old('title') }}"
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
                class="bg-gray-200 p-2 w-full h-40 @error('content') border border-red-500 @enderror"
                required
            >{{ old('content') }}</textarea>
            @error('content')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <button class="bg-blue-500 p-2 text-white uppercase rounded" type="submit">Create</button>
    </form>

</x-site-layout>
