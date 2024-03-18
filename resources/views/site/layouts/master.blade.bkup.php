<!DOCTYPE html>
<html>

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Meta Tags
        ======================-->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @if(request()->route()->getName() == 'site.article' || request()->route()->getName() == 'site.services.single')
            @yield('meta')
        @else
            <meta NAME="keywords" CONTENT="{{$settings->keywords}}" />
            <meta NAME="description" CONTENT="{{$settings->meta_description}}" />
            <meta name="author" content="{{$settings->author}}">
        @endif
        <meta NAME="copyright" CONTENT="" />
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <!-- Title Name
        ================================-->
        <title>CoCoDaDa|@yield('title')</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/site/images/fav-icon.png')}}">

        <!-- Css Base And Vendor
        ===================================-->
        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/bootstrap-ar.css')}}">
        @else
            <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/bootstrap-en.css')}}">
        @endif
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/animation/animate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/owl.carousel/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/popup/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/datepicker/jquery.datetimepicker.min.css')}}">

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
        @if(app()->getLocale() == 'ar')
            <link rel="stylesheet" href="{{asset('assets/site/css/rtl.css')}}">
        @endif

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        
        <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '304120677552139'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=304120677552139&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
    </head>
    <body>
        <div class="modal fade" id="form-messages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header custom-modal">
                        <h5 class="modal-title" id="exampleModalLabel">{{app()->getLocale() == 'en' ? 'Notes' : 'ملاحظات'}}</h5>
                    </div>
                    <div class="modal-body">
                        <div class="response-messages">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="join_team" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content text-center ajax-form" method="post" action="{{route('site.join')}}">
                    {!! csrf_field() !!}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{app()->getLocale() == 'en' ? 'Join To our Team' : 'انضم لفريق العمل'}}</h5>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>{{app()->getLocale() == 'en' ? 'Full Name' : 'الاسم بالكامل'}} :</label>
                            <input type="text" class="form-control" placeholder="{{app()->getLocale() == 'en' ? 'Full Name' : 'الاسم بالكامل'}}" name="name">
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>{{app()->getLocale() == 'en' ? 'Email Address' : 'البريد الالكتروني'}} :</label>
                            <input type="email" class="form-control" placeholder="{{app()->getLocale() == 'en' ? 'Email Address' : 'البريد الالكتروني'}}" name="email">
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>{{app()->getLocale() == 'en' ? 'Phone Number' : 'رقم الهاتف'}} :</label>
                            <input type="text" class="form-control" placeholder="{{app()->getLocale() == 'en' ? 'Phone Number' : 'رقم الهاتف'}}" name="phone">
                        </div>
                        <div class="col-md-6 col-sm-6 form-group">
                            <label>{{app()->getLocale() == 'en' ? 'Upload CV' : 'تحميل السيره الذاتيه'}} :</label>
                            <input type="file" class="form-control" name="cv">
                        </div>
                        <div class="col-md-12 col-sm-12 form-group">
                            <label>{{app()->getLocale() == 'en' ? 'Apply As' : 'انضم الينا ك'}} :</label>
                            <select class="form-control" name="role">
                                <option selected="selected" value="0">{{app()->getLocale() == 'en' ? 'Apply As' : 'انضم الينا ك'}} :</option>
                                <option value="Animator">Animator</option>
                                <option value="Game coach">Game coach</option>
                                <option value="Dancer">Dancer</option>
                                <option value="DJ&amp;MC">DJ&amp;MC</option>
                                <option value="Decorator">Decorator</option>
                                <option value="Marketing and Business Development">Marketing and Business Development</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="submit" class="custom-btn green-bc" id="SubmitBTN">
                            <i class="fa fa-plus"></i> {{app()->getLocale() == 'en' ? 'Join' : 'انضم الان'}}
                        </button>
                        <button type="button" class="custom-btn" data-dismiss="modal">
                            <i class="fa fa-times"></i>{{app()->getLocale() == 'en' ? 'close' : 'اغلاق'}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @yield('modals')

        <!-- Header
        ==========================================-->
        @include('site.layouts.header')
        <!-- Home Main
        ==========================================-->
        <div class="main">
            @yield('content')
            <!-- Footer
            ============================================= -->
            @include('site.layouts.footer')
        </div><!--End Main-->
        <!-- Up BTN
        ============================================= -->
        <button type="button" class="up-btn custom-btn">
            <span><i class="fa fa-arrow-up"></i></span>
        </button>
       
        <!-- Loader
        ============================-->
        <div class="loader">
            <div class="spinner">
                <img src="{{asset('assets/site/images/preloader.gif')}}">
            </div>
        </div>
        <!-- JS Base And Vendor
        ==========================================-->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/animation/wow.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/owl.carousel/owl.carousel.js')}}"></script>
        <script src="{{asset('assets/site/vendor/popup/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/site/vendor/counterdown/countdown.js')}}"></script>
        <script src="{{asset('assets/site/vendor/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('assets/site/js/main.js')}}"></script>
        <script src="{{asset('assets/admin/js/jquery.form.js')}}"></script>
        @yield('js')
        <script>
            wow = new WOW(
                {
                    animateClass: 'animated',
                    offset: 80,
                    callback: function(box) {
                        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                    }
                }
            );
            wow.init();

            $('.ajax-form').ajaxForm({
                beforeSend: function() {
                    $('#SubmitBTN').html("<i class='fas fa-envelope'></i>{{app()->getLocale() == 'en' ? 'Wait' : 'انتظر'}}");
                    $('#SubmitBTN').attr('disabled' , true);
                    
                    $('.custom-btn').attr('disabled' , true);
                },
                uploadProgress: function(event, position, total, percentComplete) {

                },
                success: function(response) {
                    $('.custom-btn').removeAttr('disabled' , true);
                    if (response.status === "success") {
                        $(".ajax-form").clearForm();
                    }
                    $('#form-messages').modal('show');
                    $('#join_team').modal('hide');
                    $('#choose_plan').modal('hide');

                    var errors = response.data;

                    $('.response-messages').html('');

                    $.each(errors, function( index, error ) {
                        $('.response-messages').append('<p>'+error+'</p>');
                    });
                    $('#SubmitBTN').html("<i class='fas fa-envelope'></i>{{app()->getLocale() == 'en' ? 'Send' : 'ارسال'}}")
                    
                    setTimeout(function () {
                        $('#form-messages').modal('hide');
                    },3000);

                },
                complete: function(xhr) {
                    // status.html(xhr.responseText);
                }
            });
            /*determine language
 ============================*/
            $(document).ready(function () {
                'use strict';
                $('body').on('click', '.langSwitch', function () {

                    $.ajax({
                        url: $(this).attr('href'),
                        method: 'POST',
                        data: {
                            locale: $(this).data('lang')
                        },
                        dataType: 'json',
                        cache: false,
                        success: function (data) {
                            if (data.response === 'success') {
                                location.reload();
                            }
                        }
                    });
                    return false;
                });
                $.ajaxSetup(
                    {
                        headers:
                            {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            }
                    });
            });

        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160031349-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'UA-160031349-1');
        </script>
    
        <!-- Facebook Pixel Code -->

        <script>
        
            !function(f,b,e,v,n,t,s)
            
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            
            n.queue=[];t=b.createElement(e);t.async=!0;
            
            t.src=v;s=b.getElementsByTagName(e)[0];
            
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            
            'https://connect.facebook.net/en_US/fbevents.js');
            
            fbq('init', '910250985833224'); 
            
            fbq('track', 'PageView');
            
            </script>
            
            <noscript>
            
            <img height="1" width="1"
            
            src="https://www.facebook.com/tr?id=910250985833224&ev=PageView
            
            &noscript=1"/>
        
        </noscript>
        
        <!-- End Facebook Pixel Code -->
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-96376814-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-96376814-1');
        </script>

    </body>
</html>