<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptureController extends Controller
{
    public function index()
    {
        return view('captures.index');
    }
}
