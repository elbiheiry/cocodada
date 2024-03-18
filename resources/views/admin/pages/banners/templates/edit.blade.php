<form class="edit-form" action="{{ route('admin.banners.edit', ['id' => $banner->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Page header color</label>
                    <input class="form-control" type="color" name="color" value="{{ $banner->color }}">
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
