<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body class="p-4">
    <table class="table-auto border border-solid w-full">
        <thead>
            <tr>
                <td class="p-4 bg-gray-200 font-bold"><a href="/?sort=title&order={{ $order }}">Book Title</a></td>
                <td class="p-4 bg-gray-200 font-bold"><a href="/?sort=author&order={{ $order }}">Author</a></td>
                <td class="p-4 bg-gray-200 font-bold text-center"><a href="/?sort=release_date&order={{ $order }}">Book Release date</a></td>
            </tr>
        </thead>
        @foreach($books as $book)
        <tr class="hover:bg-gray-200 bg-gray-100 cursor-pointer">
            <td class="p-2"><a href="/book/{{ $book->id }}">{{ $book->title }}</a></td>
            <td class="p-2">
                @foreach ($book->author as $author)
                @if ($loop->last)
                <span> <a href="/author/{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }} ({{ $author->books()->count() }})</a></span>
                @else
                <span>{{ $author->first_name }} {{ $author->last_name }} ({{ $author->books()->count() }}),</span>
                @endif
                @endforeach
            </td>
            <td class="p-2 text-center">{{ $book->release_date }}</td>
        </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $books->links() }}
    </div>
</body>

</html>
