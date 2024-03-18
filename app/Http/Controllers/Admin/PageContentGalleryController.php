<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PageContentGalleryRequest;
use App\Models\PageContent;
use App\Models\PageContentGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageContentGalleryController extends Controller
{
    //
    public function getIndex($id)
    {
        $images = PageContent::find($id)->images()->orderBy('id' ,'DESC')->get();

        return view('admin.pages.content.images.index' ,compact('images' , 'id'));
    }

    public function getInfo($id)
    {
        $image = PageContentGallery::find($id);

        return view('admin.pages.content.images.templates.edit' ,compact('image'));
    }

    public function postIndex(PageContentGalleryRequest $request , $id)
    {
        $request->store($id);

        $images = PageContent::find($id)->images()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.content.images.templates.table' ,compact('images'))->render()];
    }

    public function postEdit(PageContentGalleryRequest $request , $id)
    {
        $request->edit($id);
        $image = PageContentGallery::find($id);

        $images = PageContent::find($image->service_id)->images()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.content.images.templates.table' ,compact('images'))->render()];
    }

    public function getDelete($id)
    {
        $image = PageContentGallery::find($id);

        $image->delete();

        return redirect()->back();

    }
}
