<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;
use App\Models\Authors;
use App\Models\Content;

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
    public function show(Authors $author)
    {
        return view('main.admin.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authors $author)
    {
        $contents = Content::all();
        return view('main.admin.authors.edit', compact('author', 'contents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorsRequest $request, Authors $author)
    {
        $data = $request->all();

        unset($data['bio']);

        $contents = $data['contents'];
        unset($data['contents']);


        $author->update($data);

        $author->contents()->sync($contents);

        return redirect()->back();        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authors $author)
    {
        $author->delete();

        return redirect()->back()->with('success', 'Автор успешно удален!');
    }
}
