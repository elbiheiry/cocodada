@foreach ($members as $member)
    <tr>
        <td>{{ $member->english()->name }}</td>
        <td>{{ $member->english()->position }}</td>

        <td>
            <a href="{{ route('admin.team.links', ['id' => $member->id]) }}" class="icon-btn" title="Social links"
                target="_blank">
                <i class="fas fa-link"></i>
            </a>
            <button data-url="{{ route('admin.team.info', ['id' => $member->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.team.delete', ['id' => $member->id]) }}" class="icon-btn red-bc deleteBTN"
                data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
