<div class="table-responsive container" id="proposal-div">
    <table class="table" id="proposals-table">
        <thead>
            <tr>
                <th>{{__('State')}}</th>
                <th>{{__('Client')}}</th>
                <th>{{__('Vendor')}}</th>
                <th>{{__('Car')}}</th>
                <th>{{__('Date')}}</th>
                <th>{{__('Price')}}</th>
                <th>{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proposals->sortByDesc('created_at') as $proposal)
            <tr {{ isset($proposal->state->color) ? $proposal->state->color : '' }}>
                <td>{{ isset($proposal->state->name) ? $proposal->state->name : '' }}</td>
                <td>{{ isset($proposal->client->name) ? $proposal->client->name : '' }}</td>
                <td>{{ isset($proposal->vendor->name) ? $proposal->vendor->name : '' }}</td>
                <td>{{ isset($proposal->car->model->make->name) ? $proposal->car->model->make->name : ''}}</td>
                <td>{{ isset($proposal->first_contact_date) ? $proposal->first_contact_date : ''}}</td>
                <td>{{ isset($proposal->price) ? $proposal->price : '' }}</td>
                
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
