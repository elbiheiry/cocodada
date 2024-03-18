@extends('site.layouts.master')
@section('title')
    Custom your package
@endsection
@section('modals')
    @foreach ($projects as $project)
        <div class="modal fade" id="details{{ $project->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content modal-details">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $project->translated()->name }}
                            {{ app()->getLocale() == 'en' ? 'Details' : 'تفاصيل' }}</h5>
                    </div>
                    <div class="modal-body">
                        <div class="head-title">{{ app()->getLocale() == 'en' ? 'Activities of' : 'نشاطات' }}
                            {{ $project->translated()->name }} </div>
                        <ul class="dot-lists inline">
                            @foreach (explode("\n", $project->translated()->activities) as $activity)
                                <li>-{{ $activity }} </li>
                            @endforeach
                        </ul>
                        <div class="head-title">{{ app()->getLocale() == 'en' ? 'Scenario' : 'سيناريو' }}</div>
                        <div class="info-text">
                            @foreach (explode("\n", $project->translated()->scenario) as $scenario)
                                {{ $scenario }}
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="custom-btn" data-dismiss="modal">
                            <i class="fa fa-times"></i>{{ app()->getLocale() == 'en' ? 'close' : 'اغلاق' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="mess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <div class="head-title">
                        <button type="button" class="icon-btn" data-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </button>
                        {{ app()->getLocale() == 'en' ? 'Thank you for requesting quotation ' : 'شكرا لك علي ملا الطلب' }}
                        <span><i id="submit-data" style="color: #1dd122; display: block; font-size: 14px;"></i></span>
                    </div>
                    <button class="custom-btn" id="print">
                        {{ app()->getLocale() == 'en' ? 'print quotation' : 'اطبع الطلب' }}
                    </button>
                    <button type="button" id="send-email" data-url="{{ route('site.package.email') }}"
                        class="custom-btn green-bc">
                        <i class="fa fa-envelope"></i>
                        {{ app()->getLocale() == 'en' ? 'SEND copy on my email' : 'ارسال نسخه الي بريدي الالكتروني' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'customize your package' : 'تخصيص باقه معينه' }} </h2>
                </div>
                <!--End col-->
                <div class="w-100"></div>
                <div class="col">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route('site.index') }}">
                                <i class="fa fa-home"></i>{{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه' }}
                            </a>
                        </li>
                        <li class="active">
                            {{ app()->getLocale() == 'en' ? 'customize your package' : 'تخصيص باقه معينه' }} </li>
                    </ul>
                </div>
                <!--End col-->
            </div>
            <!--End Row-->
        </div>
        <!--End container-->
    </section>
    <!-- Page Content
            ==========================================-->
    <div class="page-content">
        <section class="section-setting section-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <form class="profile-cont-form add_ads_form package-form" action="{{ route('site.packages') }}"
                            method="post">
                            {!! csrf_field() !!}
                            <div class="tab medium">
                                <div class="step-name">
                                    1- {{ app()->getLocale() == 'en' ? 'Basic Information' : 'المعلومات الاساسيه' }}
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Name' : 'الاسم' }} :</label>
                                        <input type="text" class="form-control" name="name" id="username">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف' }} :</label>
                                        <input type="text" class="form-control" name="phone" id="userphone">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Email address' : 'البريد الالكتروني' }}
                                            :</label>
                                        <input type="email" class="form-control" name="email" id="useremail">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Address ' : 'العنوان' }} :</label>
                                        <input type="text" class="form-control" name="address" id="useraddress">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Select Services' : 'اختر الخدمه' }}
                                        </label>
                                        <select class="form-control" name="job" id="userjob"
                                            data-url="{{ route('site.services.change') }}">
                                            <option value="0">-
                                                {{ app()->getLocale() == 'en' ? 'Select Services' : 'اختر الخدمه' }} -
                                            </option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->english()->name }}">
                                                    {{ $service->translated()->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div id="services-dates">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label> Date From</label>
                                            <div class="input-group date form_date" data-date=""
                                                data-date-format="dd MM yyyy" data-link-field="dtp_input2">
                                                <input class="form-control" id="userDateFrom" name="from_date" size="16"
                                                    type="text" value="" readonly>
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label> Date To</label>
                                            <div class="input-group date form_date" data-date=""
                                                data-date-format="dd MM yyyy" data-link-field="dtp_input2">
                                                <input class="form-control" id="userDateTo" name="to_date" size="16"
                                                    type="text" value="" readonly>
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab">
                                <div class="step-name">
                                    2- {{ app()->getLocale() == 'en' ? 'customize your package' : 'تخصيص باقه معينه' }}
                                </div>
                                <div id="services-select"> </div>
                            </div>
                            <div class="tab">
                                <div class="step-name">
                                    3- {{ app()->getLocale() == 'en' ? 'Quotation' : 'الطلب' }}
                                </div>
                                <div class="quot-wrap">
                                    <div class="quot-head">
                                        <div class="title">
                                            {{ app()->getLocale() == 'en' ? 'Quotation' : 'الطلب' }}</div>
                                        <div class="col-md-6">
                                            <div class="item-info">
                                                <span>
                                                    {{ app()->getLocale() == 'en' ? 'Quotation Number' : 'رقم الطلب' }}
                                                    :</span>{{ \App\Models\PackageRequest::orderBy('id', 'DESC')->value('id') + 1 }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="item-info">
                                                <span>
                                                    {{ app()->getLocale() == 'en' ? 'Client Name ' : 'اسم العميل' }}:</span>
                                                <div style="display: inline-block;" id="ClientName"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="item-info">
                                                <span> {{ app()->getLocale() == 'en' ? 'Service Type' : 'نوع الخدمه' }}
                                                    :</span>
                                                <div style="display: inline-block;" id="JobName"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quot-cont">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <td>{{ app()->getLocale() == 'en' ? 'Items' : 'المنتجات' }}</td>
                                                        <td>{{ app()->getLocale() == 'en' ? 'Sub - Total' : 'الاسعار' }}
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="quot-footer">
                                        <div class="head-title">
                                            {{ app()->getLocale() == 'en' ? 'Terms & Conditions' : 'الشروط والاحكام' }}
                                        </div>
                                        <ul class="dot-lists">
                                            @if (app()->getLocale() == 'en')
                                                @foreach (explode("\n", $settings->terms_en) as $term)
                                                    <li>
                                                        {{ $term }}
                                                    </li>
                                                @endforeach
                                            @else
                                                @foreach (explode("\n", $settings->terms_ar) as $term)
                                                    <li>
                                                        {{ $term }}
                                                    </li>
                                                @endforeach
                                            @endif

                                        </ul>
                                        <div class="head-title">
                                            {{ app()->getLocale() == 'en' ? 'Payment Terms' : 'شروط الدفع' }}</div>
                                        <ul class="dot-lists">
                                            @if (app()->getLocale() == 'en')
                                                @foreach (explode("\n", $settings->payment_en) as $payment)
                                                    <li>
                                                        {{ $payment }}
                                                    </li>
                                                @endforeach
                                            @else
                                                @foreach (explode("\n", $settings->payment_ar) as $payment)
                                                    <li>
                                                        {{ $payment }}
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="step-footer">
                                <div class="step-indcat">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                </div>
                                <div class="step-control">
                                    <button class="custom-btn" type="button" id="prevBtn" onclick="nextPrev(-1)">
                                        <span> <i
                                                class="fas fa-long-arrow-alt-left"></i>{{ app()->getLocale() == 'en' ? 'Previous' : 'السابق' }}</span>
                                    </button>
                                    <button class="custom-btn" type="button" id="nextBtn" onclick="nextPrev(1)">
                                        {{ app()->getLocale() == 'en' ? 'Next' : 'التالي' }}
                                    </button>
                                </div>
                            </div>
                            <!--end step Footer-->
                        </form>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Section-->
    </div>
    <!--End Page Content-->
@endsection
@section('js')
    <script>
        $(document).on('change', '#userjob', function() {
            var url = $(this).data('url');

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: {
                    service: $(this).val(),
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    $('#services-select').html(response.html);
                }
            })
        });
        $(document).on('change', '#username ,#userjob', function() {
            $('#ClientName').text($('#username').val());
            $('#JobName').text($('#userjob').val());
        });
        $(document).on('change', 'input[name="projects[]"] , #beach_land , #beach_long', function() {
            var checkboxValues = [];
            $('input[name="projects[]"]:checked').map(function() {
                checkboxValues.push($(this).val());
            });

            var userJob = $('#userjob').val();

            var beach_land = $('#beach_land').val();
            var beach_long = $('#beach_long').val();

            $.ajax({
                url: "{{ route('site.projects') }}",
                dataType: 'json',
                method: 'POST',
                data: {
                    projects: checkboxValues,
                    userJob: userJob,
                    beach_land: beach_land,
                    beach_long: beach_long,
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    $('.table tbody').html(response.html);
                }
            });
        });
        var currentTab = 0;
        showTab(currentTab);

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "{{ app()->getLocale() == 'en' ? 'Submit' : 'تاكيد' }}";
            } else {
                document.getElementById("nextBtn").innerHTML = "{{ app()->getLocale() == 'en' ? 'Next' : 'التالي' }}";
            }
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");

            if ($('#username').val() == "" || $('#useraddress').val() == "" || $('#useremail').val() == "" || $('#userjob')
                .val() == "" || $('#userphone').val() == "") {
                $('.package-form').submit();
                return false;
            }

            x[currentTab].style.display = "none";
            if (currentTab == 1) {
                // console.log(n);
                if ($('input[name="projects[]"]:checked').length == 0 && n != -1) {
                    $('.package-form').submit();
                    currentTab = 0;
                }
            }
            currentTab = currentTab + n;

            if (currentTab >= x.length) {
                x[2].style.display = "block";
                $('.package-form').submit();
                return false;
            }
            showTab(currentTab);
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid;
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }
        $('.package-form').ajaxForm({
            beforeSend: function() {

            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function(response) {
                $('#form-messages').modal('show');
                var errors = response.data;
                $('.response-messages').html('');
                $.each(errors, function(index, error) {
                    $('.response-messages').append('<p>' + error + '</p>');
                });
                if (response.status === "success") {
                    $('#form-messages').modal('hide');
                    $('#mess').modal({
                        show: true
                    })
                }

            },
            complete: function(xhr) {
                // status.html(xhr.responseText);
            }
        });

        $('#send-email').on('click', function() {
            var url = $(this).data('url');

            $.ajax({
                url: url,
                dataType: 'json',
                method: 'POST',
                success: function(response) {

                    if (response.status === 'success') {
                        $('#submit-data').html(response.data);
                        setTimeout(function() {
                            $('#submit-data').html('');
                        }, 2000);
                    } else {
                        $('#mess').modal('hide');
                        $('#form-messages').modal('show');
                        var errors = response.data;
                        $('.response-messages').html('');
                        $.each(errors, function(index, error) {
                            $('.response-messages').append('<p>' + error + '</p>');
                        });
                    }
                }
            });
            return false;
        });
    </script>
@endsection
