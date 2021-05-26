<div class="table-responsive">
    <table class="table" id="carTransmissions-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Order</th>
        <th>Color</th>
        <th>Visible</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carTransmissions as $carTransmission)
            <tr>
                <td>{{ $carTransmission->name }}</td>
            <td>{{ $carTransmission->order }}</td>
            <td>{{ $carTransmission->color }}</td>
            <td>{{ $carTransmission->visible }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carTransmissions.destroy', $carTransmission->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('carTransmissions.show', [$carTransmission->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('carTransmissions.edit', [$carTransmission->id]) }}" class='btn btn-default btn-xs'>
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
