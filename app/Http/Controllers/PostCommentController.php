<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class PostCommentController extends Controller {
    
	public function create(Request $request, $postId) {
		$this->validate($request, ['comment' => 'required']);
		$comment = new Comment;
		$comment->text = $request->get('comment');
		$comment->post_id = $postId;
		$comment->user_id = \Auth::user()->id;
		$comment->save();
		return redirect()->route('post_detail_path', ['post' => $postId]);
	}

}