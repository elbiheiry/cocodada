@foreach ($downloads as $download)
    <tr>
        <td>{{ $download->english()->name }}</td>

        <td>
            <button data-url="{{ route('admin.downloads.info', ['id' => $download->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.downloads.delete', ['id' => $download->id]) }}"
                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
