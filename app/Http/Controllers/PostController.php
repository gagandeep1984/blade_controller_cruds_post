<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Database\Factories\PostFactory;
use Database\Seeders\PostSeeder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * 
     */
    // public function create_demo_data()
    // {
    //     $posts = Post::factory(10)->create();                                    // Way 1 
    //     Artisan::call('db:seed', [ '--class' = 'PostSeeder', ]);                 // Way 2 .. and then dump(Artisan::output())
    //     (new PostSeeder)->run();                                                 // Way 3 

    //     $posts = Post::all();
    //     return view('post.index', compact('posts'));
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::all();

        // dump(auth()->guard('web')->check());
        // dump(Auth::guard('web')->());

        // if (Auth::guard('web')->check()) {
        //     // return view('posts.index');
        //     return view('posts.index', compact('posts'));
        // } else {
        //     return $posts;
        // }


        if ($request->is('api/*')) {
            return $posts;
        } else {
            return view('posts.index', compact('posts'));
        }
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. perform validation 
        // 2. prepare Model using create Post::create($request->)
        // 3. return back API Response 

        $request->validate([
            'title' => 'required|max:500',
            'description' => 'required|max:2000',
            'image' => 'required|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $input = $request->all();
        // dd($input);

        // Saving image
        if ($imageFile = $request->file('image')) {
            $dirPath = "images/";
            // extract file name with extension for saving filename only in database 
            $value = date('YmdHis') . "_" . $imageFile->getFilename() . "." . $imageFile->getClientOriginalExtension();
            $imageFile->move($dirPath, $value); // move file with a new name and later saving that file name only in database  

            $input['image'] = $value;
        }

        
        //Post::create(['title' => $request->title, 'description' => $request->description]);
        Post::create($input);

        // dump($request);
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post): View
    {
        // return $post;
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $post = Post::find($id);
        // return view('posts.edit', compact('post'));

        $post = Post::find($id);
        // print($id);
        // print($post->title);
        // dump($post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:500',
            'description' => 'max:2000'
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')->with('Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('Post has been deleted successfully');
    }
}
