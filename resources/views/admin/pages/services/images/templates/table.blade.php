@foreach ($images as $image)
    <tr>
        <td><img src="{{ asset('storage/uploads/services/' . $image->image) }}" class="table-img"></td>

        <td>
            <button data-url="{{ route('admin.services.images.info', ['id' => $image->id]) }}"
                class="custom-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i> edit
            </button>
            <button data-url="{{ route('admin.services.images.delete', ['id' => $image->id]) }}"
                class="custom-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i> delete
            </button>
        </td>
    </tr>
@endforeach
