<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Items;
use Illuminate\Http\Request;
use Session;

class ItemsController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $items = Items::with('category')->orderBy('title')->get();

        return view('items.index', compact('items'));
    }



    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $categories = Categories::orderBy('category')->get();

        return view('items.create', compact('categories'));
    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'quantity'    => ['required', 'integer', 'min:0'],
            'sku'         => ['required', 'string', 'max:255'],
            'picture'     => ['required', 'file', 'image', 'max:5120'],
        ]);

        $file = $request->file('picture');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);

        $item = new Items;
        $item->category_id = $validated['category_id'];
        $item->title       = $validated['title'];
        $item->description = $validated['description'];
        $item->price       = $validated['price'];
        $item->quantity    = $validated['quantity'];
        $item->sku         = $validated['sku'];
        $item->picture     = 'images/' . $filename;
        $item->save();

        Session::flash('success', 'A new item has been created.');

        return redirect()
            ->route('items.index')
            ->with('success', 'A new item has been created.');
    }


    /**
     * Display the specified resource.
     */

    public function show(Items $item)
    {
        return view('items.show', compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Items $item)
    {
        $categories = Categories::orderBy('category')->get();

        return view('items.edit', compact('item', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Items $item)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'quantity'    => ['required', 'integer', 'min:0'],
            'sku'         => ['required', 'string', 'max:255'],
            'picture'     => ['nullable', 'file', 'image', 'max:5120'],
        ]);

        $picturePath = $item->picture;

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            if ($item->picture && file_exists(public_path($item->picture))) {
                @unlink(public_path($item->picture));
            }

            $picturePath = 'images/' . $filename;
        }

        $item->category_id = $validated['category_id'];
        $item->title       = $validated['title'];
        $item->description = $validated['description'];
        $item->price       = $validated['price'];
        $item->quantity    = $validated['quantity'];
        $item->sku         = $validated['sku'];
        $item->picture     = $picturePath;
        $item->save();

        Session::flash('success', 'The item has been updated.');

        return redirect()
            ->route('items.index')
            ->with('success', 'The item has been updated.');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Items $item)
    {
        $item->delete();

        Session::flash('success', 'Item deleted.');

        return redirect()
            ->route('items.index')
            ->with('success', 'Item deleted.');
    }
    
}