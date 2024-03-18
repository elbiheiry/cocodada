<div class="col-md-3 col-sm-4">
    <button type="button" class="custom-btn cat_menu-button"><i class="fa fa-list"></i> </button>
    <div class="tab-wrapper">

        <button type="button" class="custom-btn cat_menu-button"><i class="fa fa-times"></i> Close </button>
        <ul class="nav nav-tabs package-list">

            @foreach ($categories as $index => $category)
                <li class="{{ $index == 0 ? 'active' : null }}">
                    <a href="#{{ $category->id }}" data-toggle="tab" class="package-list-anchor">
                        <img
                            src="{{ asset('storage/uploads/categories/' . $category->image) }}">{{ $category->translated()->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="col-md-9 col-sm-8">
    <div class="tab-content row" id="tabwp">
        @foreach ($categories as $index => $category)
            <div class="tab-pane fade in {{ $index == 0 ? 'active' : null }}" id="{{ $category->id }}">
                @if ($selected->id != 4 && $selected->id != 5)
                    @foreach ($category->projects as $project)
                        <div class="col-md-4 col-sm-6">
                            <div class="categ-item">
                                <div class="check">
                                    <input type="checkbox" id="proj{{ $project->id }}" name="projects[]"
                                        value="{{ $project->id }}" class="projects">
                                    <label for="proj{{ $project->id }}"> </label>
                                </div>
                                <img src="{{ asset('storage/uploads/projects/' . $project->image) }}">
                                <div class="categ-cont">
                                    <h3> {{ $project->translated()->name }} </h3>
                                    @if ($project->translated()->description != null)
                                        <p>{{ $project->translated()->description }}</p>
                                        @if ($project->translated()->scenario != null && $project->translated()->activities != null)
                                            <a href="#details{{ $project->id }}" data-toggle="modal"
                                                data-target="#details{{ $project->id }}">
                                                {{ app()->getLocale() == 'en' ? 'read more' : 'المزيد' }}
                                            </a>
                                        @endif
                                    @else
                                        @if ($project->translated()->size != null && $project->translated()->featuring != null && $project->code != null && $project->price)
                                            <ul>
                                                <li><span>{{ app()->getLocale() == 'en' ? 'Size' : 'الحجم' }} :</span>
                                                    {{ $project->translated()->size }}</li>
                                                <li><span>{{ app()->getLocale() == 'en' ? 'Featuring' : 'المميزات' }}
                                                        :</span> {{ $project->translated()->featuring }}</li>
                                                <li><span>{{ app()->getLocale() == 'en' ? 'Code' : 'الكود' }}: </span>
                                                    {{ $project->code }}</li>
                                                <li><span>{{ app()->getLocale() == 'en' ? 'Price' : 'السعر' }}: </span>
                                                    {{ $project->price }}
                                                    {{ app()->getLocale() == 'en' ? 'L.E' : 'ج.م' }}</li>
                                            </ul>
                                        @endif
                                    @endif

                                </div>
                            </div>
                            <!--End Categ-item-->
                        </div>
                        <!--End Col-md-6-->
                    @endforeach
                @else
                    <div class="clearfix">
                        <hr>
                    </div>
                    <div class="head-title">
                        {{ app()->getLocale() == 'en' ? 'Choose from below services' : 'اختر من الخدمات التاليه' }} (
                        {{ $selected->translated()->name }} )
                    </div>
                    @foreach ($category->projects as $index => $project)
                        <div class="categ-item txt">
                            <div class="check">
                                <input type="checkbox" id="beach_resorts_{{ $index + 1 }}" name="projects[]"
                                    value="{{ $project->id }}" class="projects">
                                <label for="beach_resorts_{{ $index + 1 }}"> </label>
                            </div>
                            {{ $project->translated()->name }}
                        </div>
                    @endforeach
                    <div class="clearfix">
                        <hr>
                    </div>
                    <div class="row">
                        @if ($selected->id == 4)
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'What is your resort name' : 'ماهو اسم منتجعك' }}
                                        </label>
                                        <input type="text" class="form-control" name="resort_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Where is your beach location' : 'ماهو موقع الشاطئ بتاعك' }}
                                        </label>
                                        <select class="form-control" name="resort_location">
                                            <option value="NC">
                                                {{ app()->getLocale() == 'en' ? 'NC' : 'الساحل الشمالي' }}</option>
                                            <option value="Soukhna">
                                                {{ app()->getLocale() == 'en' ? 'Soukhna' : 'العين السخنه' }}</option>
                                            <option value="Red Sea">
                                                {{ app()->getLocale() == 'en' ? 'Red Sea' : 'البحر الاحمر' }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'How big is your beach land' : 'كم تبلغ مساحه الشاطئ الخاص بك' }}
                                        </label>
                                        <select class="form-control" name="beach_land" id="beach_land">
                                            <option value="1">1000 M2 </option>
                                            <option value="2">2000 M2</option>
                                            <option value="2.5">3000 M2</option>
                                            <option value="4">3000+ M2 </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'How long you need to operate your beach' : 'ماهي المده المطلوبه للانتهاء ' }}
                                        </label>
                                        <select class="form-control" name="beach_long" id="beach_long">
                                            <option value="1">2 months </option>
                                            <option value="1.5">3 months </option>
                                            <option value="2">4 months </option>
                                            <option value="3">Long-term project </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'What is the expected date to start the project' : 'ماهو الموعد المتوقع للبدر بالمشروع' }}
                                        </label>
                                        <input type="text" class="form-control" placeholder=" MM / YY"
                                            name="start_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'How many visitors you expect to come' : 'كم عدد الزوار المتوقعين' }}
                                        </label>
                                        <select class="form-control" name="visitors">
                                            <option value="200">200 </option>
                                            <option value="500">500 </option>
                                            <option value="1000">1000 </option>
                                            <option value="+1000">1000+ </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @elseif($selected->id == 5)
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Where is your project land country location' : 'اين هي الدوله المقام فيها مشروعك ' }}
                                        </label>
                                        <input type="text" class="form-control" name="resort_location">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'What is your project type' : 'ماهو نوع مشروعك ' }}
                                        </label>
                                        <input type="text" class="form-control" name="resort_type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'How big is the land dedicated for the theme park ' : 'كم تبلغ مساحه الخاصه بك' }}
                                        </label>
                                        <select class="form-control" name="beach_land" id="beach_land">
                                            <option value="1">2000 MSQ</option>
                                            <option value="3">5000 MSQ</option>
                                            <option value="4.5">10000 MSQ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'When you need this project to be done up and run ?' : 'ماهي المده المطلوبه للانتهاء ' }}
                                        </label>
                                        <select class="form-control" name="beach_long" id="beach_long">
                                            <option value="1">6 month</option>
                                            <option value="0.9">10 months </option>
                                            <option value="0.8">15 months </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="quest-item">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Upload masterplan of your project land' : 'برجاء رفع المخطط الخاصه بارض المشروع' }}
                                        </label>
                                        <input type="file" class="form-control" name="master_plan">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <!--End Tab Pane-->
        @endforeach
    </div>
    <!--End Tab content-->
</div>
<!--End Col-md-9-->
<script>
    $(document).on('click', '.cat_menu-button', function() {
        $(".tab-wrapper").toggleClass("move");
    });
    $(document).on('click', '.package-list-anchor', function() {
        $(".tab-wrapper").removeClass("move");
        $("html,body").animate({
            scrollTop: 0
        }, 600);
    });

    $(document).on('click', '#nextBtn', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 600);
    });
</script>
