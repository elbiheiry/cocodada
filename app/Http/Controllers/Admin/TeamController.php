<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    //
    public function getIndex()
    {
        $members = Team::orderBy('id' ,'DESC')->get();

        return view('admin.pages.team.index' ,compact('members'));
    }

    public function getInfo($id)
    {
        $member = Team::find($id);

        return view('admin.pages.team..templates.edit' ,compact('member'));
    }

    public function postIndex(TeamRequest $request)
    {
        $request->store();

        $members = Team::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.team.templates.table' ,compact('members'))->render()];
    }

    public function postEdit(TeamRequest $request , $id)
    {
        $request->edit($id);

        $members = Team::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.team.templates.table' ,compact('members'))->render()];
    }

    public function getDelete($id)
    {
        $member = Team::find($id);

        $member->delete();

        return redirect()->back();

    }
}
