<x-site-layout>

            <h1 class="text-4xl font-bold">{{$article->title}}</h1>

                <div>
                    {{$article->content}} 
                </div>

</x-site-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }}</title>
</head>
<body>
    <div>
        <h1>{{ $article->title }}</h1>
        <p class="meta">
            By {{ $article->author?->name ?? 'Unknown author' }},
            {{ $article->created_at }}
        </p>
        <div class="content">
            {{ $article->content }}
        </div>
    </div>
    
    <p><a href="/articles">Back to articles overview </a></p>
</body>
</html>