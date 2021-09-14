<div class="table-responsive container" id="financing-div">
    <table class="table" id="financings-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Contract') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($financings->sortByDesc('created_at') as $financing)
                <tr>
                    <td>{{ $financing->name }}</td>
                    <td>{{ $financing->description }}</td>
                    @if ($financing->document != '')
                        <td><a href="/download-financing{{ $financing->id }}" class="btn download"><i
                                    class="far fa-file-alt" aria-hidden="true"></i></a></td>
                    @else
                        <td>Sem documento</td>
                    @endif
                    <td width="120">
                        {!! Form::open(['route' => ['financings.destroy', $financing->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('financings.show', [$financing->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('financings.edit', [$financing->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
