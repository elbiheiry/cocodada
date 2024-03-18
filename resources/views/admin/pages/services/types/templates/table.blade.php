@foreach ($types as $type)
    <tr>
        <td>{{ $type->english()->name }}</td>

        <td>
            <button data-url="{{ route('admin.services.types.info', ['id' => $type->id]) }}"
                class="custom-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i> Edit
            </button>
            <button data-url="{{ route('admin.services.types.delete', ['id' => $type->id]) }}"
                class="custom-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i> delete
            </button>
        </td>
    </tr>
@endforeach
