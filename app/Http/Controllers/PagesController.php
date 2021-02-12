<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Should return the latest three listings to the view.
    public function index()
    {
        return view('welcome');
    }
}
