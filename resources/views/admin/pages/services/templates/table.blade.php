@foreach ($services as $service)
    <tr>
        <td>{{ $service->english()->name }}</td>

        <td>
            <a href="{{ route('admin.services.audio', ['id' => $service->id]) }}" class="icon-btn" target="_blank">
                <i class="far fa-file-audio"></i>
            </a>
            <a href="{{ route('admin.services.types', ['id' => $service->id]) }}" class="icon-btn blue-bc"
                target="_blank">
                <i class="fa fa-info"></i>
            </a>
            <a href="{{ route('admin.services.images', ['id' => $service->id]) }}" class="icon-btn" target="_blank">
                <i class="fa fa-image"></i>
            </a>
            <a href="{{ route('admin.services.videos', ['id' => $service->id]) }}" class="icon-btn blue-bc"
                target="_blank">
                <i class="fa fa-video"></i>
            </a>
            <a href="{{ route('admin.services.info', ['id' => $service->id]) }}" class="icon-btn green-bc "
                target="_blank">
                <i class="fa fa-edit"></i>
            </a>
            <button data-url="{{ route('admin.services.delete', ['id' => $service->id]) }}"
                class="icon-btn red-bc deleteBTN" data-toggle="modal" data-target="#delete" title="delete">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
@endforeach
