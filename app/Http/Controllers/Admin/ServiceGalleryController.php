<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceGalleryRequest;
use App\Models\Service;
use App\Models\ServiceGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceGalleryController extends Controller
{
    //
    public function getIndex($id)
    {
        $images = Service::find($id)->images()->orderBy('id' ,'DESC')->get();

        return view('admin.pages.services.images.index' ,compact('images' , 'id'));
    }

    public function getInfo($id)
    {
        $image = ServiceGallery::find($id);

        return view('admin.pages.services.images.templates.edit' ,compact('image'));
    }

    public function postIndex(ServiceGalleryRequest $request , $id)
    {
        $request->store($id);

        $images = Service::find($id)->images()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.images.templates.table' ,compact('images'))->render()];
    }

    public function postEdit(ServiceGalleryRequest $request , $id)
    {
        $request->edit($id);
        $image = ServiceGallery::find($id);

        $images = Service::find($image->service_id)->images()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.images.templates.table' ,compact('images'))->render()];
    }

    public function getDelete($id)
    {
        $image = ServiceGallery::find($id);

        $image->delete();

        return redirect()->back();

    }
}
