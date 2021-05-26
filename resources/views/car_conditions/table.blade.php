<div class="table-responsive">
    <table class="table" id="carConditions-table">
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
        @foreach($carConditions as $carCondition)
            <tr>
                <td>{{ $carCondition->name }}</td>
            <td>{{ $carCondition->order }}</td>
            <td>{{ $carCondition->color }}</td>
            <td>{{ $carCondition->visible }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carConditions.destroy', $carCondition->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('carConditions.show', [$carCondition->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('carConditions.edit', [$carCondition->id]) }}" class='btn btn-default btn-xs'>
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
