<form class="edit-form" action="{{ route('admin.articles.edit', ['id' => $article->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <label>Add Video ID</label>
            <input class="form-control" type="text" name="link" value="{{ $article->link }}">
        </div>
        <div class="form-group">
            <label>Event start date</label>
            <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy"
                data-link-field="dtp_input2">
                <input class="form-control" size="16" type="text" name="start_date" value="{{ $article->start_date }}"
                    readonly>
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label>Event name in english</label>
            <input class="form-control" type="text" name="name_en" value="{{ $article->english()->name }}">
        </div>
        <div class="form-group">
            <label>Event name in arabic</label>
            <input class="form-control" type="text" name="name_ar" value="{{ $article->arabic()->name }}">
        </div>
        <div class="form-group">
            <label>Event location in english</label>
            <input class="form-control" type="text" name="location_en" value="{{ $article->english()->location }}">
        </div>
        <div class="form-group">
            <label>Event location in arabic</label>
            <input class="form-control" type="text" name="location_ar" value="{{ $article->arabic()->location }}">
        </div>
        <div class="modal-footer text-center">
            <button type="submit" class="custom-btn green-bc">
                <i class="fa fa-edit"></i> Edit
            </button>
            <button type="button" class="custom-btn" data-dismiss="modal">
                <i class="fa fa-times"></i>close
            </button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        "use strict";
        $('.form_date').datetimepicker({
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            pickerPosition: "bottom-left",
            startDate: new Date()
        });
    });
</script>
