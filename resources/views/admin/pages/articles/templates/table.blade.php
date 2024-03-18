@foreach ($articles as $article)
    <tr>
        <td>{{ $article->english()->name }}</td>
        <td>{{ $article->english()->location }}</td>

        <td>
            <button data-url="{{ route('admin.articles.info', ['id' => $article->id]) }}"
                class="icon-btn green-bc btn-modal-view ">
                <i class="fa fa-edit"></i>
            </button>
            <button data-url="{{ route('admin.articles.delete', ['id' => $article->id]) }}"
                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
