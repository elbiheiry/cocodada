@foreach ($abouts as $about)
    <tr>
        <td>{{ $about->english()->title }}</td>

        <td>
            <button data-url="{{ route('admin.about.info', ['id' => $about->id]) }}"
                class="custom-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i> Edit
            </button>
        </td>
    </tr>
@endforeach
