<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProfileRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function getIndex()
    {
        $user = auth()->guard('admins')->user();

        return view('admin.pages.profile.index' ,compact('user'));
    }

    public function postIndex(ProfileRequest $request)
    {
        $request->edit();

        return ['status' => 'success'];
    }
}
