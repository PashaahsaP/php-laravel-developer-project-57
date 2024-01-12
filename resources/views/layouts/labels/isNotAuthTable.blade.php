<table >
    <tr class="tableHeader">
        <td>ID</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.description') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
    </tr>
    @foreach ($labels as $label )
    <tr>
        <td>{{ $label->id }}</td>
        <td>{{ $label->name }} </td>
        <td>{{ $label->description }}</td>
        <td>{{ date("d/m/Y", strtotime($label->created_at)) }}</td>
    </tr>
    @endforeach
</table>

