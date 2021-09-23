<div class="table-responsive container" id="campaign-div">
    <table class="table" id="campaigns-table">
        <thead>
            <tr>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Description') }}</th>
                <th>{{ __('Document') }}</th>
                <!--
                <th>Make Id</th>
                <th>Model Id</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Beginning</th>
                <th>End</th> 
                -->
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($campaigns->sortByDesc('created_at') as $campaign)
                <tr>
                    <td>{{ $campaign->name }}</td>
                    <td>{{ $campaign->description }}</td>
                    @if ($campaign->getFirstMediaUrl('campaigns') != '')
                        <td><a href="/download-campaign{{ $campaign->id }}" class="btn download"><i
                                    class="far fa-file-alt" aria-hidden="true"></i></a></td>
                    @else
                        <td>{{ __('No document') }}</td>
                    @endif
                    <!-- 
                    <td>{{ $campaign->make_id }}</td>
                    <td>{{ $campaign->model_id }}</td>
                    <td>{{ $campaign->type }}</td>
                    <td>{{ $campaign->amount }}</td>
                    <td>{{ $campaign->beginning }}</td>
                    <td>{{ $campaign->end }}</td> 
                    -->
                    <td width="120">
                        {!! Form::open(['route' => ['campaigns.destroy', $campaign->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('campaigns.show', [$campaign->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('campaigns.edit', [$campaign->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Tem a certeza?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
