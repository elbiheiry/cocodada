@foreach ($audios as $audio)
    <tr>
        <td><img src="{{ asset('storage/uploads/services/' . $audio->image) }}" class="table-img"></td>

        <td>
            <button data-url="{{ route('admin.services.audio.info', ['id' => $audio->id]) }}"
                class="custom-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i> edit
            </button>
            <button data-url="{{ route('admin.services.audio.delete', ['id' => $audio->id]) }}"
                class="custom-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i> delete
            </button>
        </td>
    </tr>
@endforeach
