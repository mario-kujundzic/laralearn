<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts', [
            'posts' => $posts
        ]);
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
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        error_log(Auth::user()->id);
        $post = Post::create($validated + ['user_id' => Auth::user()->id]);;
        $post->user_id = Auth::user()->id;
        $post->save();
        //return Redirect::to('/posts');
        return response()->json('Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::all()->find($id);
        return view('post_show', [
            'post' => $post
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
        $rules = array (
            'title' => 'required',
            'content' => 'required'
        );
        $post = Post::all()->find($id);
        $this->authorize('update', $post);
        $validator = $this->getValidationFactory()->make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json('Validation failed');
        } else {
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            $post->save();
            //return Redirect::to('/posts');
            return response()->json('Updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::all()->find($id);
        $this->authorize('delete', $post);
        $post->delete();
        //return Redirect::to('/posts');
        return response()->json('Deleted successfully!');

    }
}
