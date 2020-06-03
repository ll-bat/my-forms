<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;

class CommentController extends Controller
{
    public function store(Blog $blog){

        $user = auth()->user();
        if (!$user)
        {
            die('Something went wrong');
        }

        $data = request()->validate(['body' => 'required|min:1|max:255']);

        $comment = Comment::create(['user_id' => $user->id, 'blog_id' => $blog->id, 'body' => $data['body']]);
        $comment->save();

        return 'stored';
    }

    public function delete(Comment $comment){
        $this->authorize('edit-staff');

        $comment->delete();
        return back();
    }
}
