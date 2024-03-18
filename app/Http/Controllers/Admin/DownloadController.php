<?php

namespace App\Http\Controllers\Admin;

use App\Models\Download;
use App\Http\Requests\Admin\DownloadRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function getIndex()
    {
        $downloads = Download::orderBy('id' ,'DESC')->get();

        return view('admin.pages.downloads.index' ,compact('downloads'));
    }

    public function getInfo($id)
    {
        $download = Download::find($id);

        return view('admin.pages.downloads..templates.edit' ,compact('download'));
    }

    public function postIndex(DownloadRequest $request)
    {
        $request->store();

        $downloads = Download::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.downloads.templates.table' ,compact('downloads'))->render()];
    }

    public function postEdit(DownloadRequest $request , $id)
    {
        $request->edit($id);

        $downloads = Download::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.downloads.templates.table' ,compact('downloads'))->render()];
    }

    public function getDelete($id)
    {
        $download = Download::find($id);

        $download->delete();

        return redirect()->back();

    }
}
