<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;
use App\Models\ServiceGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    //
    public function getIndex()
    {
        $images = ServiceGallery::all();
        $services = Service::all();

        return view('site.pages.gallery.index' ,compact('images' ,'services'));
    }
}
