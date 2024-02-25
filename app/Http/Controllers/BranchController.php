<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('branches.index', ['branches' => Branch::orderBy('created_at', 'desc')->paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->toArray();
        return view('branches.create', compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'location' => 'required|string|min:5',
            'phone' => 'required|string',
            'company_id' => 'required|exists:companies,id'
        ]);
        try {
            Branch::create($request->except('_token'));
            return to_route('branches.index')->with('message', 'Branch Created');
        } catch (\Exception $exception) {
            return to_route('branches.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->toArray();
        $branch = Branch::findOrFail($id);
        return view('branches.edit')
            ->with(compact('companies'))
            ->with(compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'location' => 'required|string|min:5',
            'phone' => 'required|string',
            'company_id' => 'required|exists:companies,id'
        ]);
        try {
            Branch::find($id)->update($request->except('_token'));
            return to_route('branches.index')->with('message', 'Branch updated');
        } catch (\Exception $exception) {
            return to_route('branches.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Branch::destroy($id);
            return to_route('branches.index')->with('message', 'Branch deleted');
        } catch (\Exception $exception) {
            return to_route('branches.index')->with('message', $exception->getMessage());
//            return to_route('branches.index')->with('message', $exception->getCode());
        }
    }
}
