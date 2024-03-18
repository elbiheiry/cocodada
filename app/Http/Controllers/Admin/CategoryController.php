<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function getIndex()
    {
        $categories = Category::orderBy('id' ,'DESC')->get();
        $services = Service::all();

        return view('admin.pages.categories.index' ,compact('categories' ,'services'));
    }

    public function getInfo($id)
    {
        $category = Category::find($id);
        $services = Service::all();

        return view('admin.pages.categories..templates.edit' ,compact('category' ,'services'));
    }

    public function postIndex(CategoryRequest $request)
    {
        $request->store();

        $categories = Category::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.categories.templates.table' ,compact('categories'))->render()];
    }

    public function postEdit(CategoryRequest $request , $id)
    {
        $request->edit($id);

        $categories = Category::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.categories.templates.table' ,compact('categories'))->render()];
    }

    public function getDelete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->back();

    }
}
