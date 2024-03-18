<form class="edit-form" action="{{ route('admin.pages.edit', ['id' => $page->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            {!! csrf_field() !!}
            @if ($page->brochure)
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label>Attach brochure (if needed)</label>
                        <label class="file">
                            <input type="file" id="file" aria-label="File browser example" name="brochure"
                                class="form-control">
                            <span class="file-custom"></span>
                        </label>
                    </div>
                </div>
            @endif
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Description in english</label>
                    <textarea class="form-control" name="description_en">{{ $page->english()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Description in arabic</label>
                    <textarea class="form-control" name="description_ar">{{ $page->arabic()->description }}</textarea>
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
