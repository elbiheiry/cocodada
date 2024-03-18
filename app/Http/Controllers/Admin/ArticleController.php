<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Requests\Admin\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function getIndex()
    {
        $articles = Article::orderBy('id' ,'DESC')->get();

        return view('admin.pages.articles.index' ,compact('articles'));
    }

    public function getInfo($id)
    {
        $article = Article::find($id);

        return view('admin.pages.articles..templates.edit' ,compact('article'));
    }

    public function postIndex(ArticleRequest $request)
    {
        $request->store();

        $articles = Article::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.articles.templates.table' ,compact('articles'))->render()];
    }

    public function postEdit(ArticleRequest $request , $id)
    {
        $request->edit($id);

        $articles = Article::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.articles.templates.table' ,compact('articles'))->render()];
    }

    public function getDelete($id)
    {
        $article = Article::find($id);

        $article->delete();

        return redirect()->back();

    }
}
