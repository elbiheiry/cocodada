<form class="edit-form" action="{{ route('admin.about.edit', ['id' => $about->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            {!! csrf_field() !!}
            @if ($about->video)
                <div class="col-md-12 col-sm-12">
                    <div class="form-group text-center">
                        <video src="{{ asset('storage/uploads/about/' . $about->video) }}" width="500px;"
                            controls></video>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Attach Video (if needed)</label>
                        <label class="file">
                            <input type="file" id="file" aria-label="File browser example" name="video"
                                class="form-control">
                            <span class="file-custom"></span>
                        </label>
                    </div>
                </div>
            @endif
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Title in english</label>
                    <input class="form-control" type="text" name="title_en" value="{{ $about->english()->title }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Title in arabic</label>
                    <input class="form-control" type="text" name="title_ar" value="{{ $about->arabic()->title }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Description in english</label>
                    <textarea class="form-control" name="description_en">{{ $about->english()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Description in arabic</label>
                    <textarea class="form-control" name="description_ar">{{ $about->arabic()->description }}</textarea>
                </div>
            </div>
            @if ($about->english()->features)
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Features in english</label>
                        <textarea class="form-control" name="features_en">{{ $about->english()->features }}</textarea>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Features in arabic</label>
                        <textarea class="form-control" name="features_ar">{{ $about->arabic()->features }}</textarea>
                    </div>
                </div>
            @endif
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
