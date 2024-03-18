@foreach ($links as $link)
    <tr>
        <td>{{ $link->link }}</td>

        <td>
            <button data-url="{{ route('admin.team.links.info', ['id' => $link->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.team.links.delete', ['id' => $link->id]) }}"
                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
