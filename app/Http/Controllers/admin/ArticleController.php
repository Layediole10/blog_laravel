<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $articles = Article::orderBy('title', 'asc')->paginate(5);
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
        $article['publish'] = $request->publish?true:false;
        $article['id_author'] = Auth::user()->id;

        // upload a image file
        
        if ($request->file('photo')) {

            $file = $request->file('photo');
            // Generate a file name with extension
            $fileName = 'article-'.time().'.'.$file->getClientOriginalExtension();
            // Save the file
            $path = $file->storeAs('img', $fileName, 'public');
            $article['photo'] = $path;
        }

        
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
        $showArticle = Article::findOrFail($id);
        return view('admin.article.showArticle', [
            'showArticle' => $showArticle
        ]);        
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
        $editAticle['publish'] = $request->publish?true:false;
        $editAticle['id_author'] = Auth::user()->id;
        $editAticle['title'] = $request->title;
        $editAticle['description']= $request->description;

        if ($editAticle['publish']) {
            $editAticle['publish_date'] = now();
        }else{
            $editAticle['publish_date'] = null;
        }

        if ($request->file('photo')) {

            $file = $request->file('photo');
            // Generate a file name with extension
            $fileName = 'article-'.time().'.'.$file->getClientOriginalExtension();
            // Save the file
            $path = $file->storeAs('img', $fileName, 'public');
            $editAticle['photo'] = $path;
        }


        $article->update($editAticle);

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

    public function search()
    {
        $input = request()->input('q');

        $result = Article::where('title', 'like', "%$input%")->orwhere('description', 'like', "%$input%")->paginate(5); 

        return view('admin.article.searchArticle', ['result' => $result]);
    }

    public function publish($id)
    {

        $article = Article::find($id);

        $article->publish = !$article->publish ;
        $message = "";
        if ($article['publish']) {
            $article['publish_date'] = now();
            $message = "Article $article->id published successfully";            
        }else{
            $article['publish_date'] = null;
            $message = "Article $article->id unpublished successfully";
        }
        
        if($article->update()){
            return  redirect()->route('articles.index')->with(["state"=>$message]);
        }else{
            return back()->with("error","Failed to edit the Article")->withInput();
        }
    }
}
