<form class="edit-form" action="{{ route('admin.packages.edit', ['id' => $package->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>package name in english</label>
                    <input class="form-control" type="text" name="name_en" value="{{ $package->english()->name }}">
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label>package name in arabic</label>
                    <input class="form-control" type="text" name="name_ar" value="{{ $package->arabic()->name }}">
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label>package description in english</label>
                    <textarea class="form-control" name="description_en">{{ $package->english()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label>package description in arabic</label>
                    <textarea class="form-control" name="description_ar">{{ $package->arabic()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label>package terms in english</label>
                    <textarea class="form-control" name="terms_en">{{ $package->english()->terms }}</textarea>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label>package terms in arabic</label>
                    <textarea class="form-control" name="terms_ar">{{ $package->arabic()->terms }}</textarea>
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
