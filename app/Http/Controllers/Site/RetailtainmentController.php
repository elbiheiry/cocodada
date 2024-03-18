<?php

namespace App\Http\Controllers\Site;

use App\Models\PageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RetailtainmentController extends Controller
{
    //
    public function getIndex()
    {
        $content = PageContent::find(3);

    	return view('site.pages.retailtainment.index' , compact('content'));
    }
}
