<div class="table-responsive container" id="proposal-div">
    <table class="table" id="proposals-table">
        <thead>
            <tr>
                <th>{{ __('State') }}</th>
                <th>{{ __('ID') }}</th>
                <th>{{ __('Client') }}</th>
                <th>{{ __('Vendor') }}</th>
                <th>{{ __('Car') }}</th>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Price') }}</th>
                <th>{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proposals->sortByDesc('created_at') as $proposal)
                <tr style="background-color: {{ isset($proposal->state->name) ? $proposal->state->color : '' }}">
                    <td>{{ isset($proposal->state->name) ? $proposal->state->name : '' }}</td>
                    <td>{{ isset($proposal->state->name) ? $proposal->id : '' }}</td>
                    <td>{{ isset($proposal->client->name) ? $proposal->client->name : '' }}</td>
                    <td>{{ isset($proposal->vendor->name) ? $proposal->vendor->name : '' }}</td>
                    <td>{{ isset($proposal->car->model->make->name) ? $proposal->car->model->make->name : '' }}</td>
                    <td>{{ isset($proposal->created_at) ? $proposal->created_at : '' }}</td>
                    <td>{{ isset($proposal->initialBusinessStudy->sale) ? $proposal->initialBusinessStudy->sale : '' }}
                    </td>

                    <td width="120">
                        {!! Form::open(['route' => ['proposals.destroy', $proposal->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <!-- <a href="{{ route('proposals.show', [$proposal->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a> -->
                            <a href="{{ route('proposals.edit', [$proposal->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
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
<div class="d-flex" style="padding: 30px 0px 0px 0px; justify-content: center;">
   @foreach($states as $state) 
    <div class="tableCaption ml-5" style="background-color: {{ $state->color }}"></div><div class="ml-2">{{ $state->name }}</div>
   @endforeach
</div>
