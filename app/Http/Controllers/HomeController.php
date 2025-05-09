<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $models = Genre::all();

        return view('layouts.main', compact('models'));
    }
}
