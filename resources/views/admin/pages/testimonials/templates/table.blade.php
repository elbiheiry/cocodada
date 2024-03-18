@foreach ($members as $member)
    <tr>
        <td>{{ $member->english()->name ? $member->english()->name : 'No name' }}</td>
        <td><img src="{{ asset('storage/uploads/testimonials/' . $member->image) }}" class="table-img"></td>
        <td>
            <button data-url="{{ route('admin.testimonials.info', ['id' => $member->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.testimonials.delete', ['id' => $member->id]) }}"
                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
