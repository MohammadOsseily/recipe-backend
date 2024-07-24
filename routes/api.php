<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StarController;
use App\Http\Controllers\StarredRecipeController;
use App\Http\Controllers\UserController;

Route::get('/recipes', [RecipeController::class, 'index']);
Route::get('/recipes/{id}', [RecipeController::class, 'show']);
Route::post('/recipes', [RecipeController::class, 'store']);

Route::post('/comments', [CommentController::class, 'store']);

Route::post('/stars', [StarController::class, 'store']);
Route::delete('/stars/{id}', [StarController::class, 'destroy']);
Route::get('/stars', [StarController::class, 'index']);


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/recipes', [RecipeController::class, 'store']);
Route::get('/recipes', [RecipeController::class, 'index']);
Route::get('/recipes/{id}', [RecipeController::class, 'show']);
Route::post('/recipes/{id}/star', [StarredRecipeController::class, 'store']);
Route::delete('/recipes/{id}/star', [StarredRecipeController::class, 'destroy']);
Route::get('/starred-recipes', [StarredRecipeController::class, 'index']);



Route::post('/comments', [CommentController::class, 'store']);


