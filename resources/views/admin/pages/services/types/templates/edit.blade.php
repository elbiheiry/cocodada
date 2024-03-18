<form class="edit-form" action="{{ route('admin.services.types.edit', ['id' => $type->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            {!! csrf_field() !!}
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <img src="{{ asset('storage/uploads/services/' . $type->image) }}" class="table-img">
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Attach client picture</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="image"
                            class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 595*842</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Category name in english</label>
                    <input class="form-control" type="text" name="name_en" value="{{ $type->english()->name }}">
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Category name in arabic</label>
                    <input class="form-control" type="text" name="name_ar" value="{{ $type->arabic()->name }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Category description in english</label>
                    <textarea class="form-control" name="description_en">{{ $type->english()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Category description in arabic</label>
                    <textarea class="form-control" name="description_ar">{{ $type->arabic()->description }}</textarea>
                </div>
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
