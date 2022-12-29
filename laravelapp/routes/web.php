<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
    Tutorial routing: https://youtu.be/pSYu_XNkJ98
    
    GET - Request a resource
    POST - Create a new resource
    PUT - Update a resource
    PATCH - Modify a resource
    DELETE - Delete a resource
    OPTIONS - Ask the server which verbs are allowed
*/

// GET
Route::get('/blog',[PostsController::class, 'index']);
Route::get('/blog/1',[PostsController::class, 'show']);

// POST
Route::get('/blog/create',[PostsController::class, 'create']);
Route::post('/blog',[PostsController::class, 'store']);

// PUT OR PATCH
Route::get('/blog/edit/1',[PostsController::class, 'edit']);
Route::patch('/blog',[PostsController::class, 'update']);

// DELETE
Route::delete('/blog/1',[PostsController::class, 'destroy']);

// Route::resource('blog', PostsController::class);

// Route for invoke method
Route::get('/', HomeController::class);

// Multiple HTTP verbs
// Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
// Route::any('/blog', [PostsController::class, 'index']);

// Return view
// Route::view('/blog', 'blog.index', ['name' => 'Code with Dary']);







