<a class="headerSubmit" onclick="event.preventDefault(); document.getElementById('createLabel').submit();">{{ __('button.createLabel') }} </a>

                <form id="createLabel" action="{{ route('labels.create') }}" method="GET">
                    @csrf
                    <input class="headerSubmit" type="hidden" >
                </form>




<table >
    <thead>
    <tr class="tableHeader">
        <td>ID</td>
        <td>{{ __('models.name') }}</td>
        <td>{{ __('models.description') }}</td>
        <td>{{ __('models.dateCreation') }}</td>
        <td>{{ __('models.statusAction') }}</td>
    </tr>
</thead>
<tbody>
    @foreach ($labels as $label )
    <tr>
        <td>{{ $label->id }}</td>
        <td>{{ $label->name }} </td>
        <td>{{ $label->description }}</td>
        <td>{{ date("d/m/Y", strtotime($label->created_at)) }}</td>
        <td>
            <a  class="delete" href="{{route('labels.destroy',$label) }}"  data-confirm="{{ __('flash.areYouSure')}}" data-method="delete" rel="nofollow">
                {{ __('models.statusDelete') }}</a>
            <a class="change" href="{{ route('labels.edit',$label) }}">{{ __('models.statusChange') }}</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>

