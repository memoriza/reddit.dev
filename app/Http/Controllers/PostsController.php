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

    public function search(Request $request) {

        if ($request->has('search')) {

            $posts = Post::join('users', 'created_by', '=', 'users.id')
                ->where('title','like', "%$request->search%")
                ->orwhere('content','like', "%$request->search%")
                ->orwhere('name', 'like', "%$request->search%")
                ->orderBy('posts.created_at', 'desc')
                ->paginate(5)->appends(['search' => $request->search]);

        } else {
            $posts = Post::orderBy('created_at', 'desc')->with('user')->paginate(5);
        }

        $data['posts'] = $posts;

        return view('posts.index', $data);

    }
    public function index(Request $request)
    {   
     
        $posts = Post::orderBy('created_at', 'desc')->with('user')->paginate(5);

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

    public function vote(Request $request)
    {
        if($request->ajax()){


            $post = \App\Models\Post::where('id',$request->post)->first();


            if($post){

                if($post->vote($request->action)){
                    return response()->json([
                        'status' => 'success',
                        'points' => $post->getPointsAttribute(),
                    ], 201);
                } else{
                    return response()->json([
                        'error' => 'User not logged in.'
                    ], 401);
                }
            } else{
                return response()->json([
                    'error' => 'post has been deleted.'
                ], 401);
            }
        }
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

        if ($post->created_by != Auth::id()) {

            Session::flash('errorMessage', "Only the post author can edit post.");
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

            Log::info("Post with ID of $id cannot be found.");
            Session::flash('errorMessage', "Post not found");
            abort(404);
            
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->url = $request->url;
        $post->created_by = Auth::id();
        $post->save();
  
        return view('posts.show')->with('post', $post);
    }

    public function account(Request $request, $id)
    {
        
        $user = User::find($id);
  
        return view('posts.account')->with('user', $user);
    }

    public function updateAccount (Request $request, $id){

        $user = User::find($id);

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ];

        $this->validate($request, $rules);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        Session::flash('successMessage', "$user->name account updated successfully.");

        return redirect()->action('PostsController@index');

    }

    public function password(Request $request, $id)
    {
        
        $user = User::find($id);
  
        return view('posts.password')->with('user', $user);
    }

    public function updatePassword(Request $request, $id)
    {
        
        $user = User::find($id);


        $rules = [
            'password' => 'required|confirmed|min:6',
        ];

        $this->validate($request, $rules);

        $user->password = $request->password;

        $user->save();

        Session::flash('successMessage', "Password updated successfully.");
         
        

       return redirect()->action('PostsController@index');

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
