<form class="edit-form" action="{{ route('admin.pages.images.edit', ['id' => $image->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <img src="{{ asset('storage/uploads/pages/' . $image->image) }}" class="table-img">
        </div>
        <div class="form-group">
            <label>Attach service picture</label>
            <label class="file">
                <input type="file" id="file" aria-label="File browser example" name="image" class="form-control">
                <span class="file-custom"></span>
            </label>
            <span class="text-danger">Image size 767*500</span>
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
