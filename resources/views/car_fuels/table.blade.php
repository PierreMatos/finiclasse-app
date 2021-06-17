<div class="table-responsive">
    <table class="table" id="carFuels-table">
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
        @foreach($carFuels as $carFuel)
            <tr>
                <td>{{ $carFuel->name }}</td>
            <td>{{ $carFuel->order }}</td>
            <td>{{ $carFuel->color }}</td>
            <td>{{ $carFuel->visible }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carFuels.destroy', $carFuel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('carFuels.show', [$carFuel->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('carFuels.edit', [$carFuel->id]) }}" class='btn btn-default btn-xs'>
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
