<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index()
    {
        return OrderResource::collection(Order::all());
    }


    public function store(Request $request)
    {
        $newOrder = new Order();
        do {
            $newOrder->order_number = Str::random(6);
        } while (Order::query()->where('order_number', '=', $newOrder->order_number)->count() > 0);
        $user = User::find(Auth::id());
        $user->orders()->save($newOrder);
        $basket = json_decode($request->input('basket'), true);
        foreach ($basket as $part) {
            $newOrder->parts()->attach($part[0], ['count' => $part[1], 'price' => $part[2]]);
        }
        return response()->json(['order_number' => $newOrder->order_number]);
    }

    public function show($id)
    {
        return new OrderResource(Order::find($id));
    }

    public function searchByUser() {
        return response()->json(DB::table('orders')->where('user_id', Auth::id())->get('id'));
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
