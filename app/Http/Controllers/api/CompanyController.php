<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return Company::all();
        /*return response()->json([
            'status' => 'Data Returned',
//            'data' => Company::all()
            'data' => CompanyResource::collection(Company::all())
        ]);*/
//        return CompanyResource::collection(Company::all());
        return new CompanyCollection(Company::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'owner' => 'required',
            'country' => 'required'
        ]);
        try {
            $c = Company::create($request->all());
            return response()->json([
                'status' => 'Company Created',
                'company' => new CompanyResource($c)
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            if ($c = Company::find($id)) {
                return response()->json([
                    'status' => 'Company Founded',
                    'company' => new CompanyResource($c)
                ]);
            } else {
                return response()->json([
                    'status' => 'Failed .. Company Not Found',
                ], 500);
            }
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed ',
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*        $request->validate([
                    'name' => 'required',
                    'owner' => 'required',
                    'country' => 'required'
                ]);*/
        try {
            $c = Company::find($id)->update($request->all());
            return response()->json([
                'status' => 'Company Updated',
                'company' => new CompanyResource(Company::find($id))
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $c = Company::destroy($id);
            return response()->json([
                'status' => 'Company Deleted',
            ]);
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            return response()->json([
                'status' => 'Failed',
            ], 500);
        }
    }
}
