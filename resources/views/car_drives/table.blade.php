<div class="table-responsive">
    <table class="table" id="carDrives-table">
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
        @foreach($carDrives as $carDrive)
            <tr>
                <td>{{ $carDrive->name }}</td>
            <td>{{ $carDrive->order }}</td>
            <td>{{ $carDrive->color }}</td>
            <td>{{ $carDrive->visible }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carDrives.destroy', $carDrive->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('carDrives.show', [$carDrive->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('carDrives.edit', [$carDrive->id]) }}" class='btn btn-default btn-xs'>
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
