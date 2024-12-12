<?php

namespace App\Http\Controllers;

use App\Models\Cd;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CdController extends Controller
{
    /**
     * Display a listing of the CDs.
     *
     * @return View
     */
    public function index(): View
    {
        // Get all CDs, paginate 10 per page
        $cds = Cd::latest()->paginate(10);

        // Render the CDs index view
        return view('cds.index', compact('cds'));
    }

    /**
     * Show the form for creating a new CD.
     *
     * @return View
     */
    public function create(): View
    {
        return view('cds.create');
    }

    /**
     * Store a newly created CD in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the form data
        $request->validate([
            'title'       => 'required|min:5',
            'artist'      => 'required|min:3',
            'genre'       => 'required|min:3', // Changed from price to genre
            'stock'       => 'required|integer',
        ]);

        // Create the new CD
        Cd::create([
            'title'       => $request->title,
            'artist'      => $request->artist,
            'genre'       => $request->genre,  // Changed from price to genre
            'stock'       => $request->stock,
        ]);

        // Redirect to the CDs index with a success message
        return redirect()->route('cds.index')->with(['success' => 'CD data successfully saved!']);
    }

    /**
     * Display the specified CD.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        // Get the CD by ID
        $cd = Cd::findOrFail($id);

        // Render the CD show view
        return view('cds.show', compact('cd'));
    }

    /**
     * Show the form for editing the specified CD.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id): View
    {
        // Get the CD by ID
        $cd = Cd::findOrFail($id);

        // Render the edit CD view
        return view('cds.edit', compact('cd'));
    }

    /**
     * Update the specified CD in storage.
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
            'artist'      => 'required|min:3',
            'genre'       => 'required|min:3', // Changed from price to genre
            'stock'       => 'required|integer',
        ]);

        // Get the CD by ID
        $cd = Cd::findOrFail($id);

        // Update the CD data
        $cd->update([
            'title'       => $request->title,
            'artist'      => $request->artist,
            'genre'       => $request->genre,  // Changed from price to genre
            'stock'       => $request->stock,
        ]);

        // Redirect to the CDs index with a success message
        return redirect()->route('cds.index')->with(['success' => 'CD data successfully updated!']);
    }

    /**
     * Remove the specified CD from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Get the CD by ID
        $cd = Cd::findOrFail($id);

        // Delete the CD
        $cd->delete();

        // Redirect to the CDs index with a success message
        return redirect()->route('cds.index')->with(['success' => 'CD data successfully deleted!']);
    }
}
