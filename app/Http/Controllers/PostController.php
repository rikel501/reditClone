<?php

namespace App\Http\Controllers;

use App\Post;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

use Illuminate\Http\Request;

class PostController extends Controller{
    
	public function posts(){
		$posts = Post::with('user')->orderBy('id', 'desc')->paginate(5);
		return view("post.posts")->with(['posts' => $posts]);
	}
    
	public function getAllPosts(){
		$posts = Post::with('comments')->with('user')->orderBy('id', 'desc')->paginate(5);
		return response()->json($posts, 200);
	}
    
	public function create(){
		$post = new Post;
		return view("post.create")->with(['post' => $post]);
	}
    
	public function store(CreatePostRequest $request){
		$post = new Post;
		$post->fill($request->only('title', 'description', 'url'));
		$post->user_id = auth()->user()->id;
		$post->save();
		session()->flash('message', 'Post creado');
		return redirect()->route('posts_path');
	}
    
	public function postdetail(Post $post){
		$post->load('comments', 'comments.user');
		return view("post.postdetail")->with(['post' => $post]);
	}
    
	public function edit(Post $post){
		if($post->user_id != \Auth::user()->id) {
			return redirect()->route('posts_path');
		}
		return view("post.edit")->with(['post' => $post]);
	}
    
	public function update(Post $post, UpdatePostRequest $request){
		$post->update($request->only('title', 'description', 'url'));
		session()->flash('message', 'Post editado');
		return redirect()->route('post_detail_path', ['post' => $post->id]);
	}
    
	public function delete(Post $post){
		if($post->user_id != \Auth::user()->id) {
			return redirect()->route('posts_path');
		}
		$post->delete();
		session()->flash('message', 'Post eliminado');
		return redirect()->route('posts_path');
	}

}