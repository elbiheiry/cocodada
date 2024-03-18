<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceAudioRequest;
use App\Models\Service;
use App\Models\ServiceAudio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceAudioController extends Controller
{
    //
    public function getIndex($id)
    {
        $audios = Service::find($id)->audios()->orderBy('id' ,'DESC')->get();

        return view('admin.pages.services.audio.index' ,compact('audios' , 'id'));
    }

    public function getInfo($id)
    {
        $audio = ServiceAudio::find($id);

        return view('admin.pages.services.audio.templates.edit' ,compact('audio'));
    }

    public function postIndex(ServiceAudioRequest $request , $id)
    {
        $request->store($id);

        $audios = Service::find($id)->audios()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.audio.templates.table' ,compact('audios'))->render()];
    }

    public function postEdit(ServiceAudioRequest $request , $id)
    {
        $request->edit($id);
        $audio = ServiceAudio::find($id);

        $audios = Service::find($audio->service_id)->audios()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.audio.templates.table' ,compact('audios'))->render()];
    }

    public function getDelete($id)
    {
        $audio = ServiceAudio::find($id);

        $audio->delete();

        return redirect()->back();

    }
}
