<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.articleList', ["articles" => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //publish form
        return view('admin.article.articleForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $valid = $request->validate([
            'title'=>'required|string|max:50',
            'description' => 'required',
            'photo'=>'mimes:jpg,svg,png|max:10240'
        ]);

        $article = $valid;
        $article['publish'] = $request->description?true:false;
        $article['id_author'] = Auth::user()->id;
        if ($article['publish']) {
            $article['publish_date'] = now();
        }

        $newArticle = Article::create($article);
        if ($newArticle) {
           return  redirect()->route('articles.index')->with(["status"=>"Article Added successfully"]);
        }else{
            return back()->with("error","Failed to create the Article")->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.article.editArticle', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //validation
        $valid = $request->validate([

            'title'=>'required|string|max:50',
            'description' => 'required',
            'photo'=>'mimes:jpg,svg,png|max:10240'
        ]);

        $editAticle = $valid;
        $editAticle['publish'] = $request->description?true:false;
        $editAticle['id_author'] = Auth::user()->id;
        if ($editAticle['publish']) {
            $editAticle['publish_date'] = now();
        }

        $article->update([

            'title'=> $request->title,
            'description' => $request->description,
            'photo'=> $request->photo
        ]);

        return back()->with('successEdit', 'Article number '.$article->id.' edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        $article->delete();

        return back()->with('successDelete', 'The article number '.$article->id.' deleted successfully!');
    }
}
