<?php

namespace App\Http\Controllers\Admin;

use App\Models\PackageRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageRequestController extends Controller
{
    //
    public function getIndex()
    {
        $messages = PackageRequest::orderBy('id' ,'DESC')->paginate(15);

        return view('admin.pages.package_request.index' ,compact('messages'));
    }

    public function getSingleMessage($id)
    {
        $message = PackageRequest::with('answer')->find($id);

        $projects = Project::whereIn('id' , json_decode($message->projects))->get();

        return view('admin.pages.package_request.single' ,compact('message' , 'projects'));
    }

    public function getDelete($id)
    {
        $message = PackageRequest::find($id);

        $message->delete();

        return redirect()->back();
    }
}
