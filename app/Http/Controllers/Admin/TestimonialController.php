<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    //
    public function getIndex()
    {
        $members = Testimonial::orderBy('id' ,'DESC')->get();

        return view('admin.pages.testimonials.index' ,compact('members'));
    }

    public function getInfo($id)
    {
        $member = Testimonial::find($id);

        return view('admin.pages.testimonials..templates.edit' ,compact('member'));
    }

    public function postIndex(TestimonialRequest $request)
    {
        $request->store();

        $members = Testimonial::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.testimonials.templates.table' ,compact('members'))->render()];
    }

    public function postEdit(TestimonialRequest $request , $id)
    {
        $request->edit($id);

        $members = Testimonial::orderBy('id' ,'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.testimonials.templates.table' ,compact('members'))->render()];
    }

    public function getDelete($id)
    {
        $member = Testimonial::find($id);

        $member->delete();

        return redirect()->back();

    }
}
