<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PackageRequest;
use App\Models\Package;
use App\Models\PackageOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    //
    public function getIndex()
    {
        $packages = Package::orderBy('id' ,'DESC')->get();

        return view('admin.pages.packages.index' ,compact('packages'));
    }

    public function getInfo($id)
    {
        $package = Package::find($id);

        return view('admin.pages.packages.templates.edit' ,compact('package'));
    }

    public function postIndex(PackageRequest $request)
    {
        $request->store();

        $packages = Package::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.packages.templates.table' ,compact('packages'))->render()];
    }

    public function postEdit(PackageRequest $request , $id)
    {
        $request->edit($id);

        $packages = Package::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.packages.templates.table' ,compact('packages'))->render()];
    }

    public function getDelete($id)
    {
        $member = Package::find($id);

        $member->delete();

        return redirect()->back();
    }

    //get package orders
    public function getOrder($id)
    {
        $orders = PackageOrder::where('package_id' , $id)->get();

        return view('admin.pages.packages.orders' , compact('orders'));
    }

    public function getDeleteOrder($id)
    {
        $order = PackageOrder::find($id);

        $order->delete();

        return redirect()->back();
    }
}
