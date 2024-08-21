<?php

// namespace App\Http\Controllers;

// use App\Author;
// use App\Book;
// use Illuminate\Http\Request;

// class AuthorController extends Controller
// {
//     //
//     public function index()
//     {
//         $authors = Author::all();
//         return view('authors.index', compact('authors'));
//     }

//     public function create()
//     {
//         return view('authors.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//         ]);

//         Author::create($request->all());

//         return redirect()->route('authors.index')->with('success', 'Author created successfully.');
//     }

//     public function edit(Author $author)
//     {
//         return view('authors.edit', compact('author'));
//     }

//     public function update(Request $request, Author $author)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//         ]);

//         $author->update($request->all());

//         return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
//     }

//     public function destroy(Author $author)
//     {
//         $author->delete();

//         return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
//     }
// }


namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    public function edit(Author $author)
    {
        
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {

        // Check if the author has any associated books
        if ($author->books()->count() > 0) {
            // Redirect back with an error message if books are found
            return redirect()->route('authors.index')->with('fail', 'Cannot delete author with existing books.');
        }

        // Proceed with deletion if no books are associated
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
