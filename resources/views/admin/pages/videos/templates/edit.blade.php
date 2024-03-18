<form class="edit-form" action="{{ route('admin.videos.edit', ['id' => $video->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        {!! csrf_field() !!}
        <div class="form-group">
            <label>Add video ID</label>
            <input class="form-control" type="text" name="link" value="{{ $video->link }}">
        </div>
        <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="type">
                <option value="0">Choose type</option>
                <option value="birthdays" @if ($video->type == 'birthdays') {{ 'selected' }} @endif>Birthdays
                </option>
                <option value="events" @if ($video->type == 'events') {{ 'selected' }} @endif>Events</option>
                <option value="roadshows" @if ($video->type == 'roadshows') {{ 'selected' }} @endif>Roadshows
                </option>
            </select>
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
