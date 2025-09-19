<x-site-layout>

    <form action="/articles/{{$article->id}}" method="post">

        @method('PUT')
        @csrf

        <div>
            <label for="title">Title</label><br/>
            <input type="text" name="title" class="bg-gray-200 p-2" value="{{$article->title}}">
        </div>

        <div>
            <label for="content">Content</label><br/>
            <textarea name="content" class="bg-gray-200 p-2 w-3/4">{{$article->content}}</textarea>
        </div>

        <br/><br/>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">UPDATE</button>
    </form>
</x-site-layout>