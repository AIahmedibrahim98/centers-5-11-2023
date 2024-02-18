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
        if ($request->manager) {
            /*            $companies->whereHas('manager', function ($manager) use ($request) {
                            $manager->where('name', 'like', '%' . $request->manager . '%');
                        });*/
            $companies->join('managers', 'companies.id', '=', 'managers.company_id');
            $companies->where('managers.name', 'like', '%' . $request->manager . '%');
        }

        return view('companies.index')->with('companies',
            $companies->select('companies.*')
                ->orderBy('created_at', 'desc')
//            ->get());
                ->paginate(10));
//            ->simplePaginate(10));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {

    }
}
