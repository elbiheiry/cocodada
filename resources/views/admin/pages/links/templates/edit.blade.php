<form class="edit-form" action="{{ route('admin.links.edit', ['id' => $link->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <label>Social media link</label>
            <input class="form-control" type="text" name="link" value="{{ $link->link }}">
        </div>

        <div class="form-group">
            <label>Social media icon</label>
            <input class="form-control" type="text" name="icon" value="{{ $link->icon }}">
            <span class="text-danger">Please go to this link to get your preferred icon : <a
                    href="https://fontawesome.com/icons?d=gallery" target="_blank">Click here</a> </span>
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
