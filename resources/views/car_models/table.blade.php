<div class="table-responsive">
    <table class="table" id="carModels-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Make Id</th>
        <th>Car Category Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carModels as $carModel)
            <tr>
                <td>{{ $carModel->name }}</td>
            <td>{{ $carModel->make_id }}</td>
            <td>{{ $carModel->car_category_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carModels.destroy', $carModel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('carModels.show', [$carModel->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('carModels.edit', [$carModel->id]) }}" class='btn btn-default btn-xs'>
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
