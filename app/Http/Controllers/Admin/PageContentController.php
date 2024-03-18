<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PageContentRequest;
use App\Models\PageContent;
use App\Models\OtherForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageContentController extends Controller
{
    //
    public function getIndex()
    {
        $pages = PageContent::all();

        return view('admin.pages.content.index' ,compact('pages'));
    }

    public function getInfo($id)
    {
        $page = PageContent::find($id);

        return view('admin.pages.content.templates.edit' ,compact('page'));
    }

    public function postEdit(PageContentRequest $request ,$id)
    {
        $request->edit($id);

        $pages = PageContent::all();

        return ['status' => 'success' ,'html' => view('admin.pages.content.templates.table',compact('pages'))->render()];
    }
    
    public function getMessages()
    {
        $messages = OtherForm::get();
        
        return view('admin.pages.content.messages' , compact('messages'));
    }
    
    public function getDelete($id)
    {
        $message = OtherForm::find($id);

        $message->delete();

        return redirect()->back();
    }
}
