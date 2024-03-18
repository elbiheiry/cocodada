@foreach ($packages as $package)
    <tr>
        <td>{{ $package->english()->name }}</td>
        <td>
            <a href="{{ route('admin.packages.orders', ['id' => $package->id]) }}" class="icon-btn blue-bc">
                <i class="fa fa-info"></i>
            </a>
            <button data-url="{{ route('admin.packages.info', ['id' => $package->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.packages.delete', ['id' => $package->id]) }}"
                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
