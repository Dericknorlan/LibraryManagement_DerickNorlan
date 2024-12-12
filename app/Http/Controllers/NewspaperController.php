<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon; // Use Carbon for date manipulation

class NewspaperController extends Controller
{
    /**
     * Display a listing of the newspapers.
     *
     * @return View
     */
    public function index(): View
    {
        // Get all newspapers, paginate 10 per page
        $newspapers = Newspaper::latest()->paginate(10);

        // Render the newspapers index view
        return view('newspapers.index', compact('newspapers'));
    }

    /**
     * Show the form for creating a new newspaper.
     *
     * @return View
     */
    public function create(): View
    {
        return view('newspapers.create');
    }

    /**
     * Store a newly created newspaper in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the form data
        $validated = $request->validate([
            'title'            => 'required|min:5',
            'publisher'        => 'required|min:3',
            'publication_date' => 'required|date',
            'is_available'     => 'required|boolean', // Add the is_available validation
        ]);

        // Check if the publication date is older than 7 days
        if (Carbon::parse($validated['publication_date'])->lt(Carbon::now()->subDays(7))) {
            $validated['is_available'] = false; // Set is_available to false if older than 7 days
        }

        // Create the new newspaper with validated data
        Newspaper::create($validated);

        // Redirect to the newspapers index with a success message
        return redirect()->route('newspapers.index')->with(['success' => 'Newspaper data successfully saved!']);
    }

    /**
     * Display the specified newspaper.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        // Get the newspaper by ID, throw 404 if not found
        $newspaper = Newspaper::findOrFail($id);

        // Render the newspaper show view
        return view('newspapers.show', compact('newspaper'));
    }

    /**
     * Show the form for editing the specified newspaper.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        // Get the newspaper by ID, throw 404 if not found
        $newspaper = Newspaper::findOrFail($id);

        // Render the edit newspaper view
        return view('newspapers.edit', compact('newspaper'));
    }

    /**
     * Update the specified newspaper in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        // Validate the form data
        $validated = $request->validate([
            'title'            => 'required|min:5',
            'publisher'        => 'required|min:3',
            'publication_date' => 'required|date',
            'is_available'     => 'required|boolean', // Add the is_available validation
        ]);

        // Get the newspaper by ID, throw 404 if not found
        $newspaper = Newspaper::findOrFail($id);

        // Check if the publication date is older than 7 days
        if (Carbon::parse($validated['publication_date'])->lt(Carbon::now()->subDays(7))) {
            $validated['is_available'] = false; // Set is_available to false if older than 7 days
        }

        // Update the newspaper data with validated data
        $newspaper->update($validated);

        // Redirect to the newspapers index with a success message
        return redirect()->route('newspapers.index')->with(['success' => 'Newspaper data successfully updated!']);
    }

    /**
     * Remove the specified newspaper from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Get the newspaper by ID, throw 404 if not found
        $newspaper = Newspaper::findOrFail($id);

        // Delete the newspaper
        $newspaper->delete();

        // Redirect to the newspapers index with a success message
        return redirect()->route('newspapers.index')->with(['success' => 'Newspaper data successfully deleted!']);
    }
}
