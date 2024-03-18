<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //
    public function getIndex()
    {
        $videos = Video::orderBy('id' ,'DESC')->get();

        return view('admin.pages.videos.index' ,compact('videos'));
    }

    public function getInfo($id)
    {
        $video = Video::find($id);

        return view('admin.pages.videos..templates.edit' ,compact('video'));
    }

    public function postIndex(VideoRequest $request)
    {
        $request->store();

        $videos = Video::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.videos.templates.table' ,compact('videos'))->render()];
    }

    public function postEdit(VideoRequest $request , $id)
    {
        $request->edit($id);

        $videos = Video::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.videos.templates.table' ,compact('videos'))->render()];
    }

    public function getDelete($id)
    {
        $video = Video::find($id);

        $video->delete();

        return redirect()->back();

    }
}
