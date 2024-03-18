<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceTypeRequest;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceTypeController extends Controller
{
    //
    public function getIndex($id)
    {
        $types = Service::find($id)->types()->orderBy('id' ,'DESC')->get();

        return view('admin.pages.services.types.index' ,compact('types' , 'id'));
    }

    public function getInfo($id)
    {
        $type = ServiceType::find($id);

        return view('admin.pages.services.types.templates.edit' ,compact('type'));
    }

    public function postIndex(ServiceTypeRequest $request , $id)
    {
        $request->store($id);

        $types = Service::find($id)->types()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.types.templates.table' ,compact('types'))->render()];
    }

    public function postEdit(ServiceTypeRequest $request , $id)
    {
        $request->edit($id);
        $type = ServiceType::find($id);

        $types = Service::find($type->service_id)->types()->orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.types.templates.table' ,compact('types'))->render()];
    }

    public function getDelete($id)
    {
        $type = ServiceType::find($id);

        $type->delete();

        return redirect()->back();

    }
}
