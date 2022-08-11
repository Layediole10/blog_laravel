<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        
            $articleList = Article::all();

        return view('article', ['articleList'=>$articleList]);
    }

    public function show($id)
    {
        $showArticle = Article::findOrFail($id);
        $comments = Comment::where('article_id', '=', $id)->get();
        return view('showArticle', [
            'showArticle' => $showArticle,
            'comments' => $comments
        ]); 
        
    }

    public function liker(){

        $likeArticle = Article::find(request()->id);
        if ($likeArticle->isLikedByLoggedInUser()) {
           $result = Like::where([
                'user_id' => auth()->user()->id,
                'article_id' => request()->id
            ])->delete();
            if ($result) {
                return response()->json([
                    'count' => Article::find(request()->id)->likes->count(),

                ]);
            }
        }else{
           
            $like = new Like();

            $like->user_id = auth()->user()->id;
            $like->article_id = request()->id;

            $like->save();
            return response()->json([
                'count' => Article::find(request()->id)->likes->count(),

            ]);
        }
    }
}
