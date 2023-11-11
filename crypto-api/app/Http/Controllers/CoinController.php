<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    public function index()
    {
        $cryptocurrencies = Coin::take(10)->get();
        return response()->json($cryptocurrencies);
    }

    public function show($identifier)
    {
        $coin = Coin::findWithIdentifier($identifier);

        if ($coin) {
            return response()->json($coin);
        } else {
            return response()->json(['error' => 'Cryptocurrency not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $coin = Coin::create($request->all());
        return response()->json($coin, 201);
    }

    public function update(Request $request, $identifier)
    {
        $coin = Coin::findWithIdentifier($identifier);

        if (!$coin) {
            return response()->json(['error' => 'Cryptocurrency not found'], 404);
        }

        $coin->update($request->all());
        return response()->json($coin, 200);
    }

    public function destroy($identifier)
    {
        $coin = Coin::findWithIdentifier($identifier);

        if (!$coin) {
            return response()->json(['error' => 'Cryptocurrency not found'], 404);
        }
        $coin->delete();
        return response()->json(null, 204);
    }
}
