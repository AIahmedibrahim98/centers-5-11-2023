<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::query();

        if ($request->search) $companies->where('name', 'like', '%' . $request->search . '%');


        return view('companies.index')->with('companies', $companies->orderBy('created_at', 'desc')->get());
    }
}
