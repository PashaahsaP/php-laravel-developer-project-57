<form class="createStatus" action="{{ route('marks.create') }}">
    <input class="headerSubmit" type="submit" value="{{ __('button.create') }}">
</form>

<table >
    <tr class="tableHeader">
        <td>ID</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.description') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
        <td>{{ __('models.statusAction') }}</td>
    </tr>
    @foreach ($marks as $mark )
    <tr>
        <td>{{ $mark->id }}</td>
        <td>{{ $mark->name }} </td>
        <td>{{ $mark->description }}</td>
        <td>{{ date("d/m/Y", strtotime($mark->created_at)) }}</td>
        <td>
            <a  class="delete" href="{{route('marks.destroy',$mark) }}"  data-confirm="Вы уверены?" data-method="delete" rel="nofollow">
                {{ __('models.statusDelete') }}</a>
            <a class="change" href="{{ route('marks.edit',$mark) }}">{{ __('models.statusChange') }}</a>
        </td>
    </tr>
    @endforeach
</table>

