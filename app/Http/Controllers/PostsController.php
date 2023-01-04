<?php
namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
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
        // Get single
        // $posts = DB::table('posts')->find(1);   
        // return view('blog.index')->with('posts', $posts);

        // Get dump
        // $posts = DB::table('posts')->get();   
        // return view('blog.index', compact('posts'));

        // Key value pair
        // return view('blog.index', [
        //     'posts' => DB::table('posts')->get()
        // ]);

        // Using Eloquent
        // $posts = Post::orderBy('id', 'desc')->take(10)->get();
        // dd($posts);

        // Post::chunk(25, function ($posts) {
        //     foreach($posts as $post) {
        //         echo $post->title . '<br>';
        //     }
        // });

        return view('blog.index', [
            'posts' => Post::orderBy('updated_at', 'desc')->get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        // Using object oriented php to submit form
        // $post = new Post();
        // $post->title = $request->title;
        // $post->excerpt = $request->excerpt;
        // $post->body = $request->body;
        // $post->image_path = 'temporary';
        // $post->is_published = $request->is_published === 'on';
        // $post->min_to_read = $request->min_to_read;
        // $post->save();

        // Using Eloquent
        $request->validated();

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' => $request->is_published === 'on',
            'min_to_read' => $request->min_to_read,
        ]);

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('blog.show', [
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blog.edit', [
            'post' => Post::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
        // Using Eloquent
        $request->validated();

        Post::where('id', $id)->update($request->except(['_token', '_method']));

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect(route('blog.index'))->with('message', 'Post has been deleted.');
    }

    /**
     * Private function to upload images
     *
     * @param [type] $request
     * @return void
     */
    private function storeImage($request)
    {
        $newImageName = uniqid() . '-' . $request->title . '.' . 
        $request->image->extension();

        return $request->image->move(public_path('images'), $newImageName);
    }
}
