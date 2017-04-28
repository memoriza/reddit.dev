<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Session;
use App\Models;

class PostsController extends Controller
{
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
        $post->created_by = 9;
        $post->save();

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

            Session::flash('errorMessage', "Post not found");
            return redirect()->action('PostsController@index');
           
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
            $request->session()->flash('errorMessage',"No such post.");
            return redirect()->action('PostsController@index');
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

        if(!$post) {

            Session::flash('errorMessage', "Post not found");
            return redirect()->action('PostsController@index');

        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->created_by = 9;
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

            Session::flash('errorMessage', "Post not found");
            return redirect()->action('PostsController@index');

        }

        $data['posts'] = $posts;
     
        $posts->delete();
       
        return redirect()->action('PostsController@index');    
              
    }
}
