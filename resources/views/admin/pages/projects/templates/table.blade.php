@foreach ($projects as $project)
    <tr>
        <td>{{ $project->english()->name }}</td>

        <td>
            <button data-url="{{ route('admin.projects.info', ['id' => $project->id]) }}"
                class="custom-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i> edit
            </button>
            <button data-url="{{ route('admin.projects.delete', ['id' => $project->id]) }}"
                class="custom-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i> delete
            </button>
        </td>
    </tr>
@endforeach
