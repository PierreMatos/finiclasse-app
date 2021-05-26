<div class="table-responsive">
    <table class="table" id="carStates-table">
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
        @foreach($carStates as $carState)
            <tr>
                <td>{{ $carState->name }}</td>
            <td>{{ $carState->order }}</td>
            <td>{{ $carState->color }}</td>
            <td>{{ $carState->visible }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carStates.destroy', $carState->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('carStates.show', [$carState->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('carStates.edit', [$carState->id]) }}" class='btn btn-default btn-xs'>
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
