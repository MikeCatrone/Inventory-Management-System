<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;


class CategoriesController extends Controller

{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $categories = Categories::orderBy('category')->get();

        return view('categories.index', compact('categories'));
    }



    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('categories.create');
    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:50', 'unique:categories,category'],
        ]);

        $category = new Categories;
        $category->category = $validated['category'];
        $category->save();

        Session::flash('success', 'A new category has been created.');

        return redirect()
            ->route('categories.index')
            ->with('success', 'A new category has been created.');
    }




    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Categories $category)
    {
        return view('categories.edit')->with('category', $category);
    }



    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Categories $category)
    {
        $validated = $request->validate([
            'category' => [
                'required',
                'string',
                'max:50',
                Rule::unique('categories', 'category')->ignore($category->id),
            ],
        ]);

        $category->category = $validated['category'];
        $category->save();

        Session::flash('success', 'The category has been updated.');

        return redirect()
            ->route('categories.index')
            ->with('success', 'The category has been updated.');
    }



    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Categories $category)
    {
        $category->delete();

        Session::flash('success', 'Category deleted.');

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted.');
    }
    
}