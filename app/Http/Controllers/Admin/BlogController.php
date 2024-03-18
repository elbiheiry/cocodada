<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Requests\Admin\BlogRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //
    public function getIndex()
    {
        $articles = Blog::orderBy('id' ,'DESC')->get();

        return view('admin.pages.blog.index' ,compact('articles'));
    }

    public function getInfo($id)
    {
        $article = Blog::find($id);

        return view('admin.pages.blog.templates.edit' ,compact('article'));
    }

    public function postIndex(BlogRequest $request)
    {
        $request->store();

        $articles = Blog::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.blog.templates.table' ,compact('articles'))->render()];
    }

    public function postEdit(BlogRequest $request , $id)
    {
        $request->edit($id);

        $articles = Blog::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.blog.templates.table' ,compact('articles'))->render()];
    }

    public function getDelete($id)
    {
        $article = Blog::find($id);

        $article->delete();

        return redirect()->back();

    }
}
