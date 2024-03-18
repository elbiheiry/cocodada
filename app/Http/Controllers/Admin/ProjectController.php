<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    //
    public function getIndex($id)
    {
        $projects = Category::find($id)->projects()->orderBy('id' ,'DESC')->get();

        return view('admin.pages.projects.index' ,compact('projects' , 'id'));
    }

    public function getInfo($id)
    {
        $project = Project::find($id);

        return view('admin.pages.projects.templates.edit' ,compact('project'));
    }

    public function postIndex(ProjectRequest $request , $id)
    {
        $request->store($id);

        $projects = Category::find($id)->projects()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.projects.templates.table' ,compact('projects'))->render()];
    }

    public function postEdit(ProjectRequest $request , $id)
    {
        $request->edit($id);
        $project = Project::find($id);

        $projects = Category::find($project->category_id)->projects()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.projects.templates.table' ,compact('projects'))->render()];
    }

    public function getDelete($id)
    {
        $project = Project::find($id);

        $project->delete();

        return redirect()->back();

    }
}
