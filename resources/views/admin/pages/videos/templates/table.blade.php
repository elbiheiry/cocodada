@foreach ($videos as $video)
    <tr>
        <td><a href="https://www.youtube.com/watch?v={{ $video->link }}" target="_blank">Click here</a></td>
        <td>{{ $video->type }}</td>

        <td>
            <button data-url="{{ route('admin.videos.info', ['id' => $video->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.videos.delete', ['id' => $video->id]) }}" class="icon-btn red-bc deleteBTN"
                data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
