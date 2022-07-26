<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeResource;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return TypeResource::collection(Type::all());
    }

    public function store(Request $request)
    {
        Type::create([
            'name' => $request->input('name'),
            'brand_id' => $request->input('brand_id')
        ]);
    }

    public function show($id)
    {
        return new TypeResource(Type::find($id));
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
