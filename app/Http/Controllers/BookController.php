<?php

// namespace App\Http\Controllers;

// use App\Book;
// use App\Author;
// use Illuminate\Http\Request;

// class BookController extends Controller
// {
//     //

//     public function index(){
        
//         $books = Book::with('author')->get();
//         return view('books.index', compact('books'));


//     }

//     public function create(){

//         $authors = Author::all();
//         return view('books.create', compact('authors'));
//     }

//     public function store(Request $request){

//         $request->validate([
//             'title' => 'required|string|max:255',
//             'author_id' => 'required|exists:authors,id',
//         ]);

//         Book::create($request->all());

//         return redirect()->route('books.index')->with('success', 'Book created successfully.');
//     }

//     public function edit(Book $book){

//         $authors = Author::all();
//         return view('books.edit', compact('book', 'authors'));
//     }

//     public function update(Request $request, Book $book){

//         $request->validate([
//             'title' => 'required|string|max:255',
//             'author_id' => 'required|exists:authors,id',
//         ]);

//         $book->update($request->all());

//         return redirect()->route('books.index')->with('success', 'Book updated successfully.');
//     }

//     public function destroy(Book $book){

//         $book->delete();

//         return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
        
//     }
// }

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request) {
        // $books = Book::with('author')->get();
        // return view('books.index', compact('books'));

        $authors = Author::all(); // Fetch all authors for the filter dropdown
        
        // Apply filter if author_id is provided
        $query = Book::query();
        
        if ($request->filled('author_id')) {
            $query->where('author_id', $request->input('author_id'));
        }

        $books = $query->with('author')->get();

        return view('books.index', compact('books', 'authors'));
    }

    public function create() {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book) {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book) {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}

