<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;
use App\Models\Authors;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Authors::all();

        return view('main.admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Authors::orderBy('id', 'desc')->get();

        return view('main.admin.authors.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorsRequest $request)
    {
        unset($request['bio']); // Remove the bio field from the request data
        

        Authors::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);
        
        return redirect()->back()->with('success', 'Автор успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Authors $authors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $authors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorsRequest $request, Authors $authors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $authors)
    {
        //
    }
}
