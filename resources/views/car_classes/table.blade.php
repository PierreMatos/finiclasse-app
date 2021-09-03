<div class="table-responsive2">
    <table class="display" id="table_id2">
        <thead>
            <tr>
                <th>Name</th>
        <th>Order</th>
        <th>Color</th>
        <th>Visible</th>
                <!-- <th colspan="3">Action</th> -->
            </tr>
        </thead>
        <tbody>
        @foreach($carclasses as $carCondition)
            <tr>
                <td>{{ $carCondition->name }}</td>
            <td>{{ $carCondition->order }}</td>
            <td>{{ $carCondition->color }}</td>
            <td>{{ $carCondition->visible }}</td>
                <!-- <td width="120"> -->
                    <!-- {!! Form::open(['route' => ['carConditions.destroy', $carCondition->id], 'method' => 'delete']) !!} -->
                    <!-- <div class='btn-group'> -->
                        <!-- <a href="{{ route('carConditions.show', [$carCondition->id]) }}" class='btn btn-default btn-xs'> -->
                            <!-- <i class="far fa-eye"></i> -->
                        <!-- </a> -->
                        <!-- <a href="{{ route('carConditions.edit', [$carCondition->id]) }}" class='btn btn-default btn-xs'> -->
                            <!-- <i class="far fa-edit"></i> -->
                        <!-- </a> -->
                        <!-- {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    <!-- </div> -->
                    <!-- {!! Form::close() !!} -->
                <!-- </td> -->
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