<?php

namespace App\Http\Controllers\Site;

use App\Models\Download;
use App\Models\PageContent;
use App\Models\ServiceAudio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    //
    public function getIndex()
    {
        $downloads = Download::all();
        $audios = ServiceAudio::orderBy('id' , 'DESC')->get();

        return view('site.pages.cards.index' ,compact('downloads' ,'audios'));
    }

    public function getFranchising()
    {
        $content = PageContent::find(1);

        return view('site.pages.franchising.index' ,compact('content'));
    }
}
