<?php

namespace App\Http\Controllers;

use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {

        return view('departments.index');
    }
}
