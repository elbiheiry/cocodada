<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SocialLinkRequest;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialLinkController extends Controller
{
    //
    public function getIndex()
    {
        $links = SocialLink::orderBy('id' ,'DESC')->get();

        return view('admin.pages.links.index' ,compact('links'));
    }

    public function getInfo($id)
    {
        $link = SocialLink::find($id);

        return view('admin.pages.links..templates.edit' ,compact('link'));
    }

    public function postIndex(SocialLinkRequest $request)
    {
        $request->store();

        $links = SocialLink::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.links.templates.table' ,compact('links'))->render()];
    }

    public function postEdit(SocialLinkRequest $request , $id)
    {
        $request->edit($id);

        $links = SocialLink::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.links.templates.table' ,compact('links'))->render()];
    }

    public function getDelete($id)
    {
        $link = SocialLink::find($id);

        $link->delete();

        return redirect()->back();

    }
}
