<form class="edit-form" action="{{ route('admin.services.videos.edit', ['id' => $video->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Video link</label>
                <input type="text" class="form-control" name="link" value="{{ $video->link }}">
            </div>
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
