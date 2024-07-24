<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return response()->json($recipes);
    }

    public function show($id)
    {
        $recipe = Recipe::with('comments')->findOrFail($id);
        return response()->json($recipe);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|url',
        ]);

        $recipe = Recipe::create($validated);
        return response()->json($recipe, 201);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([], 200); // Return an empty array if query is not provided
        }

        $recipes = Recipe::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->orWhere('ingredients', 'LIKE', "%{$query}%")
                        ->get();

        return response()->json($recipes);
    }
}
