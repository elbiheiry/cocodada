@foreach ($videos as $video)
    <tr>
        <td>https://www.youtube.com/watch?v={{ $video->link }}</td>

        <td>
            <button data-url="{{ route('admin.services.videos.info', ['id' => $video->id]) }}"
                class="custom-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i> edit
            </button>
            <button data-url="{{ route('admin.services.videos.delete', ['id' => $video->id]) }}"
                class="custom-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i> delete
            </button>
        </td>
    </tr>
@endforeach
