<?php

namespace App\Http\Controllers\Site;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //

    public function getIndex()
    {
        $services = Service::all();

        return view('site.pages.services.index' ,compact('services'));
    }

    public function getSingleService($slug)
    {
        $service = Service::where('slug' , $slug)->first();

        return view('site.pages.services.single' ,compact('service'));
    }
}
