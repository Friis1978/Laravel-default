<?php

use App\Http\Controllers\FallbackController;
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

/*
// GET
Route::get('/blog',[PostsController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}',[PostsController::class, 'show'])->name('blog.show');

// Routes with expressions: https://youtu.be/PiTnHWbvbPM

// With RegExpressions
//Route::get('/blog/{id}',[PostsController::class, 'show'])->where('id', '[0-9]+');
//Route::get('/blog/{name}',[PostsController::class, 'show'])->where('name', '[A-Za-z]+');
// Route::get('/blog/{id}/{name}',[PostsController::class, 'show'])->where([
//     'id'=>'[0-9]+',
//     'name'=>'[A-Za-z]+',
// ]);

// With Helper methods
// Route::get('/blog/{id}/{name}',[PostsController::class, 'show'])
//     ->whereNumber('id')
//     ->whereAlpha('name');

// POST
Route::get('/blog/create',[PostsController::class, 'create'])->name('blog.create');
Route::post('/blog',[PostsController::class, 'store'])->name('blog.store');

// PUT OR PATCH
Route::get('/blog/edit/{id}',[PostsController::class, 'edit'])->name('blog.edit');
Route::patch('/blog',[PostsController::class, 'update'])->name('blog.update');

// DELETE
Route::delete('/blog/{id}',[PostsController::class, 'destroy'])->name('blog.destroy');

*/

Route::prefix('/blog')->group(function () {
    Route::get('/',[PostsController::class, 'index'])->name('blog.index');
    Route::get('/{id}',[PostsController::class, 'show'])->name('blog.show');
    Route::get('/create',[PostsController::class, 'create'])->name('blog.create');
    Route::post('/',[PostsController::class, 'store'])->name('blog.store');
    Route::get('/edit/{id}',[PostsController::class, 'edit'])->name('blog.edit');
    Route::patch('/{id}',[PostsController::class, 'update'])->name('blog.update');
    Route::delete('/{id}',[PostsController::class, 'destroy'])->name('blog.destroy');
});

// Route::resource('blog', PostsController::class);

// Route for invoke method
Route::get('/', HomeController::class);

// Multiple HTTP verbs
// Route::match(['GET', 'POST'], '/blog', [PostsController::class, 'index']);
// Route::any('/blog', [PostsController::class, 'index']);

// Return view
// Route::view('/blog', 'blog.index', ['name' => 'Code with Dary']);

// Fallback Route
Route::fallback(FallbackController::class);


