<?php

namespace App\Http\Controllers\Site;

use App\Models\About;
use App\Models\Article;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Package;
use App\Models\PackageOrder;
use App\Models\ServiceGallery;
use App\Models\Subscriber;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $about = About::first();
        $events = Article::all();
        $images = ServiceGallery::where('featured' , 1)->take(12)->get();
        $members = Team::take(6)->get();
        $clients = Client::all();
        $testimonials = Testimonial::whereHas('details' , function ($q){
            $q->where('name' ,'!=' , null);
        })->get();
        $logos = Testimonial::whereHas('details' , function ($q){
            $q->where('name' , null);
        })->get();
        $packages = Package::orderBy('id' , 'DESC')->get();

        return view('site.pages.index' ,compact('about','events','images','members','clients' ,'testimonials','packages' , 'logos'));
    }

    //get mobile pages
    public function getMobileView()
    {
        return view('site.pages.mobile.index');
    }

    //subscribe function
    public function postIndex(Request $request)
    {
        $v = validator($request->all() ,[
            'email' => 'required|email|unique:subscribers'
        ] ,[
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال البريد الالكتروني',
            'email.email' => app()->getLocale() == 'en' ? 'Email is invalid' : 'البريد الالكتروني غير صحيح',
            'email.unique' => app()->getLocale() == 'en' ? 'Email is already added' : 'البريد الالكتروني مضاف بالفعل',
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $subscribe = new Subscriber();


        $subscribe->email = $request->email;

        if ($subscribe->save()){
            return [
                'status' => 'success' ,
                'data' => app()->getLocale() == 'en' ? ['Thank you For subscribing in our newsletter'] : ['شكرا لك لاشتراكك في النشره الاخباريه']
            ];
        }
    }

    //choose one of the packages
    public function postChoosePackage(Request $request)
    {
        $v = validator($request->all() ,[
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required'
        ] ,[
            'email.required' => app()->getLocale() == 'en' ? 'Please enter your email' : 'برجاء ادخال البريد الالكتروني',
            'email.email' => app()->getLocale() == 'en' ? 'Email is invalid' : 'البريد الالكتروني غير صحيح',
            'name.required' => app()->getLocale() == 'en' ? 'Please enter your name' : 'برجاء ادخال الاسم بالكامل',
            'phone.required' => app()->getLocale() == 'en' ? 'Please enter your phone number' : 'برجاء ادخال رقم الهاتف',
        ]);

        if ($v->fails()){
            return ['status' => 'error' ,'data' => $v->errors()->all()];
        }

        $order = new PackageOrder();

        $order->package_id = $request->package_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->notes = $request->notes;

        if ($order->save()){
            return [
                'status' => 'success' ,
                'data' => app()->getLocale() == 'en' ? ['Thanks for your choice , we will contact you very soon'] : ['شكرا علي اختيارك سيتم التواصل معكم قريبا']
            ];
        }
    }
    
    public function getPolicy()
    {
        return view('site.pages.privacy.index');
    }
    
    public function getArticles()
    {
        $articles = Blog::all()->sortByDesc('id');
        
        return view('site.pages.articles.index' , compact('articles'));
    }
    
    public function getArticle($slug)
    {
        $article = Blog::whereSlug($slug)->firstOrFail();
        $relates = Blog::all()->where('id' , '!=' , $article->id)->sortByDesc('id')->take(3);
        
        return view('site.pages.articles.single' ,compact('article' , 'relates'));
    }
}
