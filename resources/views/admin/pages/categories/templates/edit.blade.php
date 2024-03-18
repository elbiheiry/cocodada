<form class="edit-form" action="{{ route('admin.categories.edit', ['id' => $category->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <img src="{{ asset('storage/uploads/categories/' . $category->image) }}" class="table-img">
        </div>
        <div class="form-group">
            <label>Attach Category picture</label>
            <label class="file">
                <input type="file" id="file" aria-label="File browser example" name="image" class="form-control">
                <span class="file-custom"></span>
            </label>
            <span class="text-danger">Image size 160*160</span>
        </div>
        <div class="form-group">
            <label>Category name in english</label>
            <input class="form-control" type="text" name="name_en" value="{{ $category->english()->name }}">
        </div>
        <div class="form-group">
            <label>Category name in arabic</label>
            <input class="form-control" type="text" name="name_ar" value="{{ $category->arabic()->name }}">
        </div>
        <div class="form-group">
            <label> Services</label>
            <select multiple="multiple" name="services[]" class="form-control tags">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" @if (in_array($service->id, json_decode($category->services))) {{ 'selected' }} @endif>
                        {{ $service->english()->name }}</option>
                @endforeach
            </select>
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
    /* Tag Select
============================*/
    $(document).ready(function() {
        "use strict";
        $('.tags').select2({
            tags: true,
            tokenSeparators: [',']
        });
    });
</script>
