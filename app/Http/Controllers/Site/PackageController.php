<?php
namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Mail\PackageRequestMail;
use App\Models\PackageRequest;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class PackageController extends Controller
{
    //
    public function getIndex()
    {
        $categories = Category::all();

        $projects = Project::whereHas('details', function ($query) {
            $query->where('description', '!=', null);
        })->get();

        $services = Service::all();

        return view('site.pages.packages.index', compact('categories', 'projects', 'services'));
    }

    public function postProject(Request $request)
    {
        $allProjects = $request->projects;

        $projects = Project::whereIn('id', $allProjects)->get();

        $service = $request->userJob;

        $selected = Service::whereHas('details', function ($query) use ($service) {
            $query->where('name', $service);
        })->first();

        if ($selected->id != 5) {
            $total1 = $projects->sum('price');

            $total2 = $request->beach_land ? $total1 * $request->beach_land : $total1;

            $total = $request->beach_long ? $total2 * $request->beach_long : $total2;
        }
        else {
            $total1 = $projects->whereNotIn('code', ['e', 'f'])->sum('price');
            $total2 = $request->beach_land ? $total1 * $request->beach_land : $total1;
            $total3 = $request->beach_long ? $total2 * $request->beach_long : $total2;

            $total_op = 0;
            $total_mn = 0;

            if ($projects->contains('code', 'e')) {
                switch ($request->beach_land) {
                    case (1) :
                        $total_op = 1800000;
                        break;
                    case (3) :
                        $total_op = 3000000;
                        break;
                    case (4.5) :
                        $total_op = 4500000;
                        break;
                }
            }

            if ($projects->contains('code', 'f')) {
                switch ($request->beach_long) {
                    case (1) :
                        $total_mn = 3000000;
                        break;
                    case (0.9) :
                        $total_mn = 5000000;
                        break;
                    case (0.8) :
                        $total_mn = 7500000;
                        break;
                }
            }

            $total = $total3 + $total_mn + $total_op;
        }
        
        session()->put('total' , $total);

        return ['status' => 'success', 'html' => view('site.pages.packages.templates.preview', compact('projects', 'total'))->render()];
    }

    public function postIndex(Request $request)
    {
        $v = validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'job' => 'not_in:0',
            'address' => 'required',
            'projects' => 'required',
            'from_date' => 'required',
            'to_date' => 'required'
        ], [
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your full name' : 'برجاء ادخال الاسم بالكامل',
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال البريد الالكتروني',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter phone number' : 'برجاء ادخال رقم الهاتف',
            'job.not_in' => app()->getLocale() == 'en' ? 'Please choose your required service' : 'برجاء اختيار الخدمه',
            'address.required' => app()->getLocale() == 'en' ? 'Please enter your address' : 'برجاء ادخال العنوان',
            'projects.required' => app()->getLocale() == 'en' ? 'Please choose at least one product' : 'برجاء اختيار منتج واحد علي الاقل',
            'from_date.required' => app()->getLocale() == 'en' ? 'Please choose the start date' : 'برجاء ادخال تاريخ البدايه',
            'to_date.required' => app()->getLocale() == 'en' ? 'Please choose the end date' : 'برجاء اختيار تاريخ النهايه'
        ]);

        if ($v->fails()) {
            return ['status' => 'error', 'data' => $v->errors()->all()];
        }

        $package = new PackageRequest();

        $package->name = $request->name;
        $package->email = $request->email;
        $package->phone = $request->phone;
        $package->address = $request->address;
        $package->job = $request->job;
        $package->from_date = $request->from_date;
        $package->to_date = $request->to_date;
        $package->projects = json_encode($request->projects);

        if ($package->save()) {
            session()->put('package_id' , $package->id);
            $service = $package->job;

            $selected = Service::whereHas('details', function ($query) use ($service) {
                $query->where('name', $service);
            })->first();

            if ($selected->id == 4 || $selected->id == 5) {
                $answer = new Answer();

                $answer->resort_name = $request->resort_name;
                $answer->resort_location = $request->resort_location;
                $answer->beach_long = $request->beach_long;
                $answer->beach_land = $request->beach_land;
                $answer->start_date = $request->start_date;
                $answer->visitors = $request->visitors;
                $answer->resort_type = $request->resort_type;
                if ($request->master_plan) {
                    $request->master_plan->store('answers');
                    $answer->master_plan = $request->master_plan->hashName();
                }
                $answer->request_id = $package->id;

                $answer->save();
            }
            return ['status' => 'success'];
        }
    }

    public function postSendEmail(Request $request)
    {
        $package = PackageRequest::find(session()->get('package_id'));
        $projects = Project::whereIn('id' , json_decode($package->projects))->get();
        $total = session()->get('total');

        Mail::to($package->email)->cc(Setting::first()->email)->send(new PackageRequestMail($package , $projects,$total));

        return ['status' => 'success' , 'data' => ['Your request and email has been sent; we will get back to you  in 24 hours']];
    }

    public function postChangeService(Request $request)
    {
        $service = $request->service;

        $selected = Service::whereHas('details', function ($query) use ($service) {
            $query->where('name', $service);
        })->first();

        $selectedCategories = Category::get();

        foreach ($selectedCategories as $selectedCategory) {
            if (in_array($selected->id, json_decode($selectedCategory->services))) {
                $categories[] = $selectedCategory;
            }
        }

        return ['html' => view('site.pages.packages.templates.services', compact('categories', 'selected'))->render()];
    }
}