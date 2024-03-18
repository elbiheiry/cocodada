<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Client;

class AboutController extends Controller
{
    public function getIndex()
    {
        $abouts = About::all();
        $clients = Client::all();

        return view('site.pages.about.index' ,compact('abouts' ,'clients'));
    }
}
