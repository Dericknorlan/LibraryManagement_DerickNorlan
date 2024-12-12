<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    /**
     * Display a listing of the journals.
     *
     * @return View
     */
    public function index(): View
    {
        // Get all journals, paginate 10 per page
        $journals = Journal::latest()->paginate(10);

        // Render the journals index view
        return view('journals.index', compact('journals'));
    }

    /**
     * Show the form for creating a new journal.
     *
     * @return View
     */
    public function create(): View
    {
        return view('journals.create');
    }

    /**
     * Store a newly created journal in storage.
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
            'publish_date'=> 'required|date',
            'abstract'    => 'required|min:10',
        ]);

        // Create the new journal
        Journal::create([
            'title'       => $request->title,
            'author'      => $request->author,
            'publish_date'=> $request->publish_date,
            'abstract'    => $request->abstract,
        ]);

        // Redirect to the journals index with a success message
        return redirect()->route('journals.index')->with(['success' => 'Journal data successfully saved!']);
    }

    /**
     * Display the specified journal.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        // Get the journal by ID
        $journal = Journal::findOrFail($id);

        // Render the journal show view
        return view('journals.show', compact('journal'));
    }

    /**
     * Show the form for editing the specified journal.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        // Get the journal by ID
        $journal = Journal::findOrFail($id);

        // Render the edit journal view
        return view('journals.edit', compact('journal'));
    }

    /**
     * Update the specified journal in storage.
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
            'publish_date'=> 'required|date',
            'abstract'    => 'required|min:10',
        ]);

        // Get the journal by ID
        $journal = Journal::findOrFail($id);

        // Update the journal data
        $journal->update([
            'title'       => $request->title,
            'author'      => $request->author,
            'publish_date'=> $request->publish_date,
            'abstract'    => $request->abstract,
        ]);

        // Redirect to the journals index with a success message
        return redirect()->route('journals.index')->with(['success' => 'Journal data successfully updated!']);
    }

    /**
     * Remove the specified journal from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Get the journal by ID
        $journal = Journal::findOrFail($id);

        // Delete the journal
        $journal->delete();

        // Redirect to the journals index with a success message
        return redirect()->route('journals.index')->with(['success' => 'Journal data successfully deleted!']);
    }
}
