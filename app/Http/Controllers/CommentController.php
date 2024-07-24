<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
            'comment' => 'required|string',
        ]);

        $comment = Comment::create([
            'recipe_id' => $request->recipe_id,
            'comment' => $request->comment,
        ]);

        return response()->json($comment, 201);
    }
}
