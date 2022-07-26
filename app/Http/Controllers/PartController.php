<?php

namespace App\Http\Controllers;

use App\Http\Resources\PartResource;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        return PartResource::collection(Part::all());
    }

    public function store(Request $request)
    {
        Part::create([
            'name' => $request->name,
            'manufacturer' => $request->manufacturer,
            'manufacturer_code' => $request->manufacturer_code,
            'description' => $request->description,
            'stock_balance' => $request->stock_balance,
            'price' => $request->price,
            'type_id' => $request->type_id,
            'category_id' => $request->category_id,
        ]);
    }

    public function show($id)
    {
        return new PartResource(Part::find($id));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }
}
