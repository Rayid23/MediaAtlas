<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Faker\Factory;
use Illuminate\Http\Request;
use PHPUnit\Event\Facade;

class HomeController extends Controller
{
    public function index()
    {
        $models = Genre::all();

        return view('layouts.main', compact('models'));
    }

    public function adminDashboard()
    {

    }
}
