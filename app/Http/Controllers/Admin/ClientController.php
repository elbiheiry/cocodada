<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\Requests\Admin\ClientRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    //
    public function getIndex()
    {
        $clients = Client::orderBy('id' ,'DESC')->get();

        return view('admin.pages.clients.index' ,compact('clients'));
    }

    public function getInfo($id)
    {
        $client = Client::find($id);

        return view('admin.pages.clients..templates.edit' ,compact('client'));
    }

    public function postIndex(ClientRequest $request)
    {
        $request->store();

        $clients = Client::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.clients.templates.table' ,compact('clients'))->render()];
    }

    public function postEdit(ClientRequest $request , $id)
    {
        $request->edit($id);

        $clients = Client::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.clients.templates.table' ,compact('clients'))->render()];
    }

    public function getDelete($id)
    {
        $client = Client::find($id);

        $client->delete();

        return redirect()->back();

    }
}
