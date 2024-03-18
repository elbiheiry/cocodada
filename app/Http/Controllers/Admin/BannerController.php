<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;

class BannerController extends Controller
{
    //
    public function getIndex()
    {
        $banners = Banner::orderBy('id' , 'DESC')->get();

        return view('admin.pages.banners.index' ,compact('banners'));
    }

    public function getInfo($id)
    {
        $banner = Banner::find($id);

        return view('admin.pages.banners.templates.edit' ,compact('banner'));
    }

    public function postEdit(BannerRequest $request ,$id)
    {
        $request->edit($id);

        $banners = Banner::all();

        return ['status' => 'success' ,'html' => view('admin.pages.banners.templates.table',compact('banners'))->render()];
    }
}
