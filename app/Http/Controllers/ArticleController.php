<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
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

    
}
