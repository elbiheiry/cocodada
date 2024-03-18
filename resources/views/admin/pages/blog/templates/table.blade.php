@foreach ($articles as $article)
    <tr>
        <td>{{ $article->english()->title }}</td>

        <td>
            <a href="{{ route('admin.blog.info', ['id' => $article->id]) }}" class="custom-btn green-bc">
                <i class="fa fa-edit"></i> edit
            </a>
            <button data-url="{{ route('admin.blog.delete', ['id' => $article->id]) }}"
                class="custom-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i> delete
            </button>
        </td>
    </tr>
@endforeach
