@foreach ($categories as $category)
    <tr>
        <td>{{ $category->english()->name }}</td>

        <td>
            @if (!in_array(4, json_decode($category->services)) && !in_array(5, json_decode($category->services)))
                <a href="{{ route('admin.projects', ['id' => $category->id]) }}" class="icon-btn" target="_blank">
                    <i class="fab fa-product-hunt"></i>
                </a>
            @endif
            <button data-url="{{ route('admin.categories.info', ['id' => $category->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.categories.delete', ['id' => $category->id]) }}"
                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
