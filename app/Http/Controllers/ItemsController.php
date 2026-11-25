<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $items = Items::orderBy('category')->get(); // Company model
        return view('items.index', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        return view('items.create');
    }



    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        // Check that every field is filled out and has valid data
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'], // Must match an existing category
            'title'       => ['required', 'string', 'max:255'],              // Item title (up to 255 letters)
            'description' => ['required', 'string'],                       // Item description
            'price'       => ['required', 'numeric', 'min:0'],               // Price (0 or higher)
            'quantity'    => ['required', 'integer', 'min:0'],               // Stock count (0 or higher)
            'sku'         => ['required', 'string', 'max:255'],              // SKU code (up to 255 letters)
            'picture'     => ['required', 'file', 'image', 'max:5120'],      // Image file (up to 5 MB)
        ]);

        
        // Get the uploaded image from the form
        $file = $request->file('picture');


        // Give the image a unique file name so files don't overwrite each other
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();


        // Save the image file into the public/images folder
        $file->move(public_path('images'), $filename);


        // Save the new item and its image path in the database
        Items::create([
            'category_id' => $validated['category_id'],
            'title'       => $validated['title'],
            'description' => $validated['description'],
            'price'       => $validated['price'],
            'quantity'    => $validated['quantity'],
            'sku'         => $validated['sku'],
            'picture'     => 'images/' . $filename,
        ]);


        // Go back to the items list page with a success message
        return redirect()
            ->route('items.index')
            ->with('status', 'Item created.');


    }



    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //
    }
}
