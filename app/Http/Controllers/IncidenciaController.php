<?php

namespace App\Http\Controllers;

use App\Models\Department;

class IncidenciaController extends Controller
{
    public function index()
    {

        return view('incidencias.index');
    }
}
