<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Make a set of new controllers with artisan: https://youtu.be/Aoqj5nuwBQI
     * command: php artisan make:controller PostsController --resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Select by id
        // $posts = DB::select('SELECT * FROM posts WHERE id = :id', ['id' => 1]);

        // Insert new post
        // $posts = DB::insert('INSERT INTO posts 
        // (title, excerpt, body, image_path, is_published, min_to_read) 
        // VALUES(?, ?, ?, ?, ?, ?)', ['Test2', 'test', 'test', 'test', true, 1]);

        // Update post
        // $posts = DB::update('UPDATE posts set body = ? where id = ?', ['Body 3', 101]);

        // Delete posts
        // $posts = DB::delete('DELETE FROM posts where id = ?', [101]);

        // Changing operations
        // $posts = DB::table('posts')
        //     //->distinct() // Selecting unique values
        //     //->whereNotNull('excerpt')
        //     //->whereNull('excerpt')
        //     //->whereIn('min_to_read', [2, 6, 8])
        //     //->whereNotBetween('min_to_read', [2,6])
        //     //->whereBetween('min_to_read', [2,6])
        //     //->where('is_published', true)
        //     //->where('id', '>', 50)
        //     //->orderBy('id','desc') // asc by default
        //     //->select('min_to_read')
        //     //->skip(10) // skip the first 10 values
        //     //->take(5) // take 5 after
        //     //->inRandomOrder()
        //     ->get();

        // $posts = DB::table('posts')
        //     //->where('id', 10)
        //     // ->first();
        //     ->find(100);

        // $posts = DB::table('posts')
        //     ->where('id', 100)
        //     ->value('body');

        // Count columns
        // $posts = DB::table('posts')
        //     ->where('id', '>', 50)
        //     ->count();

        // Max value
        // $posts = DB::table('posts')
        //     ->max('min_to_read');

        // Min value
        // $posts = DB::table('posts')
        //     ->min('min_to_read');

        // AVg value
        $posts = DB::table('posts')
            ->avg('min_to_read');
            
        dd($posts);
        return view('blog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
