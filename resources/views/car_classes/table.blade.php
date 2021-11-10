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
            @foreach ($carclasses as $carClass)
                <tr>
                    <td>{{ $carClass->name }}</td>
                    <td>{{ $carClass->order }}</td>
                    <td>{{ $carClass->color }}</td>
                    <td>{{ $carClass->visible }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['carClasses.destroy', $carClass->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('carClasses.show', [$carClass->id]) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('carClasses.edit', [$carClass->id]) }}" class='btn btn-default btn-xs'>
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
<!-- <table id="table_id" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table> -->
