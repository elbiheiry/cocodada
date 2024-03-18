<?php

namespace App\Http\Controllers\Site;

use App\Models\PageContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OtherFormMail;
use App\Models\OtherForm;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class GamificationController extends Controller
{
    //
    public function getIndex()
    {
        $content = PageContent::find(2);

    	return view('site.pages.gamification.index' , compact('content'));
    }
    
    public function postIndex(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'organization_name' => 'required',
            'date' => 'required',
            'description' => 'required',
            'location' => 'required'
        ] ,[
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your full name' : 'برجاء ادخال الاسم بالكامل',
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال البريد الالكتروني',
            'email.email' => app()->getLocale() == 'en' ? 'Email is invalid' : 'البريد الالكتروني غير صحيح',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter phone number' : 'برجاء ادخال رقم الهاتف',
            'organization_name.required' => app()->getLocale() == 'en' ? 'Please enter your organization name' : 'برجاء ادخال اسم المنظمه الخاصه بك',
            'date.required' => app()->getLocale() == 'en' ? 'Please enter your desired date for this project' : 'برجاء ادخال الموعد المطلوب لهذا المشروع',
            'description.required' => app()->getLocale() == 'en' ? 'Please Tell us more about your product identity and target audience' : 'برجاء اخبارنا بالمزيد عن هويه المنتج الخاص بك والجمهور الخاص به',
            'location.required' => app()->getLocale() == 'en' ? 'Please ,Where is the location of this job ?' : 'برجاء ادخال مكان اقامه هذا المشروع'
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $message = new OtherForm();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->organization_name = $request->organization_name;
        $message->date = $request->date;
        $message->description = $request->description;
        $message->location = $request->location;
        $message->type = $request->type;

        if ($message->save()){
            Mail::to(Setting::first()->email)->send(new OtherFormMail($message->name , $message->email , $message->phone , $message->type));
            return [
                'status' => 'success' ,
                'data' => app()->getLocale() == 'en' ? ['Thank you we will contact you ASAP'] : ['شكرا لك سيتم التواصل معكم في اسرع وقت']
            ];
        }
    }
}
