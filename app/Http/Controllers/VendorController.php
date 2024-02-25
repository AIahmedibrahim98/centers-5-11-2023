<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendors.index', ['vendors' => Vendor::orderBy('created_at', 'desc')->paginate(25)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        try {
            Vendor::create([
                'name' => $request->name,
                'address' => $request->address,
                'image' => $request->file('image')->store('vendor_images')
            ]);
            return to_route('vendors.index')->with('message', 'Vendor Created');
        } catch (\Exception $exception) {
            return to_route('vendors.index')->with('message', $exception->getMessage());
        }
    }

    public function edit(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('vendors.edit')
            ->with(compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);
        try {
            $vendor = Vendor::find($id);
            $vendor->name = $request->name;
            $vendor->address = $request->address;
            if ($vendor->image && $request->file('image')) {
                Storage::delete($vendor->image);
                $vendor->image = Storage::put('vendor_images', $request->file('image'));
            } elseif ($request->file('image')) {
                $vendor->image = Storage::put('vendor_images', $request->file('image'));
            }
            $vendor->save();
            return to_route('vendors.index')->with('message', 'Vendor updated');
        } catch (\Exception $exception) {
            return to_route('vendors.index')->with('message', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $vendor = Vendor::find($id);
            if ($vendor->image) Storage::delete($vendor->image);
            $vendor->delete();
            return to_route('vendors.index')->with('message', 'Vendor deleted');
        } catch (\Exception $exception) {
            return to_route('vendors.index')->with('message', $exception->getMessage());
//            return to_route('branches.index')->with('message', $exception->getCode());
        }
    }
}
