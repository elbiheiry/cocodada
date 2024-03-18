<?php

namespace App\Http\Controllers\Site;

use App\Mail\ContactUsMail;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function getIndex()
    {
        return view('site.pages.contact.index');
    }

    public function postIndex(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => 'required|recaptcha'
        ] ,[
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your full name' : 'برجاء ادخال الاسم بالكامل',
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال البريد الالكتروني',
            'email.email' => app()->getLocale() == 'en' ? 'Email is invalid' : 'البريد الالكتروني غير صحيح',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter phone number' : 'برجاء ادخال رقم الهاتف',
            'message.required' => app()->getLocale() == 'en' ? 'Please enter your message' : 'برجاء ادخال الرساله',
            'g-recaptcha-response.recaptcha' => app()->getLocale() == 'en' ? 'Captcha verification failed' : 'لم تقم بالاجابه بشكل صحيح',
            'g-recaptcha-response.required' => app()->getLocale() == 'en' ? 'Please complete the captcha' : 'برجاء اكمال الاختبار'
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->service_id = $request->service_id;

        if ($message->save()){
            Mail::to(Setting::first()->email)->send(new ContactUsMail($message->name , $message->email , $message->subject , $message->phone , $message->message));
            return [
                'status' => 'success' ,
                'data' => app()->getLocale() == 'en' ? ['Thank you we will contact you ASAP'] : ['شكرا لك سيتم التواصل معكم في اسرع وقت']
            ];
        }
    }
}
