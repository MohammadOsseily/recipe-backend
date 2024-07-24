<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Star;
use App\Models\Recipe;

class StarController extends Controller
{
    public function index()
    {
        $starredRecipes = Star::with('recipe')->get();
        return $starredRecipes->map(function ($star) {
            return $star->recipe;
        });
    }

    public function store(Request $request)
    {
        $star = Star::create($request->all());
        return response()->json($star, 201);
    }

    public function destroy($id)
    {
        $star = Star::where('recipe_id', $id)->first();
        if ($star) {
            $star->delete();
            return response()->json(null, 204);
        }

        return response()->json(['error' => 'Star not found'], 404);
    }
}
