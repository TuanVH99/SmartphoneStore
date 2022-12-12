<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;

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
        return view('admin.articles.listArticle',['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.addArticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'article-title' => 'required',
            'content' => 'required',
            'sort-order' => 'required'
        ]);
        //  Store data in database
        $article = new Article([
            'title' => $request->input('article-title'),
            'content' => $request->input('content'),
            'sort_order' => $request->input('sort-order')
        ]);
        $article->save();
        return redirect()->route('article.list')->with("success","Lưu thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article= Article::find($id);
        return view('article-detail',['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.articles.editArticle',['article' => $article]);
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
        $article = Article::find($id);
        $article->title =  $request->input('article-title');
        $article->content = $request->input('content');
        $article->sort_order = $request->input('sort-order');
        $article->save();
        return redirect()->route('article.list')->with("success","Sửa thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('article.list')->with("success","Xóa thành công");
    }

    /**
     * Display a listing of the resource in front end
     *
     * @return \Illuminate\Http\Response
     */
    public function showArticle()
    {
        $articles = DB::table('articles')->orderBy('sort_order')->get();
        return view('article',['articles'=>$articles]);
    }
}
