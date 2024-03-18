@foreach ($clients as $client)
    <tr>
        <td><img src="{{ asset('storage/uploads/clients/' . $client->image) }}" class="table-img"></td>

        <td>
            <button data-url="{{ route('admin.clients.info', ['id' => $client->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.clients.delete', ['id' => $client->id]) }}"
                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
