@foreach ($projects as $project)
    <tr>
        <td>{{ $project->translated()->name }}</td>
        <td>{{ number_format($project->price) }} {{ app()->getLocale() == 'en' ? 'L.E' : 'ج.م' }}</td>
    </tr>
@endforeach
<tr>
    <td>{{ app()->getLocale() == 'en' ? 'Sub-total' : 'المجموع' }}</td>
    <td>{{ number_format($total) }} {{ app()->getLocale() == 'en' ? 'L.E' : 'ج.م' }}</td>
</tr>
