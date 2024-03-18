<?php

namespace App\Http\Controllers\Site;

use App\Models\Join;
use App\Mail\JoinUsMail;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class TeamController extends Controller
{
    //
    public function getIndex()
    {
        $members = Team::all();

        return view('site.pages.team.index' ,compact('members'));
    }

    public function postIndex(Request $request)
    {
        $v = validator($request->all() ,[
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'role' => 'not_in:0',
            'cv' => 'required'
        ] ,[
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال البريد الالكتروني',
            'email.email' => app()->getLocale() == 'en' ? 'Email is invalid' : 'البريد الالكتروني غير صحيح',
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your name' : 'برجاء ادخال الاسم بالكامل',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter your phone number' : 'برجاء ادخال رقم الهاتف',
            'role.required' => app()->getLocale() == 'en' ? 'Please choose your role' : 'برجاء اختيار الوظيفه المراد التقديم لها',
            'cv.required' => app()->getLocale() == 'en' ? 'Please upload your CV' : 'برجاء اضافه السيره الذاتيه',
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $join = new Join();


        $join->email = $request->email;
        $join->name = $request->name;
        $join->phone = $request->phone;
        $join->role = $request->role;

        $request->cv->store('requests');
        $join->cv = $request->cv->hashName();

        if ($join->save()){
            Mail::to(Setting::first()->email)->send(new JoinUsMail($join->email , $join->name , $join->phone));
            return [
                'status' => 'success' ,
                'data' => app()->getLocale() == 'en' ? ['Thank you we will contact you ASAP'] : ['شكرا لك سنتواصل معك في اقرب وقت ممكن']
            ];
        }
    }
}
