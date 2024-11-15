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
     *
     * @return View
     */
    public function index(): View
    {
        // Get all books, paginate 10 per page
        $books = Book::latest()->paginate(10);

        // Render the books index view
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     *
     * @return View
     */
    public function create(): View
    {
        return view('books.create');
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the form data
        $request->validate([
            'title'       => 'required|min:5',
            'author'      => 'required|min:3',
            'publisher'   => 'required|min:3',
            'year'        => 'required|numeric|digits:4',
        ]);

        // Create the new book
        Book::create([
            'title'       => $request->title,
            'author'      => $request->author,
            'publisher'   => $request->publisher,
            'year'        => $request->year,
        ]);

        // Redirect to the books index with a success message
        return redirect()->route('books.index')->with(['success' => 'Book data successfully saved!']);
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        // Get the book by ID
        $book = Book::findOrFail($id);

        // Render the book show view
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        // Get the book by ID
        $book = Book::findOrFail($id);

        // Render the edit book view
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // Validate the form data
        $request->validate([
            'title'       => 'required|min:5',
            'author'      => 'required|min:3',
            'publisher'   => 'required|min:3',
            'year'        => 'required|numeric|digits:4',
        ]);

        // Get the book by ID
        $book = Book::findOrFail($id);

        // Update the book data
        $book->update([
            'title'       => $request->title,
            'author'      => $request->author,
            'publisher'   => $request->publisher,
            'year'        => $request->year,
        ]);

        // Redirect to the books index with a success message
        return redirect()->route('books.index')->with(['success' => 'Book data successfully updated!']);
    }

    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Get the book by ID
        $book = Book::findOrFail($id);

        // Delete the book
        $book->delete();

        // Redirect to the books index with a success message
        return redirect()->route('books.index')->with(['success' => 'Book data successfully deleted!']);
    }
}
