@foreach ($pages as $page)
    <tr>
        <td>{{ $page->name }}</td>

        <td>
            <a href="{{ route('admin.pages.images', ['id' => $page->id]) }}" class="icon-btn" target="_blank">
                <i class="fa fa-image"></i>
            </a>
            <button data-url="{{ route('admin.pages.info', ['id' => $page->id]) }}"
                class="custom-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i> Edit
            </button>
        </td>
    </tr>
@endforeach
