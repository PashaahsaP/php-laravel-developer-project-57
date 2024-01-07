<table >
    <tr class="flexRow">
        <td>ID</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
    </tr>
    @foreach ($statuses as $status )
    <tr class="flexRow">
        <td class="firstColumn">{{ $status->id }}</td>
        <td class="secondColumn">{{ $status->name }}</td>
        <td class="thirdColumn">{{ $status->created_at }}</td>
    </tr>
    @endforeach
</table>
