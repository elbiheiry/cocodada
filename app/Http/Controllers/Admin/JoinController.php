<?php

namespace App\Http\Controllers\Admin;

use App\Models\Join;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinController extends Controller
{
    //
    public function getIndex()
    {
        $messages = Join::orderBy('id' ,'DESC')->paginate(15);

        return view('admin.pages.join.index' ,compact('messages'));
    }

    public function getDelete($id)
    {
        $message = Join::find($id);

        @unlink(storage_path('uploads/requests/').$message->cv);
        $message->delete();

        return redirect()->back();
    }
}
