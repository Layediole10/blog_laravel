<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        return view('showArticle', [
            'showArticle' => $showArticle
        ]);        
    }

    
}
