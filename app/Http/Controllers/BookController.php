<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {


       $books = Author::leftJoin('book_authors', 'authors.id', '=', 'book_authors.author_id')
        ->leftJoin('books', 'books.id', '=', 'book_authors.author_id')
        ->select('books.*', 'authors.*');
        //  $books->orderBy('last_name');
        $books->get();
        if () {
            
        }
        dd($books->first());

        $books = Book::query()->with('author');
        $author = Book::query()->with('books');

        $order = $request->order ?? 'desc';

        if ($request->has('sort')) {
            //$author->orderBy($request->sort, $order);
            //$order = $order === 'desc' ? 'asc' : 'decs';
            $books->orderBy($request->sort, $order);
            $order = $order === 'desc' ? 'asc' : 'desc';
        }
        //return view('welcome', ['books' => $author -> paginate(20) -> withQueatyString(), 'order' => $order]);
        return view('welcome', ['books' => $books->paginate(20)->withQueryString(), 'order' => $order]);
    }

    public $timestamps = false;

    public function book(Book $book)
    {
        return view('book', ['book' => $book]);
    }
}
