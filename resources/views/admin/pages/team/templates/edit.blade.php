<form class="edit-form" action="{{ route('admin.team.edit', ['id' => $member->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <img src="{{ asset('storage/uploads/team/' . $member->image) }}" class="table-img">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Attach Member picture</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="image"
                            class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 460*540</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Member name in english</label>
                    <input class="form-control" type="text" placeholder="Member name in english" name="name_en"
                        value="{{ $member->english()->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Member name in arabic</label>
                    <input class="form-control" type="text" placeholder="Member name in arabic" name="name_ar"
                        value="{{ $member->arabic()->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Member position in english</label>
                    <input class="form-control" type="text" placeholder="Member position in english"
                        name="position_en" value="{{ $member->english()->position }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Member position in arabic</label>
                    <input class="form-control" type="text" placeholder="Member position in arabic" name="position_ar"
                        value="{{ $member->arabic()->position }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Member description in english</label>
                    <textarea class="form-control" placeholder="Member position in english"
                        name="description_en">{{ $member->english()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Member description in arabic</label>
                    <textarea class="form-control" placeholder="Member position in arabic"
                        name="description_ar">{{ $member->arabic()->description }}</textarea>
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
