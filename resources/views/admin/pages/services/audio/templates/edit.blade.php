<form class="edit-form" action="{{ route('admin.services.audio.edit', ['id' => $audio->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <img src="{{ asset('storage/uploads/services/' . $audio->image) }}" class="img-view">
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>Attach Audio picture</label>
                <label class="file">
                    <input type="file" id="file" aria-label="File browser example" name="image" class="form-control">
                    <span class="file-custom"></span>
                </label>
                <span class="text-danger">Image size 767*500</span>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <audio src="{{ asset('storage/uploads/services/' . $audio->audio) }}" controls></audio>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>Attach Audio</label>
                <label class="file">
                    <input type="file" id="file" aria-label="File browser example" name="audio" class="form-control">
                    <span class="file-custom"></span>
                </label>
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
