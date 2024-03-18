@foreach ($banners as $index => $banner)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $banner->page }}</td>

        <td>
            <button data-url="{{ route('admin.banners.info', ['id' => $banner->id]) }}"
                class="custom-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i> Edit
            </button>
        </td>
    </tr>
@endforeach
