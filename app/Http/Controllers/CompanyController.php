<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $request->validate([
//            'name' => 'required|string|min:3|max:10|in:ali,sara',
            'name' => 'required',
            'owner' => 'required',
        ], [
            'owner.required' => 'owner can not be null'
        ]);
//        echo  $request->name;
//        dd($request->all());
//        dd($request->except('_token'));
        /*        $company = new Company();
                $company->name = $request->name;
                $company->owner = $request->owner;
                $company->country = $request->country;
                $company->save();*/

        Company::create($request->except('_token'));
//        return redirect()->to('/companies');
//        return redirect()->route('companies.index');
//        session()->put('message', 'Company Created');
//        session()->forget('message');
//        session()->flash('message', 'Company Created');
        return to_route('companies.index')->with('message', 'Company Created');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
//            'name' => 'required|string|min:3|max:10|in:ali,sara',
            'name' => 'required',
            'owner' => 'required',
        ], [
            'owner.required' => 'owner can not be null'
        ]);
        try {
            $company = Company::findOrFail($id);
            $company->update($request->except('_token'));
            return to_route('companies.index')->with('message', 'Company Updated');
        } catch (\Exception $exception) {
            return to_route('companies.index')->with('message', $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
//            $company = Company::findOrFail($id);
//            $company->delete();
            Company::destroy($id);
            return to_route('companies.index')->with('message', 'Company Deleted');
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return to_route('companies.index')->with('message', $exception->getMessage());
        }
    }

}
