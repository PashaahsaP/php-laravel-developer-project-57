<table >
    <tr class="tableHeader">
        <td>ID</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
    </tr>
    @foreach ($statuses as $status )
    <tr >
        <td class="firstColumn">{{ $status->id }}</td>
        <td class="secondColumn">{{ $status->name }}</td>
        <td class="thirdColumn">{{ date("d/m/Y", strtotime($status->created_at))  }}</td>
    </tr>
    @endforeach
</table>
