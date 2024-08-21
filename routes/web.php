<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('test', [TestController::class, 'index'])->name('test');

// List books
Route::get('books', [BookController::class, 'index'])->name('books.index');

// Show the form for creating a new book
Route::get('books/create', [BookController::class, 'create'])->name('books.create');

// Store a new book
Route::post('books', [BookController::class, 'store'])->name('books.store');

// Show the form for editing an existing book
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

// Update an existing book
Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');

// Delete a book
Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// List authors
Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');

// Show the form for creating a new author
Route::get('authors/create', [AuthorController::class, 'create'])->name('authors.create');

// Store a new author
Route::post('authors', [AuthorController::class, 'store'])->name('authors.store');

// Show the form for editing an existing author
Route::get('authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');

// Update an existing author
Route::put('authors/{author}', [AuthorController::class, 'update'])->name('authors.update');

// Delete an author
Route::delete('authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');

// Show Reports Page
Route::get('reports', [ReportController::class, 'index'])->name('reports.index');

//Generate Report
Route::get('/reports/pdf', [ReportController::class, 'generatePDF'])->name('reports.pdf');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
