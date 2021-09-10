<div class="table-responsive container" id="proposal-div">
    <table class="table" id="proposals-table">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Client</th>
                <th>Vendor</th>
                <th>Car</th>
                <th>Date</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proposals as $proposal)
            <tr style="background-color:{{$proposal->state->color}}">
                <td>{{ isset($proposal->state->name) ? $proposal->state->name : '' }}</td>
                <td>{{ isset($proposal->client->name) ? $proposal->client->name : '' }}</td>
                <td>{{isset($proposal->vendor->name) ? $proposal->vendor->name : ''}}</td>
                <td>{{ isset($proposal->car->model->make->name) ? $proposal->car->model->make->name : ''}}</td>
                <td>{{ isset($proposal->first_contact_date) ? $proposal->first_contact_date : ''}}</td>
                <td>{{ isset($proposal->price) ? $proposal->price : 'null' }}</td>
                
                <td width="120">
                    {!! Form::open(['route' => ['proposals.destroy', $proposal->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('proposals.show', [$proposal->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('proposals.edit', [$proposal->id]) }}" class='btn btn-default btn-xs'>
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
