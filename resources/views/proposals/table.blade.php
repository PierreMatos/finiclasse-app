<div class="table-responsive">
    <table class="table" id="proposals-table">
        <thead>
            <tr>
                <th>Client Id</th>
        <th>Vendor Id</th>
        <th>Price</th>
        <th>Pos Number</th>
        <th>Prop Value</th>
        <th>First Contact Date</th>
        <th>Last Contact Date</th>
        <th>Next Contact Date</th>
        <th>Contract</th>
        <th>Test Drive</th>
        <th>State Id</th>
        <th>Business Study Id</th>
        <th>Comment</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($proposals as $proposal)
            <tr>
                <td>{{ $proposal->client_id }}</td>
            <td>{{ $proposal->vendor_id }}</td>
            <td>{{ $proposal->price }}</td>
            <td>{{ $proposal->pos_number }}</td>
            <td>{{ $proposal->prop_value }}</td>
            <td>{{ $proposal->first_contact_date }}</td>
            <td>{{ $proposal->last_contact_date }}</td>
            <td>{{ $proposal->next_contact_date }}</td>
            <td>{{ $proposal->contract }}</td>
            <td>{{ $proposal->test_drive }}</td>
            <td>{{ $proposal->state_id }}</td>
            <td>{{ $proposal->business_study_id }}</td>
            <td>{{ $proposal->comment }}</td>
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
