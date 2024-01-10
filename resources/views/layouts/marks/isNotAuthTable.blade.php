<table >
    <tr class="tableHeader">
        <td>ID</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.description') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
    </tr>
    @foreach ($marks as $mark )
    <tr>
        <td>{{ $mark->id }}</td>
        <td>{{ $mark->name }} </td>
        <td>{{ $mark->description }}</td>
        <td>{{ date("d/m/Y", strtotime($mark->created_at)) }}</td>
    </tr>
    @endforeach
</table>

