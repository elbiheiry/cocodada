<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TeamLinkRequest;
use App\Models\Team;
use App\Models\TeamLink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamLinkController extends Controller
{
    //
    public function getIndex($id)
    {
        $links = Team::find($id)->social_links()->orderBy('id' ,'DESC')->get();

        return view('admin.pages.team.links.index' ,compact('links' , 'id'));
    }

    public function getInfo($id)
    {
        $link = TeamLink::find($id);

        return view('admin.pages.team.links.templates.edit' ,compact('link'));
    }

    public function postIndex(TeamLinkRequest $request , $id)
    {
        $request->store($id);

        $links = Team::find($id)->social_links()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.team.links.templates.table' ,compact('links'))->render()];
    }

    public function postEdit(TeamLinkRequest $request , $id)
    {
        $request->edit($id);
        $team = TeamLink::find($id);

        $links = Team::find($team->team_id)->social_links()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.team.links.templates.table' ,compact('links'))->render()];
    }

    public function getDelete($id)
    {
        $link = TeamLink::find($id);

        $link->delete();

        return redirect()->back();

    }
}
