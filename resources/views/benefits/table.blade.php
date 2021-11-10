<div class="table-responsive container" id="benefit-div">
    <table class="table" id="benefits-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <!--
                <th>{{ __('Type') }}</th>
                <th>{{ __('Amount') }}</th>
                -->
                <th>{{ __('Document') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($benefits->sortByDesc('created_at') as $benefit)
                <tr>
                    <td>{{ $benefit->name }}</td>
                    <!--
                    <td>{{ $benefit->type }}</td>
                    <td>{{ $benefit->amount }}</td>
                    -->
                    @if ($benefit->getFirstMediaUrl('benefits') != '')
                        <td><a href="/download-benefit{{ $benefit->id }}" class="btn download"><i
                                    class="far fa-file-alt" aria-hidden="true"></i></a></td>
                    @else
                        <td>{{ __('No document') }}</td>
                    @endif
                    <td width="120">
                        {!! Form::open(['route' => ['benefits.destroy', $benefit->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('benefits.show', [$benefit->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('benefits.edit', [$benefit->id]) }}" class='btn btn-default btn-xs'>
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
