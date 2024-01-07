<form class="createStatus" action="/">
    <input class="headerSubmit" type="submit" value="{{ __('button.create') }}">
</form>

<table >
    <tr class="flexRow">
        <td>ID</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
        <td>{{ __('models.statusAction') }}</td>
    </tr>
    @foreach ($statuses as $status )
    <tr class="flexRow">
        <td class="firstColumn">{{ $status->id }}</td>
        <td class="secondColumn">{{ $status->name }}</td>
        <td class="thirdColumn">{{ $status->created_at }}</td>
        <td >
            <a class="delete" href="#">{{ __('models.statusDelete') }}</a>
            <a class="change" href="#">{{ __('models.statusChange') }}</a>
        </td>
    </tr>
    @endforeach
</table>
