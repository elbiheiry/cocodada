<form class="edit-form" action="{{ route('admin.downloads.edit', ['id' => $download->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <img src="{{ asset('storage/uploads/downloads/' . $download->image) }}" class="table-img">
        </div>
        <div class="form-group">
            <label>Attach download picture</label>
            <label class="file">
                <input type="file" id="file" aria-label="File browser example" name="image" class="form-control">
                <span class="file-custom"></span>
            </label>
            <span class="text-danger">Image size 262*171</span>
        </div>
        <div class="form-group">
            <label>Attach download file</label>
            <label class="file">
                <input type="file" id="file" aria-label="File browser example" name="file" class="form-control">
                <span class="file-custom"></span>
            </label>
        </div>
        <div class="form-group">
            <label>File name in english</label>
            <input class="form-control" type="text" name="name_en" value="{{ $download->english()->name }}">
        </div>
        <div class="form-group">
            <label>File name in arabic</label>
            <input class="form-control" type="text" name="name_ar" value="{{ $download->arabic()->name }}">
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
