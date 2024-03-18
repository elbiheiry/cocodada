<?php

namespace App\Http\Controllers\Site;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //
    public function getIndex()
    {
        $videos = Video::all();

        return view('site.pages.videos.index' ,compact('videos'));
    }
}
