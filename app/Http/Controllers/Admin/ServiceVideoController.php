<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceVideoRequest;
use App\Models\Service;
use App\Models\ServiceVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceVideoController extends Controller
{
    //
    public function getIndex($id)
    {
        $videos = Service::find($id)->videos()->orderBy('id' ,'DESC')->get();

        return view('admin.pages.services.videos.index' ,compact('videos' , 'id'));
    }

    public function getInfo($id)
    {
        $video = ServiceVideo::find($id);

        return view('admin.pages.services.videos.templates.edit' ,compact('video'));
    }

    public function postIndex(ServiceVideoRequest $request , $id)
    {
        $request->store($id);

        $videos = Service::find($id)->videos()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.videos.templates.table' ,compact('videos'))->render()];
    }

    public function postEdit(ServiceVideoRequest $request , $id)
    {
        $request->edit($id);
        $video = ServiceVideo::find($id);

        $videos = Service::find($video->service_id)->videos()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.videos.templates.table' ,compact('videos'))->render()];
    }

    public function getDelete($id)
    {
        $video = ServiceVideo::find($id);

        $video->delete();

        return redirect()->back();

    }
}
