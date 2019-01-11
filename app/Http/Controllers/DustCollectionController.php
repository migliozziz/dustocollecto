<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DustCollectionController extends Controller
{
    public function index()
    {
        return view('dustcollect.index');
    }
}
