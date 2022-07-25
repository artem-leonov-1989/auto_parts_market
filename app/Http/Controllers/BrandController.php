<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return BrandResource::collection(Brand::all());
    }

    public function store(Request $request)
    {
        $brand = Brand::create([
            'name' => $request->input('name'),
        ]);
        return response()->json([
            'id' => $brand->id,
        ]);
    }

    public function show($id)
    {
        return new BrandResource(Brand::find($id));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
