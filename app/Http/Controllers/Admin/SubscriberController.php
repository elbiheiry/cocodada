<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    //
    public function getIndex()
    {
        $subscribers = Subscriber::orderBy('id' ,'DESC')->get();

        return view('admin.pages.subscribers.index' ,compact('subscribers'));
    }

    public function getDelete($id)
    {
        $message = Subscriber::find($id);

        $message->delete();

        return redirect()->back();
    }
}
