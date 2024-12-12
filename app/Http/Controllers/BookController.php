<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index(): View
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create(): View
    {
        return view('books.create');
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|min:5|max:255',
            'author'      => 'required|min:3|max:255',
            'publisher'   => 'required|min:3|max:255',
            'year'        => 'required|numeric|digits:4|min:1000|max:' . date('Y'),
            'type'        => 'required|in:book,ebook',
        ], [
            'title.required' => 'The book title is required.',
            'year.numeric'   => 'The year must be a valid number.',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book data successfully saved!');
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|min:5|max:255',
            'author'      => 'required|min:3|max:255',
            'publisher'   => 'required|min:3|max:255',
            'year'        => 'required|numeric|digits:4|min:1000|max:' . date('Y'),
            'type'        => 'required|in:book,ebook',
        ], [
            'title.required' => 'The book title is required.',
            'year.numeric'   => 'The year must be a valid number.',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book data successfully updated!');
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book data successfully deleted!');
    }
}
