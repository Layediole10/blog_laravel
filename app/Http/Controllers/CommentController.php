<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function index(){
        $comments = Comment::paginate(3);
        return view('admin.comment.commentList', [
            'comments'=> $comments,
            // 'showArticle'=> $showArticle,
        ]);
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'message' => 'required|string|max:500',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
           
        ]);
        $valid['email'] = $request->email;
        $valid['article_id'] = $request->article_id;
        // dd($valid);
        $comment = Comment::create($valid);
       
        return back();
    }

    public function destroy($id){
        
        $deleteComment = Comment::findOrFail($id);
        $deleteComment->delete();
        return back();
    }


}
