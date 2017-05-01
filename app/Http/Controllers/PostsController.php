<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Post;
use Session;
use Auth;
use App\Models;
use Log;


class PostsController extends Controller
{

    public function __construct() 
    {

        $this->middleware('auth', ['except' => ['index','show']] );
        // another way to state how to filter out results
        // $this->middleware('auth', ['only' => ['create','store','edit','update','destroy']])
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        $data['posts'] = $posts;
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $this->validate($request, Post::$rules);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->created_by = Auth::id();
        $post->save();

        Log::info('New Post created successfully', $request->all());

        $request->session()->flash('successMessage',"Successfully uploaded new post.");
        return redirect()->action('PostsController@show', [$post->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);

        $data = [];
        $data['post'] = $posts;

        if(!$posts) {

            Log::info("Post with ID of $id cannot be found.");
            Session::flash('errorMessage', "Post not found");
            abort(404);
            
        }

        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);

        if(!$post) {

            Log::info("Post with ID of $id cannot be found.");
            Session::flash('errorMessage', "Post not found");
            abort(404);
            
        }

        return view('posts.edit')->with('post', $post);

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
        
        $post = Post::find($id);
        $user = User::find($id);

        if(!$post) {

            Log::info("Post with ID of $id cannot be found.");
            Session::flash('errorMessage', "Post not found");
            abort(404);
            
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->created_by = $user->id;
        $post->save();
  
        return view('posts.show')->with('post', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {

        $posts = Post::find($id);

        if(!$posts) {

            Log::info("Post with ID $id cannot be found.");
            Session::flash('errorMessage', "Post not found");
            abort(404);
            
        }

        $data['posts'] = $posts;
     
        $posts->delete();
       
        return redirect()->action('PostsController@index');    
              
    }
}
